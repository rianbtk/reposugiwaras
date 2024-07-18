<?php

namespace App\Http\Controllers\python;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index()
    {

        $dt_hasil = array();

        // ambil hasil berdasarkan id user
        $hasil = DB::table("Validasi")->select('Validasi.*', 'nama_percobaan', 'nama', 'bab', 'no_percobaan', 'checkresult')
            ->join('Percobaan', 'Percobaan.id_percobaan', '=', 'Validasi.id_percobaan')
            ->join('std_submit', 'std_submit.id_submit', '=', 'Validasi.id_submit')
            ->join('Topik', 'Topik.id_topik', '=', 'std_submit.id_topic')
            ->where('Validasi.userid', Auth::id())->get();

        foreach ($hasil as $isi_kolom) {

            // id_mahasiswa (id yang mengerjakan)
            $id_user = $isi_kolom->userid;

            // ambil informasi data user berdasarkan id_mahasiswa
            $mhs = DB::table('users')->where('id', $id_user)->first();
            $id_dospem = $mhs->levelid;

            // ambil informasi data user berdasarkan id_dosen pembimbng mhs
            $dosen = DB::table('users')->where('id', $id_dospem)->first();

            // tambahkan informasi isi kolom
            $isi_kolom->nama_dosen = $dosen->name;

            // masukkan ke dalam array dt_hasil
            array_push($dt_hasil, $isi_kolom);

        }

        // view
        return view('student.pythoncourse.python_result.result_student', compact('dt_hasil'));
    }

    public function student_submit()
    {

        $allData = array();

        // tampil data topik
        $dt_topik = DB::table('Topik')->get();

        foreach ($dt_topik as $topik) {

            // echo '<h2>'.$topik->nama.'</h2>';

            // tampil data percobaan berdasarkan dt_topik
            $dt_percobaan = DB::table('Percobaan')->where('id_topik', $topik->id_topik)->get();

            // tampil data validation (yang telah mengumpulkan dan bernilai PASSED) : mhs
            $allPercobaan = array();

            foreach ($dt_percobaan as $percobaan) {

                $where = [

                    'id_percobaan' => $percobaan->id_percobaan,
                    'levelid' => Auth::id(), // id_dosen
                ];

                $dt_submit = DB::table("std_submit")->select("std_submit.*", 'users.id', 'users.name')
                    ->join('users', 'users.id', '=', 'std_submit.userid')
                    ->where($where)->groupBy('std_submit.userid');

                $totalEnroll = $dt_submit->count();
                $dataSubmit = $dt_submit->get();

                array_push($allPercobaan, array(

                    'percobaan' => $percobaan,
                    'submitted' => $dataSubmit,
                    'total' => $totalEnroll,
                ));
            }

            array_push($allData, array(

                'topik' => $topik,
                'materi' => $allPercobaan,
            ));
        }

        // hitung mahasiswa berdasarkan dospem
        $mhs = DB::table('users')->where('levelid', Auth::id())->count();
        $dosen = DB::table('users')->where('id', Auth::id())->first();

        return view('teacher.python.py_student_results', compact('allData', 'mhs', 'dosen'));

    }

    // detail
    public function detail($id_topik, $id_percobaan)
    {

        $allData = array();

        // tampil data topik
        $topik = DB::table('Topik')->where('id_topik', $id_topik)->first();

        // tampil data percobaan berdasarkan dt_topik
        $dt_percobaan = DB::table('Percobaan')->where('id_percobaan', $id_percobaan)->first();

        // tampil data validation (yang telah mengumpulkan dan bernilai PASSED) : mhs
        $allPercobaan = array();

        $where = [
            'id_percobaan' => $id_percobaan,
            'levelid' => Auth::id(), // id_dosen
        ];

        $allSubmit = array();
        $dt_submit = DB::table("std_submit")->select("std_submit.*", 'users.id', 'users.name')
            ->join('users', 'users.id', '=', 'std_submit.userid')
            ->where($where)->groupBy('std_submit.userid');

        foreach ($dt_submit->get() as $row) {

            // detail submit
            $where = array('std_submit.userid' => $row->id, 'std_submit.id_percobaan' => $id_percobaan);

            $detail = DB::table("std_submit")->select("std_submit.*", "Validasi.*")
                ->join('Validasi', 'std_submit.id_submit', '=', 'Validasi.id_submit', 'left outer')
                ->where($where)->get();

            $wherePassed = array_merge($where, array('checkstat' => "PASSED"));
            $cekKondisi = DB::table("std_submit")->select("std_submit.*")->where($wherePassed)->count();
            $statusPassed = false;

            if ($cekKondisi > 0) {
                $statusPassed = true;
            }

            array_push($allSubmit, array(

                'infoMhs' => $row,
                'log' => $detail,
                'status' => $statusPassed,
            ));

        }

        // hitung mahasiswa berdasarkan dospem
        $mhs = DB::table('users')->where('levelid', Auth::id())->count();
        $dosen = DB::table('users')->where('id', Auth::id())->first();

        return view('teacher.python.py_student_result_detail', compact('allSubmit', 'mhs', 'dosen', 'topik', 'dt_percobaan'));
    }

}
