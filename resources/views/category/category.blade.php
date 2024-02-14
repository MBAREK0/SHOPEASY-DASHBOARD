@extends('layout')
@section('content')
<br>
 
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif
<section class="Agents px-4 ">
    @if(in_array('addcategory', Session::get('sidebar_links')))
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add category</span></a>
    </div>
    @endif
   
    <table class="table table-dark table-striped">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Action</th>
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
                     @if(in_array('deletecategory', Session::get('sidebar_links')))
                    <form action="/deletecategory/{{ $category->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></button>
                    </form>
                    @endif @if(in_array('editcategory', Session::get('sidebar_links')))
                    <a href="/editcategory/{{ $category->id }}"><button><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></button></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div style="display: flex; justify-content:end;">{{ $categories->links() }}</div>

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