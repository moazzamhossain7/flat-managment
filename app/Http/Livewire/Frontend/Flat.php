<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Lot;
use App\Http\Livewire\Traits\DataTable\WithPerPagePagination;

class Flat extends Component
{
    use WithPerPagePagination;

    public $flats;
    public $type;
    public $status;
    public $location;

    public $filters = [
        'search' => '',
    ];

    public $queryString = [
        'location' => ['except' => ''],
        'type' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    public function mount() {
        $this->perPage = 12;
    }

    public function paginationView()
    {
        return 'livewire.frontend.pagination-view';
    }

    /**
     * Get db rows query scope
     */
    public function getRowsQueryProperty()
    {
        $searchCols = "name, price, address, beds, baths, type, rent_type";
        
        return Lot::query()
            ->with('lotPictures', 'location', 'owner')
            ->when($this->type, fn ($query) => $query->where('type', $this->type))
            ->when($this->status, fn ($query) => $query->where('status',$this->status))
            ->when($this->location, fn ($query) => $query->where('location_id', $this->location))
            ->when($this->filters['search'], fn ($query, $search) => $query->whereRaw("(CONCAT($searchCols) LIKE ?)", "%{$search}%")->orWhereHas('location', fn ($q) => $q->where('name', 'like', "%{$search}%")))
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
        // dd($this->getRowsProperty());
        return view('livewire.frontend.flat', [
            'lots' => $this->getRowsProperty()
        ])->layout('layouts.frontend.app');
    }
}
