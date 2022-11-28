@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center p-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger text-center p-3" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <h4 class="p-1 fw-bold">Menunggu waktu</h4>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Estimasi terdekat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($pegawai as $key => $value)
                    @php
                        $awal = new DateTime($value->tgl_lahir);
                        $awalstr = $awal->format('Y-m-d');

                        $masa = $awal->add(new DateInterval('P58Y'));

                        $akhir = new DateTime(); // Waktu sekarang
                        $akhirstr = $akhir->format('Y-m-d');

                        $diff = $masa->diff($akhir);
                        //$diffstr = $diff->format('Y-m-d');

                        //date_sub($awal, date_interval_create_from_date_string("1 months"));

                        //$test = (int)date_format($awal, "d");
                        $diff2 = date_diff($akhir, $awal);
                        $tesst = $diff2->format('%R%a');

                    @endphp
                    @if ($diff->y == 0 && $diff->m <= 4 && (int) $tesst > 0)
                        <tr>
                            <th scope="row">
                                {{ $i }}
                            </th>
                            <td>{{ $value->nip }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>
                                @php
                                    echo $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
                                @endphp
                            </td>
                            <td>
                                <a href="{{ route('cetakSurat', $value->id) }}" class="btn btn-sm btn-danger">Cetak</a>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#listModal{{ $i }}">Berkas</button>
                                <form action="{{ route('pensiun.update', $value->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal fade" id="listModal{{ $i }}" tabindex="-1"
                                        aria-labelledby="listModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="listModalLabel">Informasi Berkas Pegawai
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ol class="list-group list-group-numbered border-left-primary">
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Calon PNS</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skcpns == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skcpns"
                                                                        name="berkas_skcpns"
                                                                        @php if ($value->berkas_skcpns) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan PNS</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skpns == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpns"
                                                                        name="berkas_skpns"
                                                                        @php if ($value->berkas_skpns) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Pangkat
                                                                        Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skpktterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpktterakhir"
                                                                        name="berkas_skpktterakhir"
                                                                        @php if ($value->berkas_skpktterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Jabatan</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skjabatan == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skjabatan"
                                                                        name="berkas_skjabatan"
                                                                        @php if ($value->berkas_skjabatan) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kenaikan Gaji Berkala (KGB)
                                                                        Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_kgbterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_kgbterakhir"
                                                                        name="berkas_kgbterakhir"
                                                                        @php if ($value->berkas_kgbterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kartu Pegawai (KARPEG)</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_karpeg == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_karpeg"
                                                                        name="berkas_karpeg"
                                                                        @php if ($value->berkas_karpeg) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Daftar Riwayat Pekerjaan (DRP)</b>
                                                                </div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_drp == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_drp" name="berkas_drp"
                                                                        @php if ($value->berkas_drp) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan belum pernah
                                                                        dijatuhi hukuman disiplin tingkat sedang/berat dari
                                                                        Kepala Kantor</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skhukuman == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skhukuman"
                                                                        name="berkas_skhukuman"
                                                                        @php if ($value->berkas_skhukuman) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Daftar Susunan Keluarga</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_dsk == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_dsk" name="berkas_dsk"
                                                                        @php if ($value->berkas_dsk) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir Surat Nikah</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_suratnikah == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_suratnikah"
                                                                        name="berkas_suratnikah"
                                                                        @php if ($value->berkas_suratnikah) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir Akte Kelahiran Anak</b>
                                                                </div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_akteanak == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_akteanak"
                                                                        name="berkas_akteanak"
                                                                        @php if ($value->berkas_akteanak) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kartu Peserta Taspen</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_kpt == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_kpt"
                                                                        name="berkas_kpt"
                                                                        @php if ($value->berkas_kpt) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>DPCP (Daftar Pegawai Calon
                                                                        Pensiun)</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_dpcp == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_dpcp"
                                                                        name="berkas_dpcp"
                                                                        @php if ($value->berkas_dpcp) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir PPK(Prestasi Penilaian
                                                                        Kerja) 2 Tahun Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_ppk2thnterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_ppk2thnterakhir"
                                                                        name="berkas_ppk2thnterakhir"
                                                                        @php if ($value->berkas_ppk2thnterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Pas Photo</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_pasphoto == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_pasphoto"
                                                                        name="berkas_pasphoto"
                                                                        @php if ($value->berkas_pasphoto) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <input type="hidden" name="id"
                                                            value="@php echo $value->id; @endphp">
                                                    </ol>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <h4 class="p-1 fw-bold">Sudah memasuki waktu</h4>
    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($pegawai as $key => $value)
                    @php
                        $awal = new DateTime($value->tgl_lahir);
                        $awalstr = $awal->format('Y-m-d');

                        $masa = $awal->add(new DateInterval('P58Y'));

                        $akhir = new DateTime(); // Waktu sekarang
                        $akhirstr = $akhir->format('Y-m-d');

                        $diff = $masa->diff($akhir);
                        //$diffstr = $diff->format('Y-m-d');

                        //date_sub($awal, date_interval_create_from_date_string("1 months"));

                        //$test = (int)date_format($awal, "d");
                        $diff2 = date_diff($akhir, $awal);
                        $tesst = $diff2->format('%R%a');

                    @endphp
                    @if ($diff->y == 0 && $diff->m <= 4 && (int) $tesst <= 0)
                        <tr>
                            <th scope="row">
                                {{ $i }}
                            </th>
                            <td>{{ $value->nip }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>
                                @php
                                    echo $diff2->format('Lewat %a hari');
                                @endphp
                            </td>
                            <td>
                                <a href="{{ route('cetakSurat', $value->id) }}" class="btn btn-sm btn-danger">Cetak</a>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#listModal{{ $i }}">Berkas</button>
                                <form action="{{ route('pensiun.update', $value->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal fade" id="listModal{{ $i }}" tabindex="-1"
                                        aria-labelledby="listModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="listModalLabel">Informasi Berkas Pegawai
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ol class="list-group list-group-numbered border-left-primary">
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Calon PNS</b>
                                                                </div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skcpns == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skcpns"
                                                                        name="berkas_skcpns"
                                                                        @php if ($value->berkas_skcpns) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan PNS</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skpns == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpns"
                                                                        name="berkas_skpns"
                                                                        @php if ($value->berkas_skpns) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Pangkat
                                                                        Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skpktterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpktterakhir"
                                                                        name="berkas_skpktterakhir"
                                                                        @php if ($value->berkas_skpktterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Jabatan</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skjabatan == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skjabatan"
                                                                        name="berkas_skjabatan"
                                                                        @php if ($value->berkas_skjabatan) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kenaikan Gaji Berkala (KGB)
                                                                        Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_kgbterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_kgbterakhir"
                                                                        name="berkas_kgbterakhir"
                                                                        @php if ($value->berkas_kgbterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kartu Pegawai (KARPEG)</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_karpeg == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_karpeg"
                                                                        name="berkas_karpeg"
                                                                        @php if ($value->berkas_karpeg) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Daftar Riwayat Pekerjaan (DRP)</b>
                                                                </div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_drp == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_drp"
                                                                        name="berkas_drp"
                                                                        @php if ($value->berkas_drp) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan belum pernah
                                                                        dijatuhi hukuman disiplin tingkat sedang/berat dari
                                                                        Kepala Kantor</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skhukuman == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skhukuman"
                                                                        name="berkas_skhukuman"
                                                                        @php if ($value->berkas_skhukuman) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Daftar Susunan Keluarga</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_dsk == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_dsk"
                                                                        name="berkas_dsk"
                                                                        @php if ($value->berkas_dsk) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir Surat Nikah</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_suratnikah == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_suratnikah"
                                                                        name="berkas_suratnikah"
                                                                        @php if ($value->berkas_suratnikah) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir Akte Kelahiran Anak</b>
                                                                </div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_akteanak == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_akteanak"
                                                                        name="berkas_akteanak"
                                                                        @php if ($value->berkas_akteanak) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Kartu Peserta Taspen</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_kpt == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_kpt"
                                                                        name="berkas_kpt"
                                                                        @php if ($value->berkas_kpt) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>DPCP (Daftar Pegawai Calon
                                                                        Pensiun)</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_dpcp == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_dpcp"
                                                                        name="berkas_dpcp"
                                                                        @php if ($value->berkas_dpcp) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Legalisir PPK(Prestasi Penilaian
                                                                        Kerja) 2 Tahun Terakhir</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_ppk2thnterakhir == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_ppk2thnterakhir"
                                                                        name="berkas_ppk2thnterakhir"
                                                                        @php if ($value->berkas_ppk2thnterakhir) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Pas Photo</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_pasphoto == 1) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_pasphoto"
                                                                        name="berkas_pasphoto"
                                                                        @php if ($value->berkas_pasphoto) {
                                                                            echo 'checked value=true';
                                                                        } else {
                                                                            echo 'value=false';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <input type="hidden" name="id"
                                                            value="@php echo $value->id; @endphp">
                                                    </ol>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
