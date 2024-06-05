@extends('front.member.layouts.app')

{{-- @dd(memberProfileImg(auth()->user())) --}}

@section('content')
    <div class="row">
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills user-profile-tab justify-content-start mt-2 rounded-2" id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 active"
                                id="pills-personal-detail-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-detail"
                                type="button" role="tab" aria-controls="pills-personal-detail" aria-selected="true">
                                <i class="ti ti-user-circle me-2 fs-6"></i>
                                <span class="d-none d-md-block">Data Diri</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="passport-tab" data-bs-toggle="pill" data-bs-target="#pills-passport" type="button"
                                role="tab" aria-controls="pills-passport" aria-selected="false" tabindex="-1">
                                <i class="ti ti-bookmarks me-2 fs-6"></i>
                                <span class="d-none d-md-block">Dokumen Luar Negeri</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="work-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-work-experience" type="button"
                                role="tab" aria-controls="pills-work-experience" aria-selected="false" tabindex="-1">
                                <i class="ti ti-subtask me-2 fs-6"></i>
                                <span class="d-none d-md-block">Pengalaman Kerja</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                                id="document-tab" data-bs-toggle="pill" data-bs-target="#pills-document" type="button"
                                role="tab" aria-controls="pills-document" aria-selected="false" tabindex="-1">
                                <i class="ti ti-clipboard-text me-2 fs-6"></i>
                                <span class="d-none d-md-block">Dokumen</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-personal-detail" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <h5 class="fw-7 text-primary">Informasi Dasar</h3>
                            <div class="row mt-4">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">NIK</h6>
                                    <span>{{ auth()->user()->kandidat->nik ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Nama Lengkap</h6>
                                    {{ auth()->user()->name }}
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Jenis Kelamin</h6>
                                    {{ auth()->user()->kandidat->jenis_kelamin ?? '-' }}
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Tempat Lahir</h6>
                                    <span>{{ auth()->user()->kandidat->tempat_lahir ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Tanggal Lahir</h6>
                                    <span>{{ auth()->user()->kandidat->tanggal_lahir ? \Carbon\Carbon::parse(auth()->user()->kandidat->tanggal_lahir)->format('d F Y') : '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Usia</h6>
                                    <span>{{ auth()->user()->kandidat->usia . ' Tahun' ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Agama</h6>
                                    <span>{{ auth()->user()->kandidat->agama ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Berat Badan</h6>
                                    <span>{{ auth()->user()->kandidat->berat_badan . ' Kg' ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Tinggi Badan</h6>
                                    <span>{{ auth()->user()->kandidat->tinggi_badan . ' Cm' ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Nama Lengkap Ayah</h6>
                                    <span>{{ auth()->user()->kandidat->nama_lengkap_ayah ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Nama Lengkap Ibu</h6>
                                    <span>{{ auth()->user()->kandidat->nama_lengkap_ibu ?? '-' }}</span>
                                </div>
                            </div>

                            <hr class="my-3 my-lg-5">

                            <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Alamat</h3>
                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-12">
                                    <h6 class="fw-7">Alamat Lengkap</h6>
                                    <span>{{ auth()->user()->kandidat->alamat ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Kecamatan</h6>
                                    <span>{{ auth()->user()->kandidat->kecamatan->nama_kecamatan ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Kota</h6>
                                    <span>{{ auth()->user()->kandidat->kota->nama_kota ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Provinsi</h6>
                                    <span>{{ auth()->user()->kandidat->provinsi->nama_provinsi ?? '-' }}</span>
                                </div>
                            </div>

                            <hr class="my-3 my-lg-5">

                            <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Kontak Darurat</h3>
                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Nama Keluarga</h6>
                                    <span>{{ auth()->user()->kandidat->nama_keluarga ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Hubungan Keluarga</h6>
                                    <span>{{ auth()->user()->kandidat->hubungan ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">No Darurat</h6>
                                    <span>{{ auth()->user()->kandidat->no_telp_darurat ?? '-' }}</span>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-passport" role="tabpanel" aria-labelledby="pills-passport-tab" tabindex="0">
                            <div class="row mt-4">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">No. Paspor</h6>
                                    <span>{{ auth()->user()->kandidat->no_paspor ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Tanggal Pengeluaran Paspor</h6>
                                    <span>{{ auth()->user()->kandidat->tanggal_pengeluaran_paspor ? \Carbon\Carbon::parse(auth()->user()->kandidat->tanggal_pengeluaran_paspor)->format('d F Y') : '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Masa Kadaluarsa Paspor</h6>
                                    <span>{{ auth()->user()->kandidat->masa_kadaluarsa ? \Carbon\Carbon::parse(auth()->user()->kandidat->masa_kadaluarsa)->format('d F Y') : '-' }}</span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <h6 class="fw-7">Kantor yg Mengeluarkan Paspor</h6>
                                    <span>{{ auth()->user()->kandidat->kantor_paspor ?? '-' }}</span>
                                </div>
                                <div class="col-lg-4">
                                    <h6 class="fw-7">Kondisi Paspor</h6>
                                    <span>{{ auth()->user()->kandidat->kondisi_paspor ?? '-' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-work-experience" role="tabpanel" aria-labelledby="pills-work-experience-tab" tabindex="0">
                            @php
                                $i = 0;
                            @endphp
                            @foreach (auth()->user()->kandidat->pengalamanKerja as $pengalamanKerja)
                                <h5 class="fw-7 text-primary">{{ $pengalamanKerja->nama_perusahaan . ' - ' . $pengalamanKerja->posisi }}</h3>
                                <div class="row mt-lg-4 mt-3">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Negara Tempat Bekerja</h6>
                                        <span>{{ $pengalamanKerja->negara_tempat_kerja ?? '-' }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Nama Perusahaan</h6>
                                        <span>{{ $pengalamanKerja->nama_perusahaan ?? '-' }}</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Posisi</h6>
                                        <span>{{ $pengalamanKerja->posisi ?? '-' }}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <h6 class="fw-7">Tanggal Mulai Bekerja</h6>
                                        <span>{{ $pengalamanKerja->tanggal_mulai_kerja ? \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai_kerja)->format('d F Y') : '-' }}</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <h6 class="fw-7">Tanggal Selesai Bekerja</h6>
                                        <span>{{ $pengalamanKerja->tanggal_selesai_kerja ? Carbon\Carbon::parse($pengalamanKerja->tanggal_selesai_kerja)->format('d F Y') : '-' }}</span>
                                    </div>
                                </div>

                                @if ($i > 0)
                                    <hr class="my-3 my-lg-5">
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </div>

                        <div class="tab-pane fade" id="pills-document" role="tabpanel" aria-labelledby="pills-document-tab" tabindex="0">
                            <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Dokumen Persyaratan Jati Diri yang Dimiliki</h3>
                            <div class="row mt-lg-4 mt-3">
                                <div class="col-lg-12 mb-3">
                                    <h6 class="fw-7">Kelengkapan Dokumen</h6>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ktp" {{ auth()->user()->kandidat->ada_ktp == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="ktp">KTP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="kk" {{ auth()->user()->kandidat->ada_kk == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="kk">KK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="akta-lahir" {{ auth()->user()->kandidat->ada_akta_lahir == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="akta-lahir">Akta Lahir</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ijazah" {{ auth()->user()->kandidat->ada_ijazah == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="ijazah">Ijazah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="buku-nikah" {{ auth()->user()->kandidat->ada_buku_nikah == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="buku-nikah">Buku Nikah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="paspor" {{ auth()->user()->kandidat->ada_paspo == 'Ya' ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="paspor">Paspor</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h6 class="fw-7">Penjelasan Dokumen kelengkapan berkas terdapat perbedaan nama/alamat/tempat tanggal lahir/hilang/rusak/lainnya</h6>
                                    <span>{{ auth()->user()->kandidat->penjelasan_dokumen ?? '-' }}</span>
                                </div>
                            </div>

                            <hr class="my-3 my-lg-5">
                            
                            <h5 class="fw-7 mt-4 mt-lg-0 text-primary">Berkas Dokumen Persyaratan Jati Diri yang Dimiliki</h3>
                            <div class="row mt-lg-4 mt-3">
                                @php
                                    $arrDocument = [
                                            [
                                                'key' => 'foto',
                                                'path' => 'foto',
                                                'name' => 'Foto'
                                            ],
                                            [
                                                'key' => 'paspor',
                                                'path' => 'paspor',
                                                'name' => 'Paspor'
                                            ],
                                            [
                                                'key' => 'ktp',
                                                'path' => 'ktp',
                                                'name' => 'KTP'
                                            ],
                                            [
                                                'key' => 'sertifikat_kompetensi',
                                                'path' => 'sertifikat-kompetensi',
                                                'name' => 'Sertifikat Kompetensi'
                                            ],
                                            [
                                                'key' => 'paklaring',
                                                'path' => 'paklaring',
                                                'name' => 'Paklaring'
                                            ],
                                            [
                                                'key' => 'kk',
                                                'path' => 'kartu-keluarga',
                                                'name' => 'Kartu Keluarga'
                                            ],
                                            [
                                                'key' => 'akta_lahir',
                                                'path' => 'akta-lahir',
                                                'name' => 'Akta Lahir'
                                            ],
                                            [
                                                'key' => 'ijazah',
                                                'path' => 'jazah',
                                                'name' => 'Ijazah'
                                            ],
                                            [
                                                'key' => 'buku_nikah',
                                                'path' => 'buku-nikah',
                                                'name' => 'Buku Nikah'
                                            ],
                                        ];
                                @endphp

                                @foreach ($arrDocument as $doc)
                                    <div class="col-6 col-md-4">
                                        @php
                                            $memberFile = memberDocumentImage('upload/' . $doc['path'] . '/' . auth()->user()->kandidat->{$doc['key']});
                                        @endphp
                                        @if ($memberFile['is_uploaded'])
                                            <a href="{{ asset('upload/' . $doc['path'] . '/' . auth()->user()->kandidat->{$doc['key']}) }}" target="_blank">
                                                <img src="{{ asset($memberFile['file_image']) }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3">
                                                <div class="fw-7 text-center mb-4 {{ $memberFile['is_uploaded'] ? '' : 'text-muted' }}">{{ $doc['name'] }}</div>
                                            </a>
                                        @else
                                            <img src="{{ asset($memberFile['file_image']) }}" alt="{{ $doc['name'] }}" class="rounded-2 img-fluid mb-3">
                                            <div class="fw-7 text-center mb-4 {{ $memberFile['is_uploaded'] ? '' : 'text-muted' }}">{{ $doc['name'] }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
