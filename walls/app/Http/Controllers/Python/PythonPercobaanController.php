<?php

namespace App\Http\Controllers\python;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PythonPercobaanController extends Controller
{
    //Tampilan tabel percobaan
    public function index()
    {

        // $percobaan = DB::table('Percobaan')->get();
        $joinAntaraPercobaanTopik = DB::table('Percobaan')->select('Percobaan.*', 'Topik.nama')
            ->join('Topik', 'Topik.id_topik', '=', 'Percobaan.id_topik')
            ->get();

        return view('admin.python.percobaan', compact('joinAntaraPercobaanTopik'));
    }

    //Tampilan Tambah Percobaan
    public function tambah()
    {

        $dt_topik = DB::table('Topik')->get();
        return view('admin.python.tambahpercobaan', compact('dt_topik'));

    }

    //Proses Tambah Percobaan
    public function proses_tambah(Request $request)
    {

        $ambilidtopik = $request->input('id_topik');
        $ambilnopercobaan = $request->input('no_percobaan');
        $ambilnamapercobaan = $request->input('nama_percobaan');
        $ambilcatatan = $request->input('catatan');
        $ambilpanduanpath = $request->input('panduanpath');
        $ambilfiletest = $request->input('filetest');
        $ambildeskripsi = $request->input('deskripsi');
        $texteditor = $request->input('texteditor');

        $filename = "";
        /** Start upload file test */

        //Ambil data nama folder pada data topik
        $dt_topik = DB::table('Topik')->where('id_topik', $ambilidtopik)->first();
        $destination_path = public_path() . "/python-resources/unittest/";

        //Lakukan upload
        $validatedData = Validator::make($request->all(), [
            'filetest' => 'required|py|max:2048',
        ]);

        //Menyimpan data file yang diupload ke variabel $file
        $file = $request->file('filetest');

        //Upload file
        $pathUpload = "python-resources/unittest/";

        $nama_file = $file->getClientOriginalName();
        $file->move($pathUpload, $nama_file);
        // /** end upload testfile */

        $dt_Percobaan = array(

            'id_topik' => $ambilidtopik,
            'no_percobaan' => $ambilnopercobaan,
            'nama_percobaan' => $ambilnamapercobaan,
            'catatan' => $ambilcatatan,
            'panduanpath' => $ambilpanduanpath,
            'filetest' => $nama_file,
            'deskripsi' => $ambildeskripsi,
            'texteditor' => $texteditor,
        );

        DB::table('Percobaan')->insert($dt_Percobaan);
        return redirect('/admin/python/percobaan');
    }

    //Proses Hapus
    public function proses_hapus($id_percobaan)
    {

        //Hapus old file
        $dt_topik_detail = DB::table('Percobaan')->where('id_percobaan', $id_percobaan)->first();
        //Hapus file lama
        $old_filename = "/python-resources/unittest/" . $dt_topik_detail->filetest;

        unlink($path . $old_filename);

        // ------

        DB::table('Percobaan')->where('id_percobaan', '=', $id_percobaan)->delete();

        return redirect('/admin/python/percobaan');
    }

    //Tampilan Edit Percobaan
    public function edit($id_percobaan)
    {

        $dt_topik = DB::table('Topik')->get();
        $percobaan = DB::table('Percobaan')->where('id_percobaan', '=', $id_percobaan)->first();
        return view('admin.python.editpercobaan', compact('percobaan', 'dt_topik'));

    }

    //Proses Edit
    public function proses_edit(Request $request, $id_percobaan)
    {

        $dt_topik_detail = DB::table('Percobaan')->where('id_percobaan', $id_percobaan)->first();

        $ambilidtopik = $request->input('id_topik');
        $ambilnopercobaan = $request->input('no_percobaan');
        $ambilnamapercobaan = $request->input('nama_percobaan');
        $ambilcatatan = $request->input('catatan');
        $ambilpanduanpath = $request->input('panduanpath');
        $ambilfiletest = $request->input('filetest');
        $ambildeskripsi = $request->input('deskripsi');
        $texteditor = $request->input('texteditor');

        //Ambil data nama folder pada data topik
        $dt_topik = DB::table('Topik')->where('id_topik', $ambilidtopik)->first();

        //Upload file
        $pathUpload = "python-resources/unittest/";

        $filename = "";

        //Cek apakah user melakukan upload file ?
        if ($_FILES['filetest']['name']) {

            //Hapus file lama
            $old_filename = "/python-resources/unittest/" . $dt_topik_detail->filetest;

            $folderfile = $old_filename;

            if (is_file($folderfile)) {

                unlink($folderfile);
            }

            //Tambah file baru
            //Lakukan upload
            $validatedData = Validator::make($request->all(), [
                'filetest' => 'required|py|max:2048',
            ]);

            //Menyimpan data file yang diupload ke variabel $file
            $file = $request->file('filetest');

            // $filename = strtoupper( uniqid() ).".py";
            $filename = $file->getClientOriginalName();
            $file->move($pathUpload, $filename);

        } else {

            $filename = $dt_topik_detail->filetest;
        }

        $dt_Percobaan = array(

            'id_topik' => $ambilidtopik,
            'no_percobaan' => $ambilnopercobaan,
            'nama_percobaan' => $ambilnamapercobaan,
            'catatan' => $ambilcatatan,
            'panduanpath' => $ambilpanduanpath,
            'filetest' => $filename,
            'deskripsi' => $ambildeskripsi,
            'texteditor' => $texteditor,
        );

        DB::table('Percobaan')->where('id_percobaan', '=', $id_percobaan)->update($dt_Percobaan);
        return redirect('/admin/python/percobaan');
    }
}
