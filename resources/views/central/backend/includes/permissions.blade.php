@foreach($permissions as $permission)
    <li class="w-1/3 mb-2">
        <input type="checkbox" name="permissions[]" class="h-5 w-5 text-indigo-600"
               {{ in_array($permission->id, $usedPermissions ?? [], true) ? 'checked' : '' }} value="{{ $permission->id }}" id="{{ $permission->id }}"
        >
        <label for="{{ $permission->id }}" class="inline-flex items-center mt-3">
            <span class="ml-2 text-gray-700">{{ $permission->description ?? $permission->name }}</span>
        </label>
        @if($permission->children->count())
            @include('central.backend.role.includes.children', ['children' => $permission->children])
        @endif
    </li>
@endforeach
