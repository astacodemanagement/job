@extends('front.compro-2.layouts.default')
@include('front.compro-2.component.noauth')
@section('content')
    <div class="relative">
        <!-- Gambar sebagai latar belakang -->
        <div class="tw-h-[230px] tw-bg-gradient-to-t tw-from-sky-400 tw-to-sky-600 tw-relative">
            <img src="{{ asset('frontend') }}/assets/image/bg-form.png " alt="" class="tw-absolute tw-inset-0 tw-w-full tw-h-full tw-object-cover">
            <div class="tw-absolute tw-inset-0 tw-flex tw-flex-col tw-items-center tw-justify-center">
                <h3 class="tw-text-white tw-text-center tw-pt-10 tw-font-caveat tw-text-5xl tw-font-bold">Form</h3>
                <h3 class="tw-text-white tw-text-center tw-text-6xl tw-mt-1 tw-font-semibold tw-mb-16 tw-font-clash-display">Pendaftaran</h3>
            </div>
        </div>
    </div>
    <div class="tw-flex tw-flex-row tw-justify-between tw-max-w-7xl tw-mx-auto tw-py-20    ">
        <!-- Stepper -->
        <div class="tw-w-1/4 tw-relative stepper" id="kt_stepper_example_vertical" data-kt-stepper="true">
            <div class="tw-flex tw-flex-col tw-items-center stepper-nav">
                <div class="tw-relative tw-w-full stepper-item" data-step="1">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">1</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
                    <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                    </div>
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 1</h3>
                        <p class="tw-text-sm tw-font-normal  tw-text-gray-500 stepper-desc">Minat Dan Informasi Pribadi</p>
                    </div>
                </div>
        
                <div class="tw-relative tw-w-full stepper-item" data-step="2">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-gray-300 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">2</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
                    <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                    </div>
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 2</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Dokumen Perjalanan Luar Negeri</p>
                    </div>
                </div>
                <div class="tw-relative tw-w-full stepper-item"  data-step="3">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">3</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
                    <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                    </div>
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 3</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Pengalaman Kerja</p>
                    </div>
                </div>
        
            
        
                <div class="tw-relative tw-w-full stepper-item"  data-step="4">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">4</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
                    <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                    </div>
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 4</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Ceklis Dokumen Pribadi</p>
                    </div>
                </div>
        
                <div class="tw-relative tw-w-full stepper-item"  data-step="5">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">5</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
                    <div class="tw-relative tw-mx-auto tw-mr-1">
                        <img src="{{ asset('frontend') }}/assets/image/framestriped.png" alt="" class="">
                    </div>
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 5</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Upload Dokumen</p>
                    </div>
                </div>
        
                <div class="tw-relative tw-w-full stepper-item"  data-step="6">
                    <div class="tw-h-16 tw-p-5 tw-w-16 tw-flex tw-items-center tw-justify-center tw-bg-sky-500 tw-rounded-xl">
                        <span class="tw-text-white tw-text-2xl tw-font-extrabold stepper-number">6</span>
                        <i class="fas fa-check tw-text-white tw-text-2xl " style="display: none"></i>
                    </div>
              
                    <div class="tw-absolute tw-top-1 tw-left-1/3 tw-text-2xl tw-font-bold tw-text-sky-500">
                        <h3 class="stepper-title">Step 6</h3>
                        <p class="tw-text-sm tw-font-normal tw-text-gray-500 stepper-desc">Kontak Akun</p>
                    </div>
                </div>
        
            </div>
        </div>
        
        
        
        
        
            <!-- form 1 -->
            <form data-step="1" method="POST" id="step-form-1" class="tw-flex tw-flex-col tw-w-2/3 step-form "  style="display: none">
                @csrf  
                
                <label for="minat" class="tw-text-gray-800 tw-font-medium tw-mb-3 tw-font-work-sans">Minat</label>
                <select name="negara_id" id="negara_id" class="tw-font-work-sans tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-bg-white tw-text-gray-600 tw-rounded-md" required>
                    <option value="" readonly>Negara Yang Diminati</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->nama_negara }}</option>
                @endforeach
                </select>
                <p class="tw-text-red-500 error-minat" style="display: none"></p>
                {{-- kategori yang diminati --}}
                <select name="kategori_job_id" id="kategori" class="tw-font-work-sans tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-bg-white tw-text-gray-600 tw-rounded-md" required>
                    <option value="" readonly>Kategori Yang Diminati</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nama_kategori_job }}
                    </option>
                @endforeach
                </select>
                <p class="tw-text-red-500 error-kategori" style="display: none"></p>
                <label for="nik" class="tw-text-gray-800 tw-font-medium tw-mt-3 tw-font-work-sans">Informasi Pribadi</label>
                <input type="text" name="nik" id="nik" placeholder="Nomor E-KTP (NIK)" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                <p class="tw-text-red-500 error-nik" style="display: none"></p>
                
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                <p class="tw-text-red-500 error-nama_lengkap" style="display: none"></p>
                
                <div class="tw-flex tw-justify-around tw-flex-wrap tw-gap-5">
                    <div class="tw-w-[48%] tw-flex tw-flex-col">
                        <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-tempat_lahir" style="display: none"></p>
                    </div>
                    <div class="tw-w-[48%] tw-flex tw-flex-col">
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-tanggal_lahir" style="display: none"></p>
                    </div>
                </div>
                
                
                <select name="agama" id="agama" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                    <option value="">Agama</option>
                    <option value="1">Islam</option>
                    <option value="2">Kristen</option>
                    <option value="3">Katolik</option>
                    <option value="4">Hindu</option>
                    <option value="5">Buddha</option>
                    <option value="6">Khonghucu</option>
                    <option value="7">Lainnya</option>
                </select>
                <p class="tw-text-red-500 error-agama" style="display: none"></p>
                
                <div class="tw-flex tw-justify-between tw-gap-5">
                    <div class="tw-w-1/2 tw-flex tw-flex-col">
                        <input type="number" name="berat_badan" id="berat_badan" placeholder="Berat Badan" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-berat_badan" style="display: none"></p>
                    </div>
                    <div class="tw-w-1/2 tw-flex tw-flex-col">
                        <input type="number" name="tinggi_badan" id="tinggi_badan" placeholder="Tinggi Badan" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-tinggi_badan" style="display: none"></p>
                    </div>
                </div>
                
                
                <select name="jenis_kelamin" id="jenis_kelamin" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                    <option value="">Jenis Kelamin</option>
                    <option value="P">Pria</option>
                    <option value="W">Wanita</option>
                </select>
                <p class="tw-text-red-500 error-jenis_kelamin" style="display: none"></p>
                
                <select name="status_kawin" id="status_kawin" class="tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                    <option value="">Status Kawin</option>
                    <option value="1">Belum Menikah</option>
                    <option value="2">Menikah</option>
                    <option value="3">Cerai</option>
                </select>
                <p class="tw-text-red-500 error-status_kawin" style="display: none"></p>
                
             {{-- flex setagnah setengah ayah ibu--}}
                <div class="tw-flex tw-justify-between tw-gap-5">
                    <div class="tw-w-1/2 tw-flex tw-flex-col">
                        <input type="text" name="nama_lengkap_ayah" id="nama_lengkap_ayah" placeholder="Nama Ayah" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-nama_lengkap_ayah" style="display: none"></p>
                    </div>
                    <div class="tw-w-1/2 tw-flex tw-flex-col">
                        <input type="text" name="nama_lengkap_ibu" id="nama_lengkap_ibu" placeholder="Nama Ibu" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
                        <p class="tw-text-red-500 error-nama_lengkap_ibu" style="display: none"></p>
                    </div>
                </div>
           

                <textarea name="alamat" id="alamat" placeholder="Alamat" class="tw-p-2 tw-mb-4 tw-border tw-border-gray-300 tw-mt-4 tw-rounded-md " rows="3" required></textarea>
                <p class="tw-text-red-500 error-alamat" style="display: none"></p>
            
                <select name="wilayah" id="wilayah" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md wilayah" required>
                </select>
                <p class="tw-text-red-500 error-wilayah" style="display: none"></p>
                {{-- referensi --}}
                <select name="referensi" id="referensi" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
                    <option value="">Referensi</option>
                    <option value="1">Google</option>
                    <option value="2">Instagram</option>
                    <option value="3">Facebook</option>
                    <option value="4">Tiktok</option>
                    <option value="5">Teman/Saudara/Keluarga</option>
                    <option value="6">Sponsor</option>
                    <option value="7">Lainnya</option>
                </select>   
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
            </form>  
        {{-- form 2 --}}
        <form data-step="2" method="POST" id="step-form-2" class="tw-flex tw-flex-col tw-w-2/3 step-form">
            @csrf
            <label for="no_paspor" class="tw-text-gray-800 tw-font-medium tw-mb-3 tw-font-work-sans">Nomor Paspor</label>
            <input type="text" name="no_paspor" id="no_paspor" placeholder="Nomor Paspor" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
            <p class="tw-text-red-500 error-no_paspor" style="display: none"></p>
            
            <div class="form-group mt-3">
                <div class="input-group">
                    <input type="text" class="form-control tanggal-pengeluaran-paspor" placeholder="Tanggal Pengeluaran Paspor / Date of Issue">
                    <input type="text" class="form-control h-tanggal-pengeluaran-paspor d-none" name="tanggal_pengeluaran_paspor">
                </div>
            </div> <p class="tw-text-red-500 error-tanggal_pengeluaran_paspor" style="display: none"></p>
          {{--masa kadaluarsa  --}}
            <div class="form-group mt-3">
                <div class="input-group">
                    <input type="text" class="form-control masa-kadaluarsa" placeholder="Masa Kadaluarsa Paspor / Date of Expiry">
                    <input type="text" class="form-control h-masa-kadaluarsa d-none" name="masa_kadaluarsa">
                </div>
            </div>
            <p class="tw-text-red-500 error-masa_kadaluarsa" style="display: none"></p>
           {{-- kantor yang mengeluarkan passpor input text --}}
            <input type="text" name="kantor_paspor" id="kantor_paspor" placeholder="Kantor Yang Mengeluarkan Paspor" class="tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" required>
            
            <label for="kondisi_paspor" class="tw-text-gray-800 tw-font-medium tw-mt-3 tw-font-work-sans">Negara Paspor</label>
            <select name="kondisi_paspor" id="kondisi_paspor" class="tw-font-work-sans tw-text-gray-600 tw-bg-white tw-mt-4 tw-p-3 tw-border tw-px-3 tw-border-gray-300 tw-rounded-md" required>
               
                <option value="">Pilihlah Pertanyaan dibawah ini jika kamu memiliki Paspor</option>
                <option value="1">Paspor saya fisiknya masih ada</option>
                <option value="2">Paspor saya hilang</option>
                <option value="3">Paspor saya rusak</option>
                <option value="4">Paspor saya ditahan agency sebelumnya</option>
                <option value="5">Paspor saya terdapat data yang berbeda</option>
            </select>
            <p class="tw-text-red-500 error-kondisi_paspor" style="display: none"></p>

        <div class="tw-flex tw-gap-5">
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
            <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>

        </div>
        </form>
        {{-- form 3 --}}
    
        <form data-step="3" method="POST" id="step-form-3" class="tw-flex tw-flex-col tw-w-2/3 step-form" style="display: none">
            @csrf
            <div class="fv-row">
                <label class="form-label">Pengalaman Kerja</label>
            </div>
            <div class="fv-row row-list-experience"></div>
            <div class="fv-row mb-10 row-add-experience">
                <div class="form-group mb-5">
                    <input type="text" class="form-control input-add-experience experience-country tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" data-name="negara_tempat_kerja.0" placeholder="Negara Tempat Bekerja" name="negara_tempat_kerja[]">
                </div>
        
                <div class="form-group mb-5">
                    <input type="text" class="form-control input-add-experience experience-company tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" data-name="nama_perusahaan.0" placeholder="Nama Perusahaan atau Majikan" name="nama_perusahaan[]">
                </div>
        
                <div class="form-group row mb-5">
                    <div class="col-6">
                        <input type="text" class="form-control datetimepicker input-add-experience experience-start-work-date tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Tanggal mulai bekerja">
                        <input type="hidden" class="d-none tanggal-mulai-bekerja input-add-experience h-experience-start-work-date" data-name="tanggal_mulai_kerja.0" name="tanggal_mulai_kerja[]">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control datetimepicker input-add-experience experience-end-work-date tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Tanggal selesai bekerja">
                        <input type="hidden" class="d-none tanggal-selesai-bekerja input-add-experience h-experience-end-work-date" data-name="tanggal_selesai_kerja.0" name="tanggal_selesai_kerja[]">
                    </div>
                </div>
        
                <div class="form-group mb-5">
                    <input type="text" class="form-control input-add-experience experience-position tw-font-work-sans tw-font-medium tw-mt-4 tw-p-2 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Posisi" data-name="posisi.0" name="posisi[]">
                </div>
                <button type="button" class="button-experience w-100 tw-py-2 tw-px-5 tw-text-white tw-bg-sky-500 tw-rounded-md tw-mt-4"><i class="fas fa-plus"></i> Tambahkan Pengalaman Kerja Lainnya</button>

                {{-- prev next --}}
            </div>
            <div class="tw-flex tw-gap-5">
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
            </div>
        
        </form>

        {{-- form 4 --}}
        <form data-step="4" method="POST" id="step-form-4" class="tw-flex tw-flex-col tw-w-2/3 step-form" style="display: none">
            @csrf
            <div class="fv-row mb-10">
                <label class="form-label">Dokumen Persyaratan Jati Diri yang dimiliki (ceklist
                    untuk berkas yang dimiliki)</label>
                <div class="row">
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_ktp" id="ktp">
                            <label class="form-check-label" for="ktp" style="padding-top:2px">
                                <b>KTP</b>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_kartu_keluarga" id="kk">
                            <label class="form-check-label" for="kk" style="padding-top:2px">
                                <b>Kartu Keluarga</b>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_akta_lahir" id="akta_lahir">
                            <label class="form-check-label" for="akta_lahir" style="padding-top:2px">
                                <b>Akta Lahir</b>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_ijazah" id="ijazah">
                            <label class="form-check-label" for="ijazah" style="padding-top:2px">
                                <b>Ijazah</b>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_buku_nikah" id="buku_nikah">
                            <label class="form-check-label" for="buku_nikah" style="padding-top:2px">
                                <b>Buku Nikah/Akta Cerai</b>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="check_paspor" id="paspor">
                            <label class="form-check-label" for="paspor" style="padding-top:2px">
                                <b>Paspor</b>
                            </label>
                        </div>
                        <div class="form-input mt-3">
                            <label for=""><i>Jelaskan jika kelengkapan berkas anda terdapat perbedaan nama/alamat/tempat tanggal lahir/hilang/rusak/lainnya:</i></label>
                            <textarea name="penjelasan_dokumen" cols="30" rows="2" class="form-control" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tw-flex tw-gap-5">
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 next-step">Next</button>
            </div>
        </form>
        {{-- form 5 --}}
        <form data-step="5" method="POST" id="step-form-5" class="tw-flex tw-flex-col tw-w-2/3 step-form" style="display: none">
            @csrf
            <div class="flex-column" data-kt-stepper-element="content">
                <div class="fv-row mb-10">
                    <label class="form-label">Upload Dokumen</label>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-input">
                                <div class="input-group">
                                    <label class="input-group-text" for="foto" style="width: 150px">Foto</label>
                                    <input type="file" class="form-control tw-w-full" id="foto" name="file_foto" accept="image/*,application/pdf">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small>Foto formal background putih/biru/merah</small></label>
                            </div>
                            <div class="form-input mt-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="paspor" style="width: 150px">Paspor</label>
                                    <input type="file" class="form-control tw-w-full" id="paspor" name="file_paspor" accept="image/*,application/pdf">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small>Jika ada</small></label>
                            </div>
                            <div class="form-input mt-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="ktp" style="width: 150px">KTP</label>
                                    <input type="file" class="form-control tw-w-full" id="ktp" name="file_ktp" accept="image/*,application/pdf">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small>Mohon di Scan</small></label>
                            </div>
                            <div class="form-input mt-2">
                                <div class="input-group">
                                    <label class="input-group-text" for="kk" style="width: 150px">Kartu Keluarga</label>
                                    <input type="file" class="form-control tw-w-full" id="kk" name="file_kk" accept="image/*,application/pdf">
                                </div>
                                <label class="text-muted tw-block tw-text-sm"><small>Mohon di Scan</small></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </form>
        {{-- form 6 --}}
        <form data-step="6" method="POST" id="step-form-6" class="tw-flex tw-flex-col tw-w-2/3 step-form" style="display: none">
            <div class="tw-flex tw-flex-col" data-kt-stepper-element="content">
                <div class="tw-mb-10">
                    <label class="tw-block tw-font-medium tw-mb-3">Kontak &amp; Akun</label>
                    <div class="tw-flex tw-flex-col tw-gap-3">
                        <div class="tw-mb-3">
                            <input type="email" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" placeholder="Email" name="email">
                        </div>
                        <div>
                            <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md phone-number" name="no_hp" placeholder="Nomor HP Aktif">
                        </div>
                        <div class="tw-mb-3 tw-pt-3 tw-pl-2 tw-pb-0">
                            <div class="tw-flex tw-items-center">
                                <input class="tw-mr-2" type="checkbox" name="check_whatsapp_number" id="check_whatsapp_number">
                                <label class="tw-text-gray-700" for="check_whatsapp_number">Nomor whatsapp sama dengan nomor handphone aktif</label>
                            </div>
                        </div>
                        <div class="tw-mb-3">
                            <input type="text" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md phone-number whatsapp-number" name="no_wa" placeholder="Nomor Whatsapp Aktif">
                        </div>
                        <div class="tw-mb-3">
                            <div class="tw-relative tw-flex">
                                <input type="password" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" name="password" placeholder="Password">
                                <button class="tw-absolute tw-right-0 tw-top-0 tw-h-full tw-px-3 tw-bg-gray-100 tw-rounded-r-md" type="button" id="show-password"><i class="fas fa-eye-slash"></i></button>
                            </div>
                        </div>
                        <div class="tw-mb-3">
                            <div class="tw-relative tw-flex">
                                <input type="password" class="tw-w-full tw-p-3 tw-border tw-border-gray-300 tw-rounded-md" name="password_confirmation" placeholder="Konfirmasi Password">
                                <button class="tw-absolute tw-right-0 tw-top-0 tw-h-full tw-px-3 tw-bg-gray-100 tw-rounded-r-md" type="button" id="show-password"><i class="fas fa-eye-slash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tw-flex tw-gap-5">
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-32 tw-bg-sky-500 tw-rounded-md tw-mt-4 prev-step">Previous</button>
                <button type="button" class="tw-py-2 tw-px-5 tw-text-white tw-w-20 tw-bg-sky-500 tw-rounded-md tw-mt-4 finish-step">Kirim</button>
            </div>
        </form>            
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        let datepickerOption = {
            format: "dd MM yyyy",
            autoclose: true
        }

        $('.tanggal-lahir').datepicker(datepickerOption).on('changeDate', function(e) {
            $('.h-tanggal-lahir').val(e.format(0, "yyyy-mm-dd"))
        });

        $('.tanggal-pengeluaran-paspor').datepicker(datepickerOption).on('changeDate', function(e) {
            $('.h-tanggal-pengeluaran-paspor').val(e.format(0, "yyyy-mm-dd"))
        });

        $('.masa-kadaluarsa').datepicker(datepickerOption).on('changeDate', function(e) {
            $('.h-masa-kadaluarsa').val(e.format(0, "yyyy-mm-dd"))
        });

        initExperienceDatepicker()
        function initExperienceDatepicker() {
            $('.experience-start-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
                $(this).closest('div').find('.h-experience-start-work-date').val(e.format(0, "yyyy-mm-dd"))
            });

            $('.experience-end-work-date').datepicker(datepickerOption).on('changeDate', function(e) {
                $(this).closest('div').find('.h-experience-end-work-date').val(e.format(0, "yyyy-mm-dd"))
            });
        }
        $(".select2").select2({
                theme: 'bootstrap-5'
            });

            $('.wilayah').select2({
                theme: 'bootstrap-5',
                placeholder: "Cari Kecamatan, Kota atau Provinsi",
                minimumInputLength: 1,
                ajax: {
                    url: `{{ route('ajax.wilayah.search') }}`,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    text: `${item.nama_provinsi}, ${item.nama_kota}, ${item.nama_kecamatan}`,
                                    id: item.id,
                                }
                            }),
                            pagination: {
                                more: data.more_pagination
                            }
                        }
                    },
                    cache: true
                }
            })
         
        let currentStep = 1;
        function showStep(step) {
            $('.stepper-item').each(function() {
                const stepNumber = $(this).data('step');
                if (stepNumber == step) {
                    $(this).find('.tw-bg-gray-300').removeClass('tw-bg-gray-300').addClass('tw-bg-sky-500');
                } else {
                    $(this).find('.tw-bg-sky-500').removeClass('tw-bg-sky-500').addClass('tw-bg-gray-300');
                }
    
                if (stepNumber < step) {
                    $(this).find('.fa-check').removeClass('hidden');
                    $(this).find('.stepper-number').addClass('hidden');
                } else {
                    $(this).find('.fa-check').addClass('hidden');
                    $(this).find('.stepper-number').removeClass('hidden');
                }
            });
    
            $('.step-form').each(function() {
                if ($(this).data('step') == step) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    
        function validateStep(step) {

        var formData = new FormData($(`#step-form-${step}`)[0]);
        formData.append('step', step);
        // post ke url validasi
        $.ajax({
            url: `{{ route('register.step.validation') }}`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.success){
                    currentStep++;
                    showStep(currentStep);
                }
                console.log(response.success);

            },
            error: function(xhr, status, error) {
                if(xhr.responseJSON){
                    if(xhr.responseJSON.errors){
                    for (const key in xhr.responseJSON.errors) {
                        if (Object.hasOwnProperty.call(xhr.responseJSON.errors, key)) {
                            const element = xhr.responseJSON.errors[key];
                            $(`.error-${key}`).text(element).show();

                        }
                    }
                    }
                }
                
            }

        });
  
}

    $('.next-step').click(function() {
        validateStep(currentStep);
    });

    
    
        $('.prev-step').click(function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });
    
        $('.finish-step').click(function(event) {
            event.preventDefault();
            let allFormData = new FormData();
    
            $('.step-form form').each(function() {
                const formData = new FormData(this);
                formData.forEach((value, key) => {
                    allFormData.append(key, value);
                });
            });
            
    
            $.ajax({
                url: `{{ route('register') }}`,
                type: 'POST',
                data: allFormData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr,status,error) {
                    console.log(xhr.responseJSON);

                   
                }
            });
        });
    
        showStep(currentStep);
        // dynamic experience
        let experienceIndex = 1;
        $('.button-experience').on('click', function() {
            const el = $('.row-add-experience')
            const cloneEl = el.clone()

            el.find('.error-message').remove()
            cloneEl.find('.btn-primary').removeClass('btn-primary').addClass('btn-danger btn-remove-experience')
                .html('<i class="fas fa-times"></i> Hapus Pengalaman Kerja');
            cloneEl.find('.input-add-experience').removeClass('input-add-experience')
            cloneEl.find('.error-message').remove()
            cloneEl.removeClass('row-add-experience fv-row mb-10').addClass(
                'list-experience list-experience- mb-10')
            cloneEl.append('<hr>')
            cloneEl.appendTo('.row-list-experience')

            $('.input-add-experience').val('')

            refreshExperienceList()
            initExperienceDatepicker()
        })
        function refreshExperienceList()
        {
            $.each($('.experience-country'), function(i, item){
                const t = $(this)
                const company = t.closest('div.fv-row').find('.experience-company')
                const startWorkdate = t.closest('div.fv-row').find('.h-experience-start-work-date')
                const endWorkdate = t.closest('div.fv-row').find('.h-experience-end-work-date')
                const position = t.closest('div.fv-row').find('.experience-position')

                t.attr('data-name', `negara_tempat_kerja.${i}`)
                company.attr('data-name', `nama_perusahaan.${i}`)
                startWorkdate.attr('data-name', `tanggal_mulai_kerja.${i}`)
                endWorkdate.attr('data-name', `tanggal_selesai_kerja.${i}`)
                position.attr('data-name', `posisi.${i}`)
            })
        }

        $('.row-list-experience').on('click', '.list-experience .btn-remove-experience', function() {
            $(this).closest('div.list-experience').remove()
            refreshExperienceList()
        })
        $('.btn-show-password').on('click', function(){
            const t = $(this)

            if (t.closest('div').find('input').attr('type') === 'password') {
                t.closest('div').find('input').attr('type', 'text')
                t.find('i').removeClass('fa-eye-slash').addClass('fa-eye')
            } else {
                t.closest('div').find('input').attr('type', 'password')
                t.find('i').removeClass('fa-eye').addClass('fa-eye-slash')
            }
        })
    });
   

    </script>
    
@endsection