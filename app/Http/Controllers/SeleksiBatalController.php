<?php

namespace App\Http\Controllers;

use App\Models\Seleksi;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SeleksiBatalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }

    public function index()
    {
        $seleksi = DB::table('seleksi')
            ->join('kandidat', 'seleksi.kandidat_id', '=', 'kandidat.id')
            ->join('job', 'seleksi.job_id', '=', 'job.id')
            ->join('kategori_job', 'job.kategori_job_id', '=', 'kategori_job.id')
            ->where('seleksi.status', 'Batal')  
            ->select(
                'seleksi.*',
                'kandidat.nama_kandidat',
                'job.nama_job',
                'job.nama_negara',
                'job.nama_perusahaan',
                'job.nama_kategori_job',
                'job.mitra',
                'kategori_job.urutan as kategori_urutan'
            )
            ->get();
    
        // Cetak hasil query ke konsol untuk diinspeksi
        \Illuminate\Support\Facades\Log::info('Query Result:', ['seleksi' => $seleksi]);
    
        $seleksi_group = $seleksi->groupBy('job_id');
    
        return view('back.seleksi_batal.index', compact('seleksi', 'seleksi_group'));
    }
    

    public function updateStatus(Request $request)
    {
        $cek_kualifikasi_id = $request->input('id');
        $status = $request->input('status');

        // Get the original data before the update
        $cek_kualifikasi = Seleksi::findOrFail($cek_kualifikasi_id);
        $oldData = $cek_kualifikasi->getOriginal();

        // Update the status in the database
        Seleksi::where('id', $cek_kualifikasi_id)->update(['status' => $status]);

        // Get the updated data after the update
        $updatedData = Seleksi::findOrFail($cek_kualifikasi_id)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Cek Kualifikasi', $cek_kualifikasi_id, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }









    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus







}