<div class="col-12">
    <x-slot name="title">Types</x-slot>

    <h4 class="fw-bold mb-2"><span class="text-muted fw-light">Types</span> Management</h4>
    
    <div class="d-flex flex-md-row flex-column justify-content-md-between mb-2">    
        <div class="d-flex justify-content-start align-items-center mb-2 mb-md-0">
            <x-input.select wire:model="filters.status" class="form-select-sm rounded-pill me-1" placeholder="Filter by status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </x-input.select>

            <x-input.text wire:model.debounch.500ms="filters.search" class="me-2 rounded-pill form-control-sm me-1" placeholder="Search..." />
        </div> 

        <x-button wire:click="create" class="btn-outline-secondary rounded-pill btn-sm" icon="bx bx-plus" modal>
            Add New Type
        </x-button>
    </div> 

    <div class="card">
        <x-table class="card-table table-sm table-hover" rounded> 
            <x-slot:head class="table-dark">
                <x-table.heading class="py-2">Name</x-table.heading>
                <x-table.heading class="py-2">Code</x-table.heading>
                <x-table.heading class="py-2">Status</x-table.heading>
                <x-table.heading class="py-2 w-px-20">Action</x-table.heading>
            </x-slot>

            <x-slot:body wire:loading.class="loader">
                @forelse ($types as $type)                        
                    <x-table.row>
                        <x-table.cell>{{ $type->name }}</x-table.cell>
                        <x-table.cell>{{ $type->code }}</x-table.cell>
                        <x-table.cell>
                            <span class="badge bg-label-{{ $type->status == 'active' ? 'success' : 'warning' }}">{{ ucfirst($type->status) }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link wire:click="edit('{{ $type->id }}')" icon="bx bxs-edit" modal>Edit</x-dropdown-link>
                                <x-dropdown-link wire:click="$emit('swalConfirm', '{{ $type->id }}')" class="hover:text-danger" icon="bx bx-trash">Delete</x-dropdown-link>
                            </x-dropdown>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row class="bg-label-secondary">
                        <x-table.cell colspan="7">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">No types found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>

            <x-slot:footer>
                {{ $types->links() }}   
            </x-slot>
        </x-table>
    </div>
    
    {{-- modal form --}}    
    <form wire:submit.prevent="save" wire:loading.class.delay="opacity-50">
        <x-modal id="modal" title="{{ $form->id ? 'Edit' : 'Add New' }} Type">
            <x-slot:body class="pb-2 pt-3">                
                <x-input 
                    wire:model.debounch.700ms="form.name" 
                    class="mb-1"
                    label="Name"
                    placeholder="Enter Name" />
                    
                <div class="row g-2">
                    <div class="col mb-2">
                        <x-label>Code</x-label>
                        <input
                            class="form-control"
                            value="{{ removeSpace(strtolower($form->name), '-') }}"
                            disabled
                            placeholder="Enter Code" />

                        @error ('form.code')
                            <div class="my-1 text-danger text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                        
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
            </x-slot>
    
            <x-slot:footer class="pb-2">
                <x-button type="button" class="btn-label-secondary" wire:loading.attr="disabled" data-bs-dismiss="modal">Close</x-button>
                <x-button class="btn-primary" wire:loading.class="loader">Save changes</x-button>
            </x-slot>
        </x-modal>
    </form>
</div>