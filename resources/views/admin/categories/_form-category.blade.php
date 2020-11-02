<form
    @if ($updateMode)
        wire:submit.prevent="update()"
    @else
        wire:submit.prevent="store()"
    @endif
>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
            Title
        </label>
        <input wire:model.lazy="title" id="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
    </div>

    @if ($updateMode)
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                Slug
            </label>
            <input wire:model.lazy="slug" id="slug" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('slug') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
    @endif

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
            Description
        </label>
        <input wire:model.lazy="description" id="description" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-state">
            Parent id
        </label>
        <div class="relative">
            <select wire:model="parent_id" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-state">
                <option value="0" selected>Без категории</option>
                @include('admin.categories._select-category')
            </select>

            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
    </div>

    <button type="submit" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">

        <svg wire:loading wire:target="update || store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>

        <span>
        @if ($updateMode)
            Сохранить
        @else
            Создать
        @endif
        </span>
    </button>
</form>
