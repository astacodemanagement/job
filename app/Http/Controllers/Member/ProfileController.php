<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Kandidat;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Traits\UploadFile;

class ProfileController extends Controller
{
    use UploadFile;

    public function index()
    {
        
    }

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

        /** PASSPORT */
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

        /** UPLOAD DOCUMENET */
        else if ($request->type == 4) {
            $request->validate([
                    'file_foto' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp',
                    'file_paspor' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_ktp' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_kk' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_sertifikat_kompetensi' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_sertifikat_bahasa_inggris' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_paklaring' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_akta_lahir' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_ijazah' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                    'file_buku_nikah' => 'nullable|max:10240|mimes:jpeg,jpg,bmp,png,webp,pdf',
                ],
                [
                    'max' => 'Ukuran file :attribute maksimal 10MB',
                    'mimes' => 'Jenis file :attribute tidak didukung'
                ],
                [
                    'file_foto' => 'Foto',
                    'file_paspor' => 'Paspor',
                    'file_ktp' => 'KTP',
                    'file_kk' => 'Kartu Keluarga',
                    'file_sertifikat_kompetensi' => 'Sertifikat Kompetensi',
                    'file_sertifikat_bahasa_inggris' => 'Sertifikat Bahasa Inggris',
                    'file_paklaring' => 'Paklaring',
                    'file_akta_lahir' => 'Akta Lahir',
                    'file_ijazah' => 'Ijazah',
                    'file_buku_nikah' => 'Buku Nikah'
                ]
            );

            $request->merge([
                'ada_ktp' => $request->has('ada_ktp') ? 'Ya' : null,
                'ada_kk' => $request->has('ada_kk') ? 'Ya' : null,
                'ada_akta_lahir' => $request->has('ada_akta_lahir') ? 'Ya' : null,
                'ada_ijazah' => $request->has('ada_ijazah') ? 'Ya' : null,
                'ada_buku_nikah' => $request->has('ada_buku_nikah') ? 'Ya' : null,
                'ada_paspor' => $request->has('ada_paspor') ? 'Ya' : null
            ]);

            $arrDoc = [
                [
                    'input' => 'file_foto',
                    'field' => 'foto',
                    'dir' => 'foto',
                ],
                [
                    'input' => 'file_paspor',
                    'field' => 'paspor',
                    'dir' => 'paspor',
                ],
                [
                    'input' => 'file_ktp',
                    'field' => 'ktp',
                    'dir' => 'ktp',
                ],
                [
                    'input' => 'file_kk',
                    'field' => 'kk',
                    'dir' => 'kartu-keluarga',
                ],
                [
                    'input' => 'file_sertifikat_kompetensi',
                    'field' => 'sertifikat_kompetensi',
                    'dir' => 'sertifikat-kompetensi',
                ],
                [
                    'input' => 'file_sertifikat_bahasa_inggris',
                    'field' => 'sertifikat_bahasa_inggris',
                    'dir' => 'sertifikat-bahasa-inggris',
                ],
                [
                    'input' => 'file_paklaring',
                    'field' => 'paklaring',
                    'dir' => 'paklaring',
                ],
                [
                    'input' => 'file_akta_lahir',
                    'field' => 'akta_lahir',
                    'dir' => 'akta-lahir',
                ],
                [
                    'input' => 'file_ijazah',
                    'field' => 'ijazah',
                    'dir' => 'ijazah',
                ],
                [
                    'input' => 'file_buku_nikah',
                    'field' => 'buku_nikah',
                    'dir' => 'buku-nikah',
                ],
            ];
            
            foreach ($arrDoc as $doc) {
                /** UPLOAD */
                if ($request->hasFile($doc['input'])) {
                    $file = $request->{$doc['input']};
                    $filename = $file->hashName();
                    $fileExtention = $file->extension();
                    $dir = 'upload/' . $doc['dir'] . '/';
                    
                    if ($fileExtention === 'pdf') {
                        $upload = $this->uploadFile($file, $dir, $filename);
                    } else {
                        $upload = $this->uploadImage($file, $dir, $filename, [['width' => '400', 'height' => '400']]);
                    }

                    if ($upload) {
                        if (File::exists(public_path($dir . $kandidat->{$doc['field']}))) {
                            File::delete(public_path($dir . $kandidat->{$doc['field']}));
                        }

                        if (File::exists(public_path($dir . 'thumb_' . $kandidat->{$doc['field']}))) {
                            File::delete(public_path($dir . 'thumb_' . $kandidat->{$doc['field']}));
                        }

                        $request->merge([$doc['field'] => $filename]);
                    }
                }
            }

            $kandidat->update($request->except(['type', 'file_foto', 'file_paspor', 'file_kk', 'file_ktp', 'file_sertifikat_kompetensi', 'file_sertifikat_bahasa_inggris', 'file_paklaring', 'file_akta_lahir', 'file_buku_nikah', 'file_ijazah']));

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui', '_token' => csrf_token()]);
        }

        return response()->json(['success' => false, 'message' => 'Profil gagal diperbarui', '_token' => csrf_token()], 400);
    }
}
