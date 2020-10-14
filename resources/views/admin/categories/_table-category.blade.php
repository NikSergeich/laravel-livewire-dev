@foreach($categories as $categoryItem)
    <tr>
        <td class="border px-4 py-2">{{ $categoryItem->id }}</td>
        <td class="border px-4 py-2">{{ $delimeter }}{{ $categoryItem->title }}</td>
        <td class="border px-4 py-2">{{ $categoryItem->description }}</td>
        <td class="border px-4 py-2">{{ $categoryItem->slug }}</td>
        <td class="border px-4 py-2">
            <button wire:click="edit({{ $categoryItem->id }})" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Изменить
            </button>
            <button wire:click="destroy({{ $categoryItem->id }})" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                Удалить
            </button>
        </td>
    </tr>
    @if(count($categoryItem->children)>0)
        @include('admin.categories._table-category', [
        'categories' => $categoryItem->children,
        'delimeter' => ' - ' . $delimeter
        ])
    @endif
@endforeach
