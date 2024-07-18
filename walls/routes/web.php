<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create so mething great!
|
 */
// Python
use App\Http\Controllers\python\ExercisePythonController;
use App\Http\Controllers\python\PythonLearningTopicsController;
use App\Http\Controllers\python\PythonPercobaanController;
use App\Http\Controllers\python\ResultController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::resource('/admin/resetpassword', 'ResetPasswordController');

    // Python Topik Tampilan
    Route::get('/admin/python/topic', [PythonLearningTopicsController::class, 'index']);
    Route::get('/admin/python/tambahtopik', [PythonLearningTopicsController::class, 'tambah']);
    Route::get('/admin/python/edittopik/{id_topik}', [PythonLearningTopicsController::class, 'edit']);

    // Python Percobaan Tampilan
    Route::get('/admin/python/percobaan', [PythonPercobaanController::class, 'index']);
    Route::get('/admin/python/tambahpercobaan', [PythonPercobaanController::class, 'tambah']);
    Route::get('/admin/python/editpercobaan/{id_percobaan}', [PythonPercobaanController::class, 'edit']);

    // proses tambah + update
    Route::post('/admin/python/prosestambahtopik', [PythonLearningTopicsController::class, 'proses_tambah']);
    Route::post('/admin/python/prosesedittopik/{id_topik}', [PythonLearningTopicsController::class, 'proses_edit']);
    Route::post('/admin/python/prosestambahpercobaan', [PythonPercobaanController::class, 'proses_tambah']);
    Route::post('/admin/python/proseseditpercobaan/{id_percobaan}', [PythonPercobaanController::class, 'proses_edit']);

    // proses hapus
    Route::get('/admin/python/proseshapustopik/{id_topik}', [PythonLearningTopicsController::class, 'proses_hapus']);
    Route::get('/admin/python/proseshapuspercobaan/{id_percobaan}', [PythonPercobaanController::class, 'proses_hapus']);
    /* ----------------------------------- SQL ---------------------------------- */
});

Route::group(['middleware' => ['auth', 'teacher']], function () {
    Route::get('/teacher', 'TeacherController@index');
    Route::get('/teacher', 'TaskController@index');
    // Python
    //tampilan result mahasiswa dari dosen
    Route::get('teacher/python/resultstudent', [ResultController::class, 'student_submit']);
    Route::get('teacher/python/resultstudentdetail/{id_topik}/{id_percobaan}', [ResultController::class, 'detail']);

});

Route::group(['middleware' => ['auth', 'student']], function () {
    /** Python */
    //Tampilan topik
    Route::get('/student/pythoncourse', 'StudentController@pythoncourse');
    Route::get('/student/pythoncourse/python/task', [ExercisePythonController::class, 'index']);
    //Tampilan detail percobaan
    Route::get('/student/pythoncourse/python/taskdetail/{id_topik}', [ExercisePythonController::class, 'detail_percobaan']);
    //Tampilan pengerjaan (Teks Editor)
    Route::get('/student/pythoncourse/python/pengerjaan/{id_percobaan}', [ExercisePythonController::class, 'teks_editor']);
    // tampilan feedback
    Route::get('/student/pythoncourse/python/feedback/{id_topik}/{id_percobaan}', [ExercisePythonController::class, 'feedback']);
    //Compile Program
    Route::get('/student/pythoncourse/python-compile', [ExercisePythonController::class, 'compiler']);
    //tampilan data validation
    Route::get('student/pythoncourse/python/tampil-data-validation', [ExercisePythonController::class, 'dataValidation']);
    //tampilan result mahasiswa
    Route::get('student/pythoncourse/python/result', [ResultController::class, 'index']);
    Route::get('pythonfeedback', [ExercisePythonController::class, 'feedback_submit']);

    Route::get("/student/pythoncourse/python-history/{id_topik}/{id_percobaan}", [ExercisePythonController::class, 'submit_history']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
