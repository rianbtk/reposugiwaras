@extends('teacher/home')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">

                </div>
            </div>

            <div class="card-body">
                @if (Session::has('message'))
                <div id="alert-msg" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ Session::get('message') }}
                </div>
                @endif

                <div class="row" style="margin-bottom: 30px">
                    <div>
                        <b>Kelas Basic Python</b>
                        <h3>{{ $dosen->name }}    {{$mhs}} Mahasiswa</h3>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Topik</th>
                                    <th>Percobaan</th>
                                    <th>Mengerjakan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ( $allData AS $index => $isi )

                                @php

                                $rowspan = count( $isi['materi'] ) + 1;

                                @endphp
                                <tr style="border-bottom: 2px solid #e0e0e0">
                                    <td rowspan="{{ $rowspan }}">
                                        <small>Nama Topik</small><br>
                                        <b>{{ $isi['topik']->nama }}</b>
                                    </td>
                                </tr>

                                @foreach ( $isi['materi'] AS $materi )
                                <tr style="border-bottom: 2px solid #e0e0e0">
                                    <td>{{ $materi['percobaan']->nama_percobaan }}</td>
                                    <td style="width: 10%; text-align: center;">
                                        @php

                                        if ( count($materi['submitted']) > 0 ) {

                                            echo count($materi['submitted']).' Student   ';
                                        } else {

                                            echo '-';
                                        }

                                        @endphp
                                        <a href="{{ url('teacher/python/resultstudentdetail/'. $isi['topik']->id_topik.'/'.$materi['percobaan']->id_percobaan) }}" class="btn btn-dark btn-sm" ><i></i> Detail</a>
                                    </td>
                                    <td style="width: 10%; text-align: center;">
                                        @php 

                                            $label = "";
                                            if ( count( $materi['submitted'] ) == $mhs ) {

                                                $label = '<label class="badge badge-info">'. count($materi['submitted']).'/'.$mhs.' mhs</label>';
                                            
                                            } else if ( count( $materi['submitted'] ) == 0 ) {

                                                $label = '<label class="badge badge-secondary">Kosong</label>';
                                            } else if ( count( $materi['submitted'] ) != $mhs ) {

                                                $label = '<label class="badge badge-success">'. count($materi['submitted']).'/'.$mhs.' mhs</label>';
                                            }


                                            
                                            echo $label;

                                        @endphp 
                                    </td>
                                </tr>
                                @endforeach
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
