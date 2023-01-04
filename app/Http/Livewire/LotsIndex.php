<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Traits\DataTable\WithPerPagePagination;

class LotsIndex extends Component
{
    use WithPerPagePagination;

    public Product $form;
    public $productExists;
    public $typeLists;
    public $supplierLists;
    public $mainCategoryLists;
    public $brandLists;
    protected $subscriberId;

    public $filters = [
        'search' => '',
        'status' => '',
        'type' => '',
        'supplier' => '',
        'category' => ''
    ];

    protected $listeners = [
        'refreshProducts' => '$refresh',
        'triggerDelete' => 'destroy',
    ];
    /**
     * constructor
     */
    public function mount()
    {
        $this->form = $this->makeBlankForm();
        $this->typeLists = Type::optionLists();
        $this->mainCategoryLists = Category::mainCategoryLists();
        $this->supplierLists = Supplier::optionLists();
        $this->brandLists = Brand::optionLists();

        $this->subscriberId = getSubscriberId();
    }

    /**
     * Set of validation rules
     */
    public function rules()
    {
        return [
            'form.name' => 'required',
            'form.type_id' => 'required|exists:types,id',
            'form.supplier_id' => 'required|exists:suppliers,id',
            'form.category_id' => 'required|exists:categories,id',
            'form.brand_id' => 'nullable',
            'form.qty' => 'nullable',
            'form.description' => 'nullable',
            'form.size' => 'nullable',
            'form.status' => 'required',
            'productExists' => [
                Rule::unique('products', 'type_id')
                    ->ignore($this->form->id)
                    ->where(fn ($query) => $query->where([
                        ['supplier_id', '=', $this->form->supplier_id],
                        ['category_id', '=', $this->form->category_id],
                        ['size', '=', $this->form->size],
                        ['subscriber_id', '=', getSubscriberId()]
                    ]))
            ]
        ];
    }


    /**
     * run before when any component data update using wire:model
     */
    public function updatingFormTypeId($value)
    {
        $this->productExists = $value;
    }

    /**
     * when create btn click reset the form
     */
    public function create()
    {
        if ($this->form->getKey()) {
            $this->form = $this->makeBlankForm();
        }
    }

    /**
     * Build blank form
     */
    public function makeBlankForm()
    {
        return Product::make(['status' => 'active']);
    }

    /**
     * Edit form
     */
    public function edit(Product $form)
    {
        if ($this->form->isNot($form)) {
            $this->form = $form;
        }
    }

    /**
     * Store form into DB
     */
    public function save()
    {
        $this->validate();
        $isNew = !($this->form->id) ? 1 : 0;

        try {
            $this->form->product_code = Str::random(60);
            
            $this->form->qty = !($this->form->qty) ? 0: $this->form->qty;
            $this->form->save();

            Product::generateProductCode($this->form);

            $this->resetForm();

            $this->notify('Product ' . ($this->form->id ? 'added' : 'updated') . ' successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Clsoe modal and reset form
     */
    public function resetForm()
    {
        $this->closeModal();

        $this->form = $this->makeBlankForm();
    }

    /**
     * handle delete resource
     *
     * @param mix $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            Product::findOrFail($id)->delete();

            $this->notify('Product deleted successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Reset filters
     */
    public function resetFilters()
    {
        $this->reset('filters');
    }

    /**
     * Get db rows query scope
     */
    public function getRowsQueryProperty()
    {
        return Product::query()
            ->when($this->filters['status'], fn ($query, $status) => $query->where('status', $status == 'active' ? 1 : 0))
            ->when($this->filters['type'], fn ($query, $type) => $query->where('type_id', $type))
            ->when($this->filters['supplier'], fn ($query, $supplier) => $query->where('supplier_id', $supplier))
            ->when($this->filters['category'], fn ($query, $category) => $query->where('category_id', $category))
            // ->when($this->filters['date-min'], fn($query, $date) => $query->where('date', '>=', Carbon::parse($date)))
            // ->when($this->filters['date-max'], fn($query, $date) => $query->where('date', '<=', Carbon::parse($date)))
            ->when($this->filters['search'], fn ($query, $search) => $query->where('qty', 'like', '%' . $search . '%'))
            ->join('types', 'types.id', '=', 'products.type_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->join('categories as c', 'c.id', '=', 'products.category_id')
            ->select(
                'products.id',
                'products.name',
                'products.type_id',
                'products.subscriber_id',
                'products.supplier_id',
                'products.category_id',
                'products.qty',
                'products.description',
                'products.size',
                'products.color',
                'products.brand_id',
                'products.status',
                'products.created_at',
                'types.name as type_name',
                'suppliers.name as supplier_name',
                'c.name as category_name'
            )
            ->where('products.subscriber_id', getSubscriberId())
            ->latest();
    }

    /**
     * Get subscribers collection
     */
    public function getRowsProperty()
    {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('livewire.products-index', [
            'products' => $this->getRowsProperty()
        ]);
    }
}
