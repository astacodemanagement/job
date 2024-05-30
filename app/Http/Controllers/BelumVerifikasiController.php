<?php

namespace App\Http\Controllers;

use App\Models\KategoriJob;
use App\Models\Pendaftaran;
use App\Models\LogHistori;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class BelumVerifikasiController extends Controller
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

    public function index(Request $request)
    {
        // search jika ada
        $search = $request->input('search');
        if($search){
            $belum_diverifikasi = Pendaftaran::where('status', 'Belum Verifikasi(Pending)')->with('kandidat')
            ->whereHas('kandidat', function($query) use ($search){
                $query->where('provinsi', 'like', '%'.$search.'%');
            })
            ->orWhere('nama_lengkap', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')->paginate(4);
        }else{
            $belum_diverifikasi = Pendaftaran::where('status', 'Belum Verifikasi(Pending)')->orderBy('id', 'desc')->paginate(4);  
        }
        
        $filter_job = $request->input('filter_job');
        if($filter_job){
            $belum_diverifikasi = Pendaftaran::where('status', 'Belum Verifikasi(Pending)')
            ->where('kategori_job_id', $filter_job)
            
            ->orderBy('id', 'desc')->paginate(4);
        }
        $kategori_job = KategoriJob::all();
        
        return view('back.belum_diverifikasi.index', compact('belum_diverifikasi','search','kategori_job','filter_job'));
      
    }


    public function updateStatus(Request $request)
    {
        $pendaftaranId = $request->input('pendaftaran_id');
        $status = $request->input('status');
        // $blacklist = $request->input('blacklist');
        $alasan_reject = $request->input('alasan_reject');

        // Get the original data before the update
        $belum_diverifikasi = Pendaftaran::findOrFail($pendaftaranId);
        $oldData = $belum_diverifikasi->getOriginal();

      // Update the status in the database
        Pendaftaran::where('id', $pendaftaranId)->update([
            'status' => $status,
            'tanggal_reject_verifikasi' => Carbon::now()->toDateString(),
            'tanggal_sudah_verifikasi' => Carbon::now()->toDateString(),
            'tanggal_cek_verifikasi' => Carbon::now()->toDateString(),
            'alasan_reject' => $alasan_reject,
             
        ]);

        // Get the updated data after the update
        $updatedData = Pendaftaran::findOrFail($pendaftaranId)->getOriginal();

        // Log the histori
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Belum Verifikasi', $pendaftaranId, $loggedInUserId, json_encode($oldData), json_encode($updatedData));

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function updateDetail(Request $request, $id)
    {
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_negara' => 'required',
            'bukti_tf_cf' => 'mimes:jpg,jpeg,png,gif|max:2048', // Max 2 MB (2048 KB)
        ], [
            'nama_negara.required' => 'Nama negara Wajib diisi',
            'bukti_tf_cf.mimes' => 'Foto yang dimasukkan hanya diperbolehkan berekstensi JPG, JPEG, PNG dan GIF',
            'bukti_tf_cf.max' => 'Ukuran bukti_tf_cf tidak boleh lebih dari 2 MB',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $verifikasi = Pendaftaran::findOrFail($id);
    
        // Ambil hanya bidang-bidang yang ditentukan dari permintaan
        $input = $request->only([
            'negara_id', 'nama_negara', 'kategori_job_id', 'nama_kategori_job',
            'nik', 'nama_lengkap', 'bayar_cf', 'bukti_tf_cf', 'tanggal_tf_cf',
            'status_paid_cf', 'tanggal_refund_cf', 'bayar_refund_cf'
        ]);
    
        if ($request->has('bayar_cf')) {
            $input['bayar_cf'] = str_replace(',', '', $request->input('bayar_cf'));
        }
    
        if ($request->has('bayar_refund_cf')) {
            $input['bayar_refund_cf'] = str_replace(',', '', $request->input('bayar_refund_cf'));
        }
    
        if ($request->hasFile('bukti_tf_cf')) {
            $image = $request->file('bukti_tf_cf');
            $destinationPath = 'upload/bukti_tf_cf/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
    
            // Hapus file bukti_tf_cf lama jika ada
            if ($verifikasi->bukti_tf_cf && file_exists(public_path('upload/verifikasi/' . $verifikasi->bukti_tf_cf))) {
                unlink(public_path('upload/bukti_tf_cf/' . $verifikasi->bukti_tf_cf));
            }
    
            $input['bukti_tf_cf'] = $imageName;
        }
    
        // Update verifikasi data di database
        $verifikasi->update($input);
    
        $loggedInUserId = Auth::id();
        
      
        if($request->has("email")){
          User::where('id', $verifikasi->kandidat->user_id)::update([
            'email' => $request->email
          ]);
        }
        if($request->has("password")){
            User::where('id', $verifikasi->kandidat->user_id)::update([
                'password' => bcrypt($request->password)
            ]);
        }
        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Update Detail Verifikasi', $verifikasi->id, $loggedInUserId, json_encode($verifikasi->getOriginal()), json_encode($verifikasi));
    
        return response()->json(['message' => 'Data Berhasil Diupdate']);
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
    public function detail($id)
    {
        $data['belum_diverifikasi'] = Pendaftaran::where('id', $id)->with('kandidat')->first();
        $data["user_id"] =   $data['belum_diverifikasi']->kandidat->user_id;
        $data['user_info'] = User::where('id',   $data["user_id"] )->first();
        // return $data;
      return view('back.belum_diverifikasi.detail', $data );
    }

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
}
