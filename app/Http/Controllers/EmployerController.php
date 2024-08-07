<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\LogHistori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployerController extends Controller
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
        $employer = Employer::orderBy('id', 'desc')->get();
        return view('back.employer.index', compact('employer'));
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
        // Validasi request
        $validator = Validator::make($request->all(), [
            'nama_employer' => 'required|unique:employer,nama_employer',
            
        ], [
            'nama_employer.required' => 'Nama Employer Wajib diisi',
            'nama_employer.unique' => 'Nama Employer sudah digunakan',
             
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $input = $request->all();

        // Simpan data spp ke database menggunakan fill()
        $employer = new Employer();
        $employer->fill($input);
        $employer->save();

        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Employer', $employer->id, $loggedInUserId, null, json_encode($employer));


        return response()->json(['message' => 'Data Berhasil Disimpan']);
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
        $employer = Employer::findOrFail($id);
        return response()->json($employer);
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
        $validator = Validator::make($request->all(), [
            'nama_employer' => 'required',
           
        ], [
            'nama_employer.required' => 'Nama Employer Wajib diisi',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employer = Employer::findOrFail($id);
        $oldData = $employer->getOriginal();

        // Update data
        $employer->update([
            'nama_employer' => $request->nama_employer,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
        ]);


        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Update', 'Employer', $employer->id, $loggedInUserId, json_encode($oldData), json_encode($employer));

        return response()->json(['message' => 'Data berhasil diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::findOrFail($id);
            
        if (!$employer) {
            return response()->json(['message' => 'Data Employer not found'], 404);
        }

        $employer->delete();
        $loggedInUserId = Auth::id();
        $this->simpanLogHistori('Delete', 'Employer', $id, $loggedInUserId, json_encode($employer), null);

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }

  

   

  
 
   

    // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
  






}
