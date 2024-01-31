@extends('layout')
@section('editclient')

            <form id="employeeForm" method="post" action="/updateclients/{{ $client->id }}">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add Client</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
            <input type="number" class="form-control task-desc" name="id" value="{{ $client->id }}" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $client->name }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $client->email }}">
                    </div>
                    <div class="form-group">
                        <label>Carte bancaire</label>
                        <input type="text" class="form-control" name="carte_bancaire" value="{{ $client->carte_bancaire }}">
                    </div>
                    
                    <div class="form-group">
                        <label>adress</label>
                        <input type="text" class="form-control" name="adress" value="{{ $client->adress }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/clients"><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
     
@endsection