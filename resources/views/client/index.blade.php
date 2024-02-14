@extends('layout')
@section('clients')
<section class="Agents px-4 ">
    @if(in_array('addclients', Session::get('sidebar_links')))
    <div class="d-flex justify-content-end mb-3">
        <a href="#addEmployeeModal" class="btn btn-secondary" data-toggle="modal"><i class="material-icons">&#xE147;</i> Add client</a>
    </div>
   @endif
    <table class="table table-dark table-striped">
        <thead class="bg-light">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Carte Bancaire</th>
                <th>Adress</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr class="freelancer">
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                              {{ $client->name }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $client->email }}
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                            <p>{{ $client->carte_bancaire }}</p>
                            </p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">

                        <div class="ms-3">
                            <p class="fw-bold mb-1 f_title">
                                {{ $client->adress }}
                            </p>
                        </div>
                    </div>
                </td>

                <td>
                    @if(in_array('deleteclient', Session::get('sidebar_links')))
                    <a href="/deleteclient/{{ $client->id }}"><img class="delet_user" src="{{ asset('img/delete.svg') }}" alt=""></a>
                     @endif @if(in_array('editclient', Session::get('sidebar_links')))
                    <a href="/editclient/{{ $client->id }}"><img class="ms-2 edit" src="{{ asset('img/edit.svg') }}" alt=""></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    <br>
    <div style="display: flex; justify-content:end;">{{ $clients->links() }}</div>

</section>
@endsection

@section('addclients')

<div id="addEmployeeModal" class="modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="employeeForm" method="post" action="/addclients">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Carte bancaire</label>
                        <input type="text" class="form-control" name="carte_bancaire">
                    </div>
                    
                    <div class="form-group">
                        <label>adress</label>
                        <input type="text" class="form-control" name="adress">
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