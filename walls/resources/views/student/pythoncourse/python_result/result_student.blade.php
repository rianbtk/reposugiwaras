@extends('student/pythoncourse/home')

<!-- untuk mengisi yield pada home.blade.php -->
@section('script')
 
<!-- Code Ace Library For Python -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.34.2/ace.js" integrity="sha512-WdJDvPkK4mLIW1kpkWRd7dFtAF6Z0xnfD3XbfrNsK2/f36vMNGt/44iqYQuliJZwCFw32CrxDRh2hpM2TJS1Ew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.34.2/ace.min.js" integrity="sha512-ddz/gyFFWirjreRd2nDldR57vPGea3K/eU+v6bK+Dg+jcOZCn4v4IGiqJQgGNdBVW1MgVTNyeVoZe2f3PDxcpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Code Ace Library For Python -->
@endsection

@section('content')

<div class="row">



    <div class="col-12">





        <div class="card">

            <div class="card-header">

                <h2> Result </h2>
                <h5> Percobaan Topik Pembelajaran Python Dasar </h5>

            </div>

            <div class="card-body">

                <!-- kolom untuk overview materi pembelajaran -->

                <table class="table table-stripe  table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Topik - Percobaan</th>
                            <th>Status</th>
                            <th>Dosen</th>
                            <th>Tanggal</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ( $dt_hasil AS $nomor => $isi_kolom )
                        <tr>
                            <td class="text-center">{{ ($nomor + 1) }}</td>
                            <td>
                                <b>| {{ $isi_kolom->nama }} | </b>{{ $isi_kolom->nama_percobaan }}
                            </td>
                            <td class="text-center">{{ $isi_kolom->status}}</td>
                            <td class="text-center">{{ $isi_kolom->nama_dosen }}</td>
                            <td class="text-center">{{ date('d F Y H.i A', strtotime($isi_kolom->create_at)) }}</td>
                            <td>
                                <a href="javascript:;" data-toggle="modal" data-target="#modal-{{ $nomor }}"
                                    class="btn btn-sm btn-primary text-center">Detail Validasi</a>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-{{ $nomor }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                                <b class="" style="margin: 0px">BAB {{ $isi_kolom->bab}} ({{ $isi_kolom->nama }})</b>
                                                <h6 class=" btn btn-dark btn-sm" style="margin: 0px"><code>Percobaan {{$isi_kolom->no_percobaan}} :
                                                        {{ $isi_kolom->nama_percobaan }}</code></h6>
                                                <small>Pengerjaan pada
                                                    {{ date('d F Y H.i A', strtotime($isi_kolom->create_at)) }}</small>
                                                <hr>
                                                <b>Source Code Jawaban Anda :</b>
                                                <div class="btn btn-success "
                                                    style="font-family: 'Courier New', Courier, monospace">
                                                    {{ $isi_kolom->report }}
                                                </div>
                                                <br>
                                                <a class="btn btn-info" href="{{ asset('python-resources/unittest/jawaban/'. $isi_kolom->file_submitted) }}.py"
                                                    download>Unduh Source Code</a>
                                                <br>
                                                <b>Hasil Unit Test : </b><br>
                                                <?php echo $isi_kolom->status ?>
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


<!-- JS Python -->
<!-- Option 1: Bundle Bootstrap dengan Popper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
