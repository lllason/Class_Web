<x-form-section submit="createItem">
    <x-slot name="title">
        {{ __('CreateToTask') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Create a todo task') }}
    </x-slot>
    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('description') }}" />
            <x-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
            <x-input-error for="description" class="mt-2" />

        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="detail" value="{{ __('detail') }}" />
            <x-input id="detail" type="text" class="mt-1 block w-full" wire:model.defer="detail" autocomplete="detail" />
            <x-input-error for="detail" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="place" value="{{ __('place') }}" />
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
