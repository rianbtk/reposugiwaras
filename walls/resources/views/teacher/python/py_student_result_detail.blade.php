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
               
                {{-- <div class="row" style="margin-bottom: 30px">
                    <div class="col-md-4" style="border-right: 2px solid #e0e0e0">
                        <b>Dosen Pengajar Oleh</b>
                        <h3>{{ $dosen->name }}</h3>
                    </div>
                    <div class="col-md-4">
                        <b>Hasil Dari Pembelajaran Mahasiswa :  </b>
                        <h3>{{ $mhs }} Mahasiswa</h3>
                    </div>
                </div> --}}
                

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">
                                        <b><small>Topik</small></b><br>
                                        <b>{{ $topik->nama }}</b>
                                    </th>
                                    <th colspan="4">Detail</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Nama Mahasiswa</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Waktu</th>
                                    <th class="text-center">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="{{ count( $allSubmit ) + 1 }}">
                                        <small>Nama Percobaan</small>
                                        <h4>{{ $dt_percobaan->nama_percobaan }}</h4>
                                    </td>
                                </tr>

                                @foreach ( $allSubmit AS $nomor => $isi )
                                <tr>
                                    <td>{{ $isi['infoMhs']->name }}</td>
                                    <td>
                                        @php 
                                        if ( $isi['status'] ) {
                                            
                                            echo "PASSED";
                                        } else {

                                            echo "FAILED";
                                        }
                                        @endphp
                                    </td>
                                    <td>{{ date('d M Y H.i A', strtotime($isi['infoMhs']->created_at)) }}</td>
                                    <td>

                                        <a href="javascript:;" data-toggle="modal" data-target="#modal-{{ $nomor }}" type="button" class="btn btn-info btn-sm">Submitted</a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-{{ $nomor }}" tabindex="-3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                        
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    
                                                    <b>Materi {{ $topik->nama }}</b>
                                                    <h5 class=" btn btn-dark btn-sm" style="margin: 0px"><code>{{ $dt_percobaan->nama_percobaan }}</code></h5>
                                                    
                                                    @foreach ( $isi['log'] AS $detail )
                                                    <br>
                                                    <small>Pengerjaan pada tanggal{{ date('d F Y H.i A', strtotime($detail->created_at)) }}</small>
                                                    <div class=" btn btn-success btn-sm" style="font-family: 'Courier New', Courier, monospace">
                                                        {{ $detail->checkstat }}

                                        
                                                        <hr>
                                                        <b>Hasil Unit Test : </b><br>
                                                        <?php echo $detail->report ?>
                                                    </div>
                                                    {{-- <a href="{{ asset('python-resources/unittest/jawaban/'. $detail->file_submitted) }}.py" download>Unduh Source Code</a><br>
                                                    <small>Klik untuk mengunduh file jawaban</small> --}}
                                                    

                                                    @endforeach
                                        
                                                </div>
                                            </div>
                                            </div>
                                        </div>

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
