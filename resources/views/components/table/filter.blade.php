<div class="d-flex justify-content-between align-items-center row">
    <div class="col-sm-12 {{ $attributes->get('class') ?? 'col-md-6' }}">
        <div class="dataTables_length" id="DataTables_Table_0_length">
            <label>
                Show
                <x-input.select wire:model="perPage" class="form-select-sm" id="perPage">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </x-input.select>
                entries
            </label>
        </div>
    </div>

    {{ $slot }}
    
    <div class="col-sm-12 {{ $attributes->get('class') ?? 'col-md-6' }} dataTables_filter my-1">
        <x-input.text wire:model.debounce.800ms="filters.search" class="py-1 px-2" placeholder="Search..." />
    </div>
</div>