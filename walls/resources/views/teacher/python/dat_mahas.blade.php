@extends('teacher/home')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">

                </div>
            </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status ID</th>
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($datmahas as $user)
                            <tr class="text-center">
                                <td>{{ $user->nomor }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->status_id }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
