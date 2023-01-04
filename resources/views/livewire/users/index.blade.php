<div class="col-12">
    <x-slot name="title">Users</x-slot>

    <h4 class="fw-bold mb-2"><span class="text-muted fw-light">Users</span> Management</h4>
    
    <div class="d-flex flex-md-row flex-column justify-content-md-between mb-2">    
        <div class="d-flex justify-content-start align-items-center mb-2 mb-md-0">
            <x-input.select wire:model="filters.role" class="form-select-sm rounded-pill me-1" placeholder="Filter by role">
                <option value="super_admin">Super Admin</option>
                @foreach($roles as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
            </x-input.select>

            <x-input.select wire:model="filters.status" class="form-select-sm rounded-pill me-1" placeholder="Filter by status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </x-input.select>

            <x-input.text wire:model.debounch.500ms="filters.search" class="me-2 rounded-pill form-control-sm me-1" placeholder="Search..." />
        </div> 

        <x-button wire:click="create" class="btn-outline-secondary rounded-pill btn-sm" icon="bx bx-plus" modal>
            Add New User
        </x-button>
    </div> 

    <div class="card">
        <x-table class="card-table table-sm table-hover" rounded> 
            <x-slot:head class="table-dark">
                <x-table.heading class="py-2">Name</x-table.heading>
                <x-table.heading class="py-2">Email</x-table.heading>
                <x-table.heading class="py-2">Phone</x-table.heading>
                <x-table.heading class="py-2">Role</x-table.heading>
                <x-table.heading class="py-2">Created at</x-table.heading>
                <x-table.heading class="py-2">Status</x-table.heading>
                <x-table.heading class="py-2 w-px-20">Actions</x-table.heading>
            </x-slot>

            <x-slot:body wire:loading.class="loader">
                @forelse ($users as $user)                        
                    <x-table.row>
                        <x-table.cell>
                            <a href="#">{{ $user->first_name }} {{ $user->last_name }}</a>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->email }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->phone ?? '-' }}
                        </x-table.cell>
                        <x-table.cell>
                            <span>{{ ucwords(str_replace('_', ' ', $user->role)) }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            <span class="badge bg-label-{{ $user->status ? 'success' : 'warning' }}">{{ $user->status ? 'Active' : 'Inactive' }}</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link wire:click="edit('{{ $user->id }}')" icon="bx bxs-edit" modal>Edit</x-dropdown-link>
                                <x-dropdown-link wire:click="$emit('swalConfirm', '{{ $user->id }}')" class="hover:text-danger" icon="bx bx-trash">Delete</x-dropdown-link>
                            </x-dropdown>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <x-table.row>
                        <x-table.cell colspan="7">
                            <div class="d-flex justify-content-center align-items-center">
                                <span class="font-medium py-8 text-cool-gray-400 text-xl">No users found...</span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse
            </x-slot>

            <x-slot:footer>
                {{ $users->links() }}   
            </x-slot>
        </x-table>
    </div>
    
    {{-- modal form --}}    
    <form wire:submit.prevent="save" wire:loading.class.delay="opacity-50">
        <x-modal id="modal" title="{{ $form->id ? 'Edit' : 'Add New' }} User">
            <x-slot:body class="pb-2 pt-3">
                <div class="row g-2">
                    <x-input 
                        wire:model.defer="form.first_name" 
                        class="col mb-3"
                        label="First Name"
                        placeholder="Enter First Name" />

                    <x-input 
                        wire:model.defer="form.last_name" 
                        class="col mb-3"
                        label="Last Name"
                        placeholder="Enter Last Name" />
                </div>
    
                <div class="row g-2">                      
                    <x-input 
                        wire:model.defer="form.phone" 
                        class="col mb-3"
                        label="Phone"
                        placeholder="Enter Phone" />
                        
                    <x-input.group class="col mb-3" label="Status" :error="$errors->first('form.status')">
                        <x-input.select 
                            id="status"
                            wire:model.defer="form.status" 
                            placeholder="Filter by status"
                        >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </x-input.select>
                    </x-input.group>
                </div>

                <div class="rounded border shadow-sm p-2">
                    <p class="fw-bold text-primary-dark mb-2">Account Credentials</p>
                    <div class="row">                      
                        <x-input 
                            wire:model.defer="form.email" 
                            class="col mb-3"
                            label="Email"
                            placeholder="Enter Email" />
                    </div>

                    <div class="row g-2">                      
                        <x-input 
                            wire:model.defer="password" 
                            class="col"
                            type="password"
                            label="Password"
                            placeholder="*******" />
                            
                        <x-input.group class="col" label="Role" :error="$errors->first('form.role')">
                            <x-input.select 
                                id="role"
                                wire:model.defer="form.role" 
                                placeholder="Filter by role"
                            >
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                @endforeach
                            </x-input.select>
                        </x-input.group>
                    </div>
                </div>
            </x-slot>
    
            <x-slot:footer class="pb-2">
                <x-button type="button" class="btn-label-secondary" wire:loading.attr="disabled" data-bs-dismiss="modal">Close</x-button>
                <x-button class="btn-primary" wire:loading.class="loader">Save changes</x-button>
            </x-slot>
        </x-modal>
    </form>
</div>