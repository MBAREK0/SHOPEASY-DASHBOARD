@extends('layout')
@section('content')

<section class="Agents px-4 ">

    <table class="table table-dark table-striped">
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
            </tr>
            @endforeach
        </tbody>
    </table>


</section>
@endsection
