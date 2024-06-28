@extends('front.member.layouts.app')

@section('title', 'Status Proses Lamaran Kerja')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row" >
        @include('front.member.layouts.profile-info')
        <div class="col-md-9">
            @foreach ($seleksi as $item )

          
            <div class="card">
                @if ($item->stasus != "Batal")
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                    </div>
                    <hr class="mb-4 mt-5 w-100">
                    <h5 class="fw-7 text-primary">Di Lamar tanggal {{$item->tanggal_apply}}</h5>
                    @php
                    $statuses = [
                        'cek_kualifikasi' => $item->tanggal_cek_kualifikasi ?? 'Belum selesai',
                        'lolos_kualifikasi' => $item->tanggal_lolos_kualifikasi ?? 'Belum selesai',
                        'interview' => $item->tanggal_interview ?? 'Belum selesai',
                        'lolos_interview' => $item->tanggal_lolos_interview ?? 'Belum selesai',
                        'dalam_proses' => $item->tanggal_dalam_proses ?? 'Belum selesai',
                        'terbang' => $item->tanggal_terbang ?? 'Belum selesai',
                        'selesai_kontrak' => $item->tanggal_selesai_kontrak ?? 'Belum selesai',
                    ];

                    $icon = [
                        'cek_kualifikasi' => 'fas fa-clipboard',
                        'lolos_kualifikasi' => 'fas fa-user',
                        'interview' => 'fas fa-eye',
                        'lolos_interview' => 'fas fa-thumbs-up',
                        'dalam_proses' => 'fas fa-clock',
                        'terbang' => 'fas fa-plane',
                        'selesai_kontrak' => 'fas fa-calendar'
                    ];

                    $title = [
                        'cek_kualifikasi' => 'Cek Kualifikasi',
                        'lolos_kualifikasi' => 'Lolos Kualifikasi',
                        'interview' => 'Interview',
                        'lolos_interview' => 'Lolos Interview',
                        'dalam_proses' => 'Dalam Proses',
                        'terbang' => 'Terbang',
                        'selesai_kontrak' => 'Selesai Kontrak'

                    ];
                @endphp

                <ol class="tw-items-center sm:tw-flex tw-mt-10">
                    @foreach ($statuses as $status => $tanggal)
                        @php
                            $isCompleted = $tanggal != 'Belum selesai';
                            $namaIcon = $isCompleted ? 'fas fa-check' : $icon[$status];
                            $line = $isCompleted ? 'bg-primary' : 'tw-bg-gray-200';
                        @endphp
                        <li class="tw-relative tw-mb-6 sm:tw-mb-0">
                            <div class="tw-flex tw-items-center tw-w-full tw-h-full">
                                <div class="tw-z-10 tw-flex tw-items-center tw-justify-center tw-mx-auto tw-w-10 tw-h-10 bg-primary tw-rounded-full tw-ring-0 tw-ring-white sm:tw-ring-8 tw-shrink-0">
                                    <i class="{{ $namaIcon }} tw-text-white tw-text-xl"></i>
                                </div>
                                @if (!$loop->last)
                                    <div class="tw-hidden sm:tw-flex tw-w-full {{ $line }} tw-h-1"></div>
                                @endif
                            </div>
                            <div class="tw-mt-3 sm:tw-pe-8">
                                <button type="button" class="tw-text-sm tw-font-semibold tw-text-gray-900" data-bs-toggle="modal" data-bs-target="#modal_{{ $status }}{{ $item->id }}">{{ $title[$status] }}</button>
                                <time class="tw-block tw-text-sm tw-font-normal tw-leading-none tw-text-gray-400 md:tw-text-start tw-text-center ">{{ $tanggal }}</time>
                            </div>
                        </li>
              
                        @if ($status == 'dalam_proses')
                        <div class="modal fade" id="modal_{{ $status }}{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modal-{{ $status }}-{{ $item->id }}Label">Ubah Status</h5>
                                                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <div class="form-group">
                                                                               

                                                                                <div class="col-sm-12">

                                                                                    <div
                                                                                        class="border-checkbox-section">


                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="mik"
                                                                                                name="mik"
                                                                                                value="{{ $item->mik }}"
                                                                                                {{ $item->mik == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="mik">Menunggu
                                                                                                Izin Kerja</label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="iktt"
                                                                                                name="iktt"
                                                                                                value="{{ $item->iktt }}"
                                                                                                {{ $item->iktt == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="iktt">Izin
                                                                                                Kerja Telah
                                                                                                Terbit</label>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="mjk"
                                                                                                name="mjk"
                                                                                                value="{{ $item->mjk }}"
                                                                                                {{ $item->mjk == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="mjk">Menunggu
                                                                                                Jadwal Kedutaan</label>
                                                                                        </div>


                                                                                        <br>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="jak"
                                                                                                name="jak"
                                                                                                value="{{ $item->jak }}"
                                                                                                {{ $item->jak == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="jak">Jadwal
                                                                                                Appointment
                                                                                                Kedutaan</label>
                                                                                        </div>

                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_ak">Tanggal
                                                                                                AK</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_ak"
                                                                                                name="tanggal_ak"
                                                                                                value="{{ $item->tanggal_ak }}">

                                                                                        </div>

                                                                                        <br>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="vt"
                                                                                                name="vt"
                                                                                                value="{{ $item->vt }}"
                                                                                                {{ $item->vt == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="vt">Visa
                                                                                                Terbit</label>
                                                                                        </div>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="vd"
                                                                                                name="vd"
                                                                                                value="{{ $item->vd }}"
                                                                                                {{ $item->vd == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="vd">Visa
                                                                                                Ditolak</label>
                                                                                        </div>

                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_validity">Tanggal
                                                                                                Validity</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_validity"
                                                                                                name="tanggal_validity"
                                                                                                value="{{ $item->tanggal_validity }}">

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_terbit">Tanggal
                                                                                                Terbit</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_terbit"
                                                                                                name="tanggal_terbit"
                                                                                                value="{{ $item->tanggal_terbit }}">

                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="">
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="tanggal_habis">Tanggal
                                                                                                Habis</label>
                                                                                            <input class="form-control"
                                                                                                type="date"
                                                                                                id="tanggal_habis"
                                                                                                name="tanggal_habis"
                                                                                                value="{{ $item->tanggal_habis }}">

                                                                                        </div>

                                                                                        <br>
                                                                                        <div
                                                                                            class="border-checkbox-group border-checkbox-group-success">
                                                                                            <input
                                                                                                class="border-checkbox"
                                                                                                type="checkbox"
                                                                                                id="pap"
                                                                                                name="pap"
                                                                                                value="{{ $item->pap }}"
                                                                                                {{ $item->pap == 1 ? 'checked' : '' }}>
                                                                                            <label
                                                                                                class="border-checkbox-label"
                                                                                                for="pap">P.A.P</label>
                                                                                        </div>






                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="tanggal_berangkat">Tanggal
                                                                                            Keberangkatan:</label>
                                                                                        <input type="date"
                                                                                            class="form-control"
                                                                                            id="tanggal_berangkat"
                                                                                            name="tanggal_berangkat"
                                                                                            value="{{ $item->tanggal_berangkat }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="jam_terbang">Jam
                                                                                            Terbang:</label>
                                                                                        <select name="jam_terbang"
                                                                                            id="jam_terbang"
                                                                                            class="form-control">
                                                                                            @for ($i = 0; $i < 23; $i++)
                                                                                                @php
                                                                                                    $i = $i < 10 ? '0' . $i : $i;
                                                                                                @endphp
                                                                                                <option value="{{ $i }}"
                                                                                                    {{ $item->jam_terbang == $i ? 'selected' : '' }}>
                                                                                                    {{ $i }}</option>
                                                                                                
                                                                                            @endfor
                                                                                      
                                                                                            <option value="00"
                                                                                                {{ $item->jam_terbang == '00' ? 'selected' : '' }}>
                                                                                                00</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="supplier_id">Supplied By
                                                                                    :</label>
                                                                                <select name="supplier_id"
                                                                                    id="supplier_id"
                                                                                    class="form-control">
                                                                                    <option value="">--Pilih
                                                                                        Supplier--</option>
                                                                                    @foreach ($supplierList as $id => $supplierName)
                                                                                        <option
                                                                                            value="{{ $id }}"
                                                                                            {{ $item->supplier_id == $id ? 'selected' : '' }}>
                                                                                            {{ $supplierName }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>



                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="keterangan_dalam_proses">Keterangan
                                                                                    Dari Dalam Proses :</label>
                                                                                <textarea name="keterangan_dalam_proses" id="keterangan_dalam_proses" cols="30" rows="3"
                                                                                    class="form-control">{{ $item->keterangan_dalam_proses }}</textarea>

                                                                            </div>
                                                                            <!-- Add hidden input for the Pendaftaran ID -->
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $item->id }}">
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal"><i
                                                                                class="fas fa-undo"></i>
                                                                            Tutup</button>
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="submitUbahStatus({{ $item->id }})"><i
                                                                                class="fas fa-save"></i>
                                                                            Simpan</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                        </div>
                        @else
                        <div class="modal fade" id="modal_{{ $status }}{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-{{ $status }}-{{ $item->id }}Label" class="text-primary tw-text-3xl">{{ $title[$status] }} Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <h3 class="text-primary tw-font-semibold tw-text-xl">
                                        {{$item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}
                                       </h3>
                                       <h5 class="tw-text-gray-700 tw-text-lg">
                                        @if ($tanggal != 'Belum selesai')
                                        {{$title[$status]}}  selesai pada tanggal {{$tanggal}}
                                            
                                        @else
                                            Belum mencapai tahapan ini
                                        @endif    
                                    </h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary text-primary" data-bs-dismiss="modal">Close</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </ol>

      

                </div>   
                @else
                    <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-semibold float-start">{{ $item->job->nama_perusahaan . ' - ' .  $item->job->nama_job}}</h5>
                        <!-- <a href="{{ route('member.work-experience.edit') }}" class="float-end btn btn-light-primary text-primary mt-n2"><i class="ti ti-pencil-minus"></i></a> -->
                    </div>
                        <h2>
                            <span class="badge bg-danger">Lamaran Dibatalkan</span>
                        </h2>
                    </div>
                @endif
                
            </div>

      
            @endforeach
            
        </div>
    </div>
    <!-- Button trigger modal -->

@endsection
