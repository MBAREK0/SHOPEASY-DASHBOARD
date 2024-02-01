@extends('layout')
@section('content')
<section class="Agents px-4 ">
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add category</span></a>
    </div>

    <table class="agent table align-middle bg-white">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $category->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td style="display: flex; gap:10px">
                    <form action="/deletecategory/{{ $category->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></button>
                    </form>

                    <a href="/editcategory/{{ $category->id }}"><button><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></button></a>
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
            <form id="employeeForm" method="post" action="/addcategory">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
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