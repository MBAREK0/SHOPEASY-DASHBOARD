@extends('layout')
@section('editcategory')
        <form method="post" id="forms" action="/updaterole">
            @csrf
            <input type="number" class="form-control task-desc" name="id" value="{{ $role->id }}" hidden>

            <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control task-desc" name="name" value="{{ $role->name }}">

            </div>
            <div class="mb-4">
            <select class="js-example-basic-multiple form-control" name="permissions[]" multiple="multiple">
                @foreach ($permissions as $permission)
                    @php
                        $selected = in_array($permission->id, $roles_id);
                    @endphp
                    <option value="{{ $permission->id }}" {{ $selected ? 'selected' : '' }}>
                        {{ $permission->permessions_name }}
                    </option>
                @endforeach
            </select>

</select>

        </div>


            <div class="d-flex w-100 justify-content-center">
                <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                <a href="/roles">
                    <div class="btn btn-danger btn-block mb-4 annuler">Annuler</div>
                </a>
            </div>
        </form>
@endsection


   
