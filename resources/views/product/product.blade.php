@extends('layout')
@section('products')
<br>
 
  @if ($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
   {{$message}}
  </div>
  @endif
<section class="Agents px-4 ">
     @if(in_array('addproducts', Session::get('sidebar_links')))
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> Add product</a>
    </div>
    @endif

    <table  class="table table-dark table-striped">
        <thead class="bg-light">
            <tr>
                <th>image</th>
                <th>Name</th>
                <th>Description</th>
                <th>price</th>
                <th>category</th>
                <th>tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $product)
            <tr class="freelancer">
                <td >
                     <img src="img/{{ $product->image_path }}" alt="product" style="width: 37px;border: 2px solid #fff;">
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                            <p>{{ $product->prix }} $</p>
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->category_name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $product->tags }}
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                     @if(in_array('deleteproduct', Session::get('sidebar_links')))
                    <a href="/deleteproduct/{{ $product->id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                     @endif  @if(in_array('editproduct', Session::get('sidebar_links')))
                    <a href="/editproduct/{{ $product->id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
        
    </table>
    <div style="display: flex; justify-content:end;">{{ $produits->links() }}</div>

</section>
@endsection

@section('addproduct')

<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addproducts" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Offre</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" name="prix">
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>category</label>
                        <select class="form-control" name="category_id" data-placeholder="choose a category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>tags</label>
                        <input type="text" class="form-control" name="tags">
                    </div>
                    <div class="form-group">
                        <label>Image </label>
                        <input type="file" class="form-control" name="image_path" accept="image/*">
                    </div>
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