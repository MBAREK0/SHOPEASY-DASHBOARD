@extends('layout')
@section('content')

<section class="Agents px-4 ">
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Permession</span></a>
    </div>

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Permession_Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permessions as $permession)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                               {{ $permession->permessions_name }}
                            </p>
                        </div>
                    </div>
                </td>
                 <td>
                    <a href="/deletePermession/{{ $permession->id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                    <a href="/editPermession/{{ $permession->id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>
@endsection
@section('additional_content')
<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addPermession">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Permession</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
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