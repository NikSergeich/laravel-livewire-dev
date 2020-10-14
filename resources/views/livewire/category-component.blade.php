<div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @include('admin.categories._form-category')

    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Заголовок</th>
            <th class="px-4 py-2">Описание</th>
            <th class="px-4 py-2">Slug</th>
            <th class="px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
            @include('admin.categories._table-category')
        </tbody>
    </table>
</div>
