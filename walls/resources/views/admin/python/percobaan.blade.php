@extends('admin/admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/python/tambahpercobaan')}}" class="btn btn-secondary">
                    <i class="fa fa-plus"></i>
                    &nbsp; Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('message'))
                <div id="alert-msg" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover" style="font-weight:bold">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Percobaan</th>
                                    <th>Nama Topik</th>
                                    <th>Nama Percobaan</th>
                                    <th>Panduan Path</th>
                                    <th>File Test</th>
                                    <th>Deskripsi</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $joinAntaraPercobaanTopik AS $pc )
                                <tr>
                                    <td>{{ $pc->id_percobaan }}</td>
                                    <td>{{ $pc->nama }}</td>
                                    <td>{{ $pc->nama_percobaan }}</td>
                                    <td>{{ $pc->panduanpath }}</td>
                                    <td>{{ $pc->filetest }}</td>
                                    <td>{{ $pc->deskripsi }}</td>
                                    <td align="center">
                                        <a href="{{ url('/admin/python/proseshapuspercobaan/'. $pc->id_percobaan) }}" onclick="return confirm('Apakah anda ingin menghapus topik ini ?')" class="btn btn-sm btn-dark">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ url('/admin/python/editpercobaan/'. $pc->id_percobaan) }}" class="btn btn-sm btn-success">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
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
