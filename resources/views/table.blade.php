<x-app-layout>
    <div class="row mt-2">
        <x-slot:title>Table With card box header</x-slot>
    
        <div class="col-12">
            <div class="card">
                <x-card-header class="d-flex align-items-center justify-content-between" title="Table With card box header">
                    <x-button class="btn-primary" icon="bx bx-plus">
                        Add New Plan
                    </x-button>
                </x-card-header>   
    
                <x-table class="card-table"> 
                    <x-slot:head class="table-dark">
                        <x-table.heading sortable multi-column class="w-full">Name</x-table.heading>
                        <x-table.heading sortable multi-column class="w-full">Yearly/Monthly Price</x-table.heading>
                        <x-table.heading sortable multi-column class="w-full">Yearly/Monthly Outlet Price</x-table.heading>
                        <x-table.heading sortable multi-column >Discount</x-table.heading>
                        <x-table.heading sortable multi-column >Status</x-table.heading>
                        <x-table.heading>Actions</x-table.heading>
                    </x-slot>
    
                    <x-slot:body>
                        <x-table.row>
                            <x-table.cell>Starter Plan</x-table.cell>
                            <x-table.cell>
                                $1254
                            </x-table.cell>
                            <x-table.cell>
                                $ 15222
                            </x-table.cell>
                            <x-table.cell>
                                55%
                            </x-table.cell>
                            <x-table.cell>                                
                                <span class="badge bg-label-info">Waiting</span>
                            </x-table.cell>
                            <x-table.cell>
                                <x-dropdown>
                                    <x-dropdown-link>Details</x-dropdown-link>
                                    <x-dropdown-link>Archive</x-dropdown-link>
                                    <x-dropdown-link class="text-danger delete-record" icon="bx bx-trash" divider>Delete</x-dropdown-link>
                                </x-dropdown>
                                <x-nav-link  data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-sm btn-icon item-edit" icon="bx bxs-edit" />
                            </x-table.cell>
                        </x-table.row>
                    </x-slot>
                </x-table>
            </div>
        </div>
        
        <div class="col-12">
            <x-card-header class="d-flex align-items-center justify-content-between mb-2 px-0" title="Table Without box header">
                <x-button class="btn-primary" icon="bx bx-plus">
                    Add New Plan
                </x-button>
            </x-card-header>   

            <x-table class="table-striped"> 
                <x-slot name="head">
                    <x-table.heading sortable multi-column class="w-full">Name</x-table.heading>
                    <x-table.heading sortable multi-column class="w-full">Yearly/Monthly Price</x-table.heading>
                    <x-table.heading sortable multi-column class="w-full">Yearly/Monthly Outlet Price</x-table.heading>
                    <x-table.heading sortable multi-column >Discount</x-table.heading>
                    <x-table.heading sortable multi-column >Status</x-table.heading>
                    <x-table.heading>Actions</x-table.heading>
                </x-slot>

                <x-slot:body>
                    <x-table.row>
                        <x-table.cell>Standard Plan</x-table.cell>
                        <x-table.cell>
                            $1254
                        </x-table.cell>
                        <x-table.cell>
                            $ 15222
                        </x-table.cell>
                        <x-table.cell>
                            55%
                        </x-table.cell>
                        <x-table.cell>                                
                            <span class="badge bg-label-info">Waiting</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link>Details</x-dropdown-link>
                                <x-dropdown-link>Archive</x-dropdown-link>
                                <x-dropdown-link class="text-danger delete-record" icon="bx bx-trash" divider>Delete</x-dropdown-link>
                            </x-dropdown>
                            <x-nav-link  data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-sm btn-icon item-edit" icon="bx bxs-edit" />
                        </x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Starter Plan</x-table.cell>
                        <x-table.cell>
                            $1254
                        </x-table.cell>
                        <x-table.cell>
                            $ 15222
                        </x-table.cell>
                        <x-table.cell>
                            55%
                        </x-table.cell>
                        <x-table.cell>                                
                            <span class="badge bg-label-info">Waiting</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link>Details</x-dropdown-link>
                                <x-dropdown-link>Archive</x-dropdown-link>
                                <x-dropdown-link class="text-danger delete-record" icon="bx bx-trash" divider>Delete</x-dropdown-link>
                            </x-dropdown>
                            <x-nav-link  data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-sm btn-icon item-edit" icon="bx bxs-edit" />
                        </x-table.cell>
                    </x-table.row>
                    <x-table.row>
                        <x-table.cell>Enterprice Plan</x-table.cell>
                        <x-table.cell>
                            $1254
                        </x-table.cell>
                        <x-table.cell>
                            $ 15222
                        </x-table.cell>
                        <x-table.cell>
                            55%
                        </x-table.cell>
                        <x-table.cell>                                
                            <span class="badge bg-label-info">Waiting</span>
                        </x-table.cell>
                        <x-table.cell>
                            <x-dropdown>
                                <x-dropdown-link>Details</x-dropdown-link>
                                <x-dropdown-link>Archive</x-dropdown-link>
                                <x-dropdown-link class="text-danger delete-record" icon="bx bx-trash" divider>Delete</x-dropdown-link>
                            </x-dropdown>
                            <x-nav-link  data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-sm btn-icon item-edit" icon="bx bxs-edit" />
                        </x-table.cell>
                    </x-table.row>
                </x-slot>
            </x-table>
        </div>
    </div>
    
</x-app-layout>