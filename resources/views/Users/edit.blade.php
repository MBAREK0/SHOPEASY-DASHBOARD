@extends('layout')
@section('editcategory')
        <form method="post" id="forms" action="/updateUser">
            @csrf
            <input type="number" class="form-control task-desc" name="id" value="{{ $user->id }}" hidden>

            <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control task-desc" name="name" value="{{ $user->name }}">

            </div>
             <div class="mb-4">
                <label class="form-label">Email</label>
                <input type="text" class="form-control task-desc" name="email" value="{{ $user->email }}">
            </div>
             <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role_id" data-placeholder="choose a role">
                @foreach($roles as $role)
                <option value="{{ $role->id }}" @if($role->id == $user->id_role) selected @endif>
                    {{ $role->name }}
                </option>
                @endforeach
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


   
