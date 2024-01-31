@extends('layout')
@section('editproduit')

<form id="employeeForm" method="post" action="/updateproducts" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <input type="number" class="form-control task-desc" name="id" value="{{ $product->id }}" hidden>

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="prix" value="{{ $product->prix }}">
        </div>
        <div class="form-group">
            <label>category</label>
            <select class="form-control" name="category_id" data-placeholder="choose a category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->id_categorie) selected @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label>tags</label>
            <input type="text" class="form-control" name="tags" value="{{ $product->id }}">
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


<script>
    document.getElementById('image_path_input').addEventListener('change', function() {
        var fileName = this.files[0].name;
        document.querySelector('.custom-file-label').textContent = fileName;
    });
</script>
@endsection