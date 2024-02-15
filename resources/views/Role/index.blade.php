@extends('layout')
@section('content')

<section class="Agents px-4 ">
    @if(in_array('addRole', Session::get('sidebar_links')))
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add role</span></a>
    </div>
    @endif

    <table class="table table-dark table-striped">
        <thead class="bg-light">
            <tr>
                <th>Role_Name</th>
                <th>Permessions</th>
                <th>Action</th>
            </tr>
        </thead>
        
  <tbody>
  
    @foreach ($uniqueRoles as $role)
        <tr class="freelancer">
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1 f_title">
                            {{ $role->role_name }}
                        </p>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1 f_title">
                            {{ implode(' | ', $role->permissions) }}
                        </p>
                    </div>
                </div>
            </td>
            <td>
                 @if(in_array('deleteRole', Session::get('sidebar_links')))
                <a href="/deleteRole/{{ $role->role_id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                @endif @if(in_array('editRole', Session::get('sidebar_links')))
                <a href="/editRole/{{ $role->role_id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
    {{-- <div style="display: flex; justify-content:end;">{{ $roles->links() }}</div> --}}

</section>
@endsection
@section('additional_content')
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addRole">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Roles</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="">
                        <select class="js-example-basic-multiple form-control" name="permissions[]" multiple="multiple" data-placeholder="Choose permissions">
                            @foreach ($permessions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->permessions_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

