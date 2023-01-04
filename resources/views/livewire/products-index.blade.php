<div class="col-12">
    <x-slot name="title">Products management</x-slot>

    <h4 class="fw-bold mb-2"><span class="text-muted fw-light">Products</span>  Management</h4>
    
    <div class="d-flex flex-md-row flex-column justify-content-md-between mb-2">    
        <div class="d-flex flex-md-row flex-column justify-content-start align-items-center mb-2 mb-md-0">
            <x-input.select wire:model="filters.type" class="form-select-sm rounded-pill me-1 mb-2 mb-md-0" placeholder="Filter by type">
                @foreach($typeLists as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-input.select>

            <x-input.select wire:model="filters.supplier" class="form-select-sm rounded-pill me-1 mb-2 mb-md-0" placeholder="Filter by supplier">
                @foreach($supplierLists as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-input.select>

            <x-input.select wire:model="filters.category" class="form-select-sm rounded-pill me-1 mb-2 mb-md-0" placeholder="Filter by category">
                @foreach($mainCategoryLists as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-input.select>
{{-- 
            <x-input.select wire:model="filters.subCategory" class="form-select-sm rounded-pill me-1 mb-2 mb-md-0" placeholder="Filter by sub category">
                @foreach($subCategoryLists as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-input.select>

            <x-input.select wire:model="filters.status" class="form-select-sm rounded-pill me-1 mb-2 mb-md-0" placeholder="Filter by status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </x-input.select>

            <x-input.text wire:model.debounch.500ms="filters.search" class="rounded-pill form-control-sm me-1" placeholder="Search qty..." /> --}}
        </div> 

        <x-button wire:click="create" class="btn-outline-secondary rounded-pill btn-sm" icon="bx bx-plus" modal>
            Add New Product
        </x-button>
    </div> 

    <div class="card">
        <x-table class="card-table table-sm table-hover" rounded> 
            <x-slot:head class="table-dark">
                <x-table.heading class="py-2">Name</x-table.heading>
                <x-table.heading class="py-2">Type</x-table.heading>
                <x-table.heading class="py-2">Supplier</x-table.heading>
                <x-table.heading class="py-2">Category</x-table.heading>
                <x-table.heading class="py-2">Size</x-table.heading>
                <x-table.heading class="py-2">Qty</x-table.heading>
                <x-table.heading class="py-2 w-px-200">Description</x-table.heading>
                <x-table.heading class="py-2 w-px-50">Status</x-table.heading>
                <x-table.heading class="py-2 w-px-20"></x-table.heading>
            </x-slot>

            <x-slot:body wire:loading.class="loader">
                @forelse ($products as $product)                        
                    <x-table.row>
                        <x-table.cell>
                            {{ $product->name }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $product->type_name }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $product->supplier_name }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $product->category_name }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $product->size }}
                        </x-table.cell>
                        <x-table.cell>
                            <span class="bg-label-info fw-normal py-1 pe-2 ps-1 rounded-pill">{{ $product->qty }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="d-grid"><span class="text-truncate">{{ $product->description }}</span></div>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="badge bg-label-{{ $product->status ? 'success' : 'warning' }}">{{ $product->status ? 'Active' : 'Inactive' }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link wire:click="edit('{{ $product->id }}')" icon="bx bxs-edit" modal>Edit</x-dropdown-link>
                                <x-dropdown-link wire:click="$emit('swalConfirm', '{{ $product->id }}')" class="hover:text-danger" icon="bx bx-trash">Delete</x-dropdown-link>
                            </x-dropdown>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row class="bg-label-secondary">
                        <x-table.cell colspan="8">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">No products found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>

            <x-slot:footer>
                {{ $products->links() }}   
            </x-slot>
        </x-table>
    </div>
    
    {{-- modal form --}}    
    <form wire:submit.prevent="save" wire:loading.class.delay="opacity-50">
        <x-modal id="modal" title="{{ $form->id ? 'Edit' : 'Add New' }} Product">
            <x-slot:body class="pb-2 pt-3">    
                @error ('productExists')
                    <div class="mb-2 alert alert-danger text-sm">
                        <i class="bx bx-error-circle"></i> This type, supplier, category & size combination already exists.
                    </div>
                @enderror

                <div class="row g-2">
                    <x-input 
                        wire:model.defer="form.name" 
                        type="text"
                        class="col mb-2"
                        label="Product Name."
                        placeholder="Enter Name" />
                </div>
                <div class="row g-2">
                    <x-input.group class="col mb-3" label="Type" :error="$errors->first('form.type_id')">
                        <x-input.select 
                            id="type"
                            wire:model.defer="form.type_id" 
                            placeholder="Select a type"
                        >
                            @foreach($typeLists as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>

                    <x-input.group class="col mb-3" label="Supplier" :error="$errors->first('form.supplier_id')">
                        <x-input.select 
                            id="supplier"
                            wire:model.defer="form.supplier_id" 
                            placeholder="Select a supplier"
                        >
                            @foreach($supplierLists as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                </div>
    
                <div class="row g-2">
                    <x-input.group class="col mb-3" label="Category" :error="$errors->first('form.category_id')">
                        <x-input.select 
                            id="category"
                            wire:model="form.category_id" 
                            placeholder="Select a category"
                        >
                            @foreach($mainCategoryLists as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input.group class="col mb-3" label="Brand" :error="$errors->first('form.brand_id')">
                        <x-input.select 
                            id="brand"
                            wire:model="form.brand_id" 
                            placeholder="Select a brand"
                        >
                            @foreach($brandLists as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    <x-input 
                        wire:model.defer="form.size" 
                        type="text"
                        class="col mb-2"
                        label="Product Size."
                        placeholder="Enter size" />
 {{-- 
                    <x-input.group class="col mb-3" 
                        label="Sub Category" 
                        :error="$errors->first('form.sub_category_id')"
                        wire:loading.class="loader" wire:target="form.category_id"
                    >
                        <x-input.select 
                            id="sub-category"
                            wire:model.defer="form.sub_category_id" 
                            placeholder="Select a sub category"
                        >
                            @foreach($subCategoryLists as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </x-input.select>
                    </x-input.group>
                    --}}
                </div>
                
                <div class="row g-2">
                    <x-input 
                        wire:model.defer="form.qty" 
                        type="number"
                        class="col mb-2"
                        label="Product Qty."
                        placeholder="Enter Qty." />

                    <x-input.group class="col mb-2" label="Status" :error="$errors->first('form.status')">
                        <x-input.select 
                            id="status"
                            wire:model.defer="form.status" 
                            placeholder="Select a status"
                        >
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </x-input.select>
                    </x-input.group>
                </div>

                <x-input.group class="col mb-1" label="Description" :error="$errors->first('form.description')">
                    <x-input.textarea
                        id="description"
                        wire:model.defer="form.description"
                        rows="3"
                        placeholder="Description..."
                    />
                </x-input.group>
            </x-slot>
    
            <x-slot:footer class="pb-2">
                <x-button type="button" class="btn-label-secondary" wire:loading.attr="disabled" data-bs-dismiss="modal">Close</x-button>
                <x-button class="btn-primary" wire:loading.class="loader" wire:target="save">Save changes</x-button>
            </x-slot>
        </x-modal>
    </form>
</div>