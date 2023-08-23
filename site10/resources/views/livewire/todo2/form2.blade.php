<x-form-section submit="createItem">
    <x-slot name="title">
        {{ __('團購') }}
    </x-slot>
    <x-slot name="description">
        {{ __('團購名單') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('訂購人') }}" />
            <x-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
            <x-input-error for="description" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="detail" value="{{ __('訂購金額') }}" />
            <x-input id="detail" type="text" class="mt-1 block w-full" wire:model.defer="detail" autocomplete="detail" />
            <x-input-error for="detail" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="place" value="{{ __('送達地點') }}" />
            <x-input id="place" type="text" class="mt-1 block w-full" wire:model.defer="place" autocomplete="place" />
            <x-input-error for="place" class="mt-2" />
        </div>

    </x-slot>
    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
