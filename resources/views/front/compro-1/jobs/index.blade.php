@extends('front.compro-1.layouts.app')

@section('title', 'Job List')

@section('content')
    <!-- Navbar -->
    <section class="Element-nav-items-search">
        <div class="container">
            @include('front.compro-1.layouts.navbar')
        </div>
    </section>
    <!-- #End -->

    <!-- List Jobs Search -->
    <div class="list-jobs-search">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-3 mb-3">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Masukan Kata Kunci"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <select class="form-select form-select-lg" aria-label="Select example">
                        <option>Semua Kategori</option>
                        @foreach ($kategori as $kat)
                            <option>{{ $kat->nama_kategori_job }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 mb-3">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Masukan Negara"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" />
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn border-0 w-100">Search</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- #End -->
    <!-- Recomeded Jobs -->
    <section class="recomeded-jobs">
        <div class="container">
            <div class="row m-0">
                <div class="col">
                    <div class="title-heading-jobs-left">
                        <h1 class="title-heading">
                            Recommended Jobs
                        </h1>
                        <span class="paraf">
                            Jobs matched to you based on your profile
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="drop-down-right dropdown dropdown-hover d-flex float-end">
                        <div class="element-drop-down">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-funnel mx-2" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                            </svg>
                            <a class="btndropdown-toggle" href="#" role="button">Filter Jobs</a>
                        </div>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- #endregion -->
    <!-- Find Jobs -->
    <section class="find-jobs ">
        <div class="container">
            <div class="element-items-card mt-5 p-0 ">
                <div class="row m-0">
                    @forelse ($jobs as $job)
                        <div class="col-6 col-md-3 p-0">
                            <div class="card p-0">
                                <div class="card-body">
                                    <div class="job-image-container">
                                        <img src="{{ asset('upload/gambar/thumb_' . $job->gambar?->gambar) }}" onerror="this.src='{{ asset('images/no-image.png') }}'" alt="{{ $job->nama_job }}" class="w-100">
                                    </div>
                                    <div class="card-items-bagde gap-1">
                                        <img src="{{ asset('frontend/assets/icons/stop-circle.svg') }}" alt="">
                                        <span>Tersedia</span>
                                    </div>
                                    <div class="card-title-heading-card">
                                        <h5 class="col-10 text-truncate">{{ $job->nama_job }}</h5>
                                        <span>{{ $job->nama_perusahaan }}</span>
                                    </div>
                                    <div class="card-content">
                                        <div class="row m-0">
                                            <div class="col-1 mt-1">
                                                <img src="{{ asset('frontend/assets/image/location.png') }}" alt="">
                                            </div>
                                            <div class="col-10 mt-2">
                                                <h6 class="title-heading fw-bold">Negara</h6>
                                                <p>{{ $job->negara?->nama_negara }}</p>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-1 mt-1">
                                                <img src="{{ asset('frontend/assets/icons/document-text.svg') }}" alt="">
                                            </div>
                                            <div class="col-10 mt-2">
                                                <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                                <p>{{ $job->kontrak_kerja ?? '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-1 mt-1">
                                                <img src="{{ asset('frontend/assets/icons/Component 1.svg') }}" alt="">
                                            </div>
                                            <div class="col-10 mt-2">
                                                <h6 class="title-heading fw-bold">Gaji</h6>
                                                <p>{{ $job->gaji ? 'Rp ' . number_format($job->gaji) : '-' }}</p>
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="col-12">
                                                <h6>Berakhir pada {{ $job->tanggal_tutup ? \Carbon\Carbon::parse($job->tanggal_tutup)->format('d F Y') : '-' }}</h6>
                                            </div>
                                            <div class="col-12 d-flex align-self-center mt-2">
                                                <a href="{{ route('front.jobs.show', hashId($job->id)) }}">Lihat Detail
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                    {{-- <div class="col-6 col-md-3 p-0">
                        <div class="card p-0">
                            <div class="card-body">
                                <div class="">
                                    <img src="{{ asset('frontend/assets/image/Picture.png') }}" alt="" class="w-100">
                                </div>
                                <div class="card-items-bagde gap-1">
                                    <img src="{{ asset('frontend/assets/icons/stop-circle.svg') }}" alt="">
                                    <span>Tersedia</span>
                                </div>
                                <div class="card-title-heading-card">
                                    <h5 class="col-10 text-truncate">Conservation Acquisition Representative - Yogyakarta
                                    </h5>
                                    <span>PT Padma Raharja Sentosa</span>
                                </div>
                                <div class="card-content">
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/image/location.png') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Negara</h6>
                                            <p>Kalimantan Timur, Indonesia</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/icons/document-text.svg') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                            <p>Full Time</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/icons/Component 1.svg') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Gaji</h6>
                                            <p>Rp 3.000.000</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">
                                            <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                        </div>
                                        <div class="col-12 d-flex align-self-center mt-2">
                                            <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                        </path>
                                                    </svg></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 p-0">
                        <div class="card p-0">
                            <div class="card-body">
                                <div class="">
                                    <img src="{{ asset('frontend/assets/image/Picture.png') }}" alt="" class="w-100">
                                </div>
                                <div class="card-items-bagde gap-1">
                                    <img src="{{ asset('frontend/assets/icons/stop-circle.svg') }}" alt="">
                                    <span>Tersedia</span>
                                </div>
                                <div class="card-title-heading-card">
                                    <h5 class="col-10 text-truncate">Conservation Acquisition Representative - Yogyakarta
                                    </h5>
                                    <span>PT Padma Raharja Sentosa</span>
                                </div>
                                <div class="card-content">
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/image/location.png') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Negara</h6>
                                            <p>Kalimantan Timur, Indonesia</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/icons/document-text.svg') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                            <p>Full Time</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-1 mt-1">
                                            <img src="{{ asset('frontend/assets/icons/Component 1.svg') }}" alt="">
                                        </div>
                                        <div class="col-10 mt-2">
                                            <h6 class="title-heading fw-bold">Gaji</h6>
                                            <p>Rp 3.000.000</p>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-12">
                                            <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                        </div>
                                        <div class="col-12 d-flex align-self-center mt-2">
                                            <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                        </path>
                                                    </svg></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture (2).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Customer Service Representative</h5>
                                <span>New York University</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full time &amp; Internship</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$30.00 per jam</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="detailpekerjaan.html">Lihat Detail <span><svg
                                                    xmlns="http://www.w3.org/2000/svg" clas="" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture (3).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Budtender/Cashier</h5>
                                <span>ALDI</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$31.26 per jam</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <!-- <div class="row m-0">
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture.png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Conservation Acquisition Representative - Yogyakarta
                                </h5>
                                <span>PT Padma Raharja Sentosa</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>Kalimantan Timur, Indonesia</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>Rp 3.000.000</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture (1).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">General Manager Operation</h5>
                                <span>ALDI</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$19.50 - $30.00 per jam</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture (2).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Customer Service Representative</h5>
                                <span>New York University</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full time &amp; Internship</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$30.00 per jam</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="detailpekerjaan.html">Lihat Detail <span><svg
                                                    xmlns="http://www.w3.org/2000/svg" clas="" width="16" height="16"
                                                    fill="currentColor" class="bi bi-arrow-right-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-body">
                            <div class="card-image">
                                <img src="./assets/image/Picture (3).png" alt="">
                            </div>
                            <div class="card-items-bagde gap-1">
                                <img src="./assets/icons/stop-circle.svg" alt="">
                                <span>Tersedia</span>
                            </div>
                            <div class="card-title-heading-card">
                                <h5 class="col-10 text-truncate">Budtender/Cashier</h5>
                                <span>ALDI</span>
                            </div>
                            <div class="card-content">
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/image/location.png" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Negara</h6>
                                        <p>New York, NY</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/document-text.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Kontrak Kerja</h6>
                                        <p>Full Time</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 mt-1">
                                        <img src="./assets/icons/Component 1.svg" alt="">
                                    </div>
                                    <div class="col-10 mt-2">
                                        <h6 class="title-heading fw-bold">Gaji</h6>
                                        <p>$31.26 per jam</p>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12">
                                        <h6>Berakhir pada tanggal 1 Februari 2024</h6>
                                    </div>
                                    <div class="col-12 d-flex align-self-center mt-2">
                                        <a href="">Lihat Detail <span><svg xmlns="http://www.w3.org/2000/svg" clas=""
                                                    width="16" height="16" fill="currentColor"
                                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z">
                                                    </path>
                                                </svg></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- #End -->
    <!-- Pagination -->
    <section class="element-pagination">
        <div class="container">
            {{ $jobs->links('vendor.pagination.compro-1') }}
            </ul>
        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/style.bundle.css') }}">
    <style>
        body {
            overflow-x: hidden !important;
            min-width: 400px !important;
        }

        .find-jobs {
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .element-items-card {
            display: block !important;
        }
        /* .job-image-container img{
            height:130px;
            object-position:center;
            object-fit:cover
        }
        @media (min-width:1200px) {
            .job-image-container img{
                height:217px;
            }
        } */
    </style>
@endpush