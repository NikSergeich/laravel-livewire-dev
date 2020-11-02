@foreach($categories as $categoryItem)
    <option value="{{ $categoryItem->id }}"
    @isset($category->id)
{{--        @if($category->parent_id == $categoryItem->id)--}}
{{--            selected=""--}}
{{--        @endif--}}
        @if($category->id == $categoryItem->id)
            disabled=""
        @endif
    @endisset
    >{{ $delimeter }}{{ $categoryItem->title }}</option>
    @if(count($categoryItem->children)>0)
        @include('admin.categories._select-category', [
        'categories' => $categoryItem->children,
        'delimeter' => ' - ' . $delimeter
        ])
    @endif
@endforeach
