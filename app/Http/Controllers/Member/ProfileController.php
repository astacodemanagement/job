<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('front.member.profile.edit');
    }

    public function update(Request $request)
    {
        $kandidat = auth()->user()->kandidat;

        /** PERSONAL INFORMATION VALIDATION */
        if ($request->type == 1) {
            $wilayah = Kecamatan::find($request->wilayah);
            $kota = Kota::find($wilayah?->kota_id);
            $provinsi = Provinsi::find($wilayah?->kota?->provinsi_id);

            $request->merge([
                'no_hp' => str_replace(' ', '', $request->no_hp),
                'no_wa' => str_replace(' ', '', $request->no_wa),
                'no_telp_darurat' => str_replace(' ', '', $request->no_telp_darurat),
                'kecamatan_id' => $request->wilayah,
                'kota_id' => $kota->id,
                'provinsi_id' => $provinsi->id,
            ]);

            $request->validate([
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date_format:Y-m-d',
                'agama' => 'required|numeric',
                'berat_badan' => 'required|numeric',
                'tinggi_badan' => 'required|numeric',
                'jenis_kelamin' => 'required|in:P,W',
                'status_kawin' => 'required',
                'pendidikan' => 'required',
                'nama_lengkap_ayah' => 'required',
                'nama_lengkap_ibu' => 'required',
                'alamat' => 'required|min:5',
                'wilayah' => 'required|numeric',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'no_hp' => 'required|numeric|min_digits:6|max_digits:14',
                'no_wa' => 'required|numeric|min_digits:6|max_digits:14',
                'nama_keluarga' => 'required',
                'hubungan' => 'required',
                'no_telp_darurat' => 'required|numeric|min_digits:6|max_digits:14',
            ]);

            $statusKawin = [
                0 => null,
                1 => 'Belum Menikah',
                2 => 'Menikah',
                3 => 'Cerai'
            ];

            $pendidikanTerakhir = [
                1 => 'Tidak/Belum Sekolah',
                2 => 'SD',
                3 => 'SMP/Sederajat',
                4 => 'SMA/SMK/Sederajat',
                5 => 'Diploma',
                6 => 'Sarjana'
            ];

            $agama = [
                0 => null,
                1 => 'Islam',
                2 => 'Kristen',
                3 => 'Katolik',
                4 => 'Hindu',
                5 => 'Buddha',
                6 => 'Khonghucu',
                7 => 'Lainnya'
            ];

            $request->merge([
                'jenis_kelamin' => $request->jenis_kelamin == 'P' ? 'Laki-laki' : 'Perempuan',
                'status_kawin' => $statusKawin[$request->status_kawin],
                'pendidikan' => $pendidikanTerakhir[$request->pendidikan],
                'agama' => $agama[$request->agama],
            ]);

            $kandidat->update($request->except(['wilayah', 'type']));

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui', '_token' => csrf_token()]);
        }

        else if ($request->type == 2) {
            $kondisiPaspor = [
                0 => null,
                1 => "Paspor saya fisiknya masih ada",
                2 => "Paspor saya hilang",
                3 => "Paspor saya rusak",
                4 => "Paspor saya ditahan agency sebelumnya",
                5 => "Paspor saya terdapat data yang berbeda",
            ];

            $request->validate([
                'no_paspor' => 'required|numeric|max_digits:16|min_digits:16',
                'tanggal_pengeluaran_paspor' => 'required|date_format:Y-m-d',
                'masa_kadaluarsa' => 'required|date_format:Y-m-d',
                'kantor_paspor' => 'required|min:3',
                'kondisi_paspor' => 'required|numeric'
            ]);
            
            $request->merge([
                'kondisi_paspor' => $kondisiPaspor[$request->kondisi_paspor],
            ]);

            $kandidat->update($request->except(['type']));

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui', '_token' => csrf_token()]);
        }

        else if ($request->type == 4) {
            $request->merge([
                'ada_ktp' => $request->has('ada_ktp') ? 'Ya' : null,
                'ada_kk' => $request->has('ada_kk') ? 'Ya' : null,
                'ada_akta_lahir' => $request->has('ada_akta_lahir') ? 'Ya' : null,
                'ada_ijazah' => $request->has('ada_ijazah') ? 'Ya' : null,
                'ada_buku_nikah' => $request->has('ada_buku_nikah') ? 'Ya' : null,
                'ada_paspor' => $request->has('ada_paspor') ? 'Ya' : null
            ]);

            /** UPLOAD FOTO */
            if ($request->hasFile('file_foto')) {
                $filenameFoto = $request->file_foto->hashName();
                $dirFoto = 'upload/foto/';

                $uploadFoto = Storage::disk('public_uploads')->putFileAs($dirFoto, $request->file_foto, $filenameFoto, 'public');

                if ($uploadFoto) {
                    $request->merge(['foto' => $filenameFoto]);
                }
            }

            /** UPLOAD PASPOR */
            if ($request->hasFile('file_paspor')) {
                $filenamePaspor = $request->file_paspor->hashName();
                $dirPaspor = 'upload/paspor/';

                $uploadPaspor = Storage::disk('public_uploads')->putFileAs($dirPaspor, $request->file_paspor, $filenamePaspor, 'public');

                if ($uploadPaspor) {
                    $request->merge(['paspor' => $filenamePaspor]);
                }
            }

            /** UPLOAD KTP */
            if ($request->hasFile('file_ktp')) {
                $filenameKTP = $request->file_ktp->hashName();
                $dirKTP = 'upload/ktp/';

                $uploadKTP = Storage::disk('public_uploads')->putFileAs($dirKTP, $request->file_ktp, $filenameKTP, 'public');

                if ($uploadKTP) {
                    $request->merge(['ktp' => $filenameKTP]);
                }
            }

            /** UPLOAD KK */
            if ($request->hasFile('file_kk')) {
                $filenameKK = $request->file_kk->hashName();
                $dirKK = 'upload/kartu-keluarga/';

                $uploadKK = Storage::disk('public_uploads')->putFileAs($dirKK, $request->file_kk, $filenameKK, 'public');

                if ($uploadKK) {
                    $request->merge(['ktp' => $filenameKK]);
                }
            }

            /** UPLOAD SERTIFIKAT KOMPETENSI */
            if ($request->hasFile('file_sertifikat_kompetensi')) {
                $filenameSK = $request->file_sertifikat_kompetensi->hashName();
                $dirSK = 'upload/sertifikat-kompetensi/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirSK, $request->file_sertifikat_kompetensi, $filenameSK, 'public');

                if ($uploadSK) {
                    $request->merge(['sertifikat_kompetensi' => $filenameSK]);
                }
            }

            /** UPLOAD SERTIFIKAT BAHASA INGGRIS */
            if ($request->hasFile('file_sertifikat_bahasa_inggris')) {
                $filenameSK = $request->file_sertifikat_bahasa_inggris->hashName();
                $dirSertifikat = 'upload/sertifikat-bahasa-inggris/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirSertifikat, $request->file_sertifikat_bahasa_inggris, $filenameSK, 'public');

                if ($uploadSK) {
                    $request->merge(['sertifikat_bahasa_inggris' => $filenameSK]);
                }
            }

            /** UPLOAD PAKLARING */
            if ($request->hasFile('file_paklaring')) {
                $filenamePaklaring = $request->file_paklaring->hashName();
                $dirPK = 'upload/paklaring/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirPK, $request->file_paklaring, $filenamePaklaring, 'public');

                if ($uploadSK) {
                    $request->merge(['paklaring' => $filenamePaklaring]);
                }
            }

            /** UPLOAD AKTA LAHIR */
            if ($request->hasFile('file_akta_lahir')) {
                $filenameAkta = $request->file_akta_lahir->hashName();
                $dirAkta = 'upload/akta-lahir/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirAkta, $request->file_akta_lahir, $filenameAkta, 'public');

                if ($uploadSK) {
                    $request->merge(['akta_lahir' => $filenameAkta]);
                }
            }

            /** UPLOAD IJAZAH */
            if ($request->hasFile('file_ijazah')) {
                $filenameIjazah = $request->file_ijazah->hashName();
                $dirIjazah = 'upload/ijazah/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirIjazah, $request->file_ijazah, $filenameIjazah, 'public');

                if ($uploadSK) {
                    $request->merge(['ijazah' => $filenameIjazah]);
                }
            }

            /** UPLOAD BUKU NIKAH */
            if ($request->hasFile('file_buku_nikah')) {
                $filenameBN = $request->file_buku_nikah->hashName();
                $dirBN = 'upload/buku-nikah/';

                $uploadSK = Storage::disk('public_uploads')->putFileAs($dirBN, $request->file_buku_nikah, $filenameBN, 'public');

                if ($uploadSK) {
                    $request->merge(['buku_nikah' => $filenameBN]);
                }
            }

            $kandidat->update($request->except(['type', 'file_foto', 'file_paspor', 'file_kk', 'file_ktp', 'file_sertifikat_kompetensi', 'file_sertifikat_bahasa_inggris', 'file_paklaring', 'file_akta_lahir', 'file_buku_nikah', 'file_ijazah']));

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui', '_token' => csrf_token()]);
        }

        return response()->json(['success' => false, 'message' => 'Profil gagal diperbarui', '_token' => csrf_token()], 400);
    }
}
