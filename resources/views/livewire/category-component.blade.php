<div>
    {{--     Close your eyes. Count to one. That is how long forever feels.--}}

    @if($updateMode)
        <!-- Изменение категории категории -->
        <p>True $updateMode</p>
    @else
        <!-- Создание новой категории -->
{{--        <form wire:submit.prevent="createCategory">--}}
        <form wire:submit.prevent="createCategory()">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input wire:model.lazy="title" id="title" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                    Description
                </label>
                <input wire:model.lazy="description" id="description" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grid-state">
                    Parent id
                </label>
                <div class="relative">
                    <select wire:model="parent_id" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="grid-state">
                        <option selected>Без категории</option>
                        @foreach($data as $row)
                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Создать
            </button>
        </form>

    @endif

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Index</th>
            <th class="px-4 py-2">Заголовок</th>
            <th class="px-4 py-2">Описание</th>
            <th class="px-4 py-2">PK</th>
            <th class="px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <td class="border px-4 py-2">{{ $row->id }}</td>
                <td class="border px-4 py-2">{{ $row->title }}</td>
                <td class="border px-4 py-2">{{ $row->description }}</td>
                <td class="border px-4 py-2">{{ $row->parent_id }}</td>
                <td class="border px-4 py-2">
                    <button wire:click="editCategory({{ $row->id }})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Изменить
                    </button>
                    <button wire:click="destroyCategory({{ $row->id }})" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Удалить
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
