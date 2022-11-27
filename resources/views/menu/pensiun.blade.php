@extends('layouts.main')

@section('content')
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
                        $masa = $awal->add(new DateInterval('P58Y'));
                        $akhir = new DateTime(); // Waktu sekarang
                        $diff = $masa->diff($akhir);
                    @endphp
                    @if ($diff->y == 0 && $diff->m <= 4)
                        <tr>
                            <th scope="row">
                                {{ $i }}
                            </th>
                            <td>{{ $value->nip }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>
                                @php
                                    echo $diff->m . ' bulan ' . $diff->d . ' hari';
                                @endphp
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger">Cetak</button>
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#listModal{{ $i }}">Berkas</button>
                                <form action="{{ route('pensiun.update', $value->id) }}" method="POST">
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
                                                                        if ($value->berkas_skcpns) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skcpns"
                                                                        name="berkas_skcpns"
                                                                        @php if ($value->berkas_skcpns) {
                                                                            echo 'checked value="true"';
                                                                        } else {
                                                                            echo 'value="false"';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan PNS</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skpns) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpns"
                                                                        name="berkas_skpns"@php if ($value->berkas_skcpns) {
                                                                            echo 'checked value="true"';
                                                                        } else {
                                                                            echo 'value="false"';
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
                                                                        if ($value->berkas_skpktterakhir) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skpktterakhir"
                                                                        name="berkas_skpangkatterakhir"
                                                                        @php if ($value->berkas_skpktterakhir) {
                                                                            echo 'checked value="true"';
                                                                        } else {
                                                                            echo 'value="false"';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item d-flex">
                                                            <div class="d-flex flex-column flex-grow-1">
                                                                <div class="fw-bold"><b>Surat Keterangan Jabatan</b></div>
                                                                <div class="d-flex flex-row justify-content-between">
                                                                    <h6>@php
                                                                        if ($value->berkas_skjabatan) {
                                                                            echo 'Sudah';
                                                                        } else {
                                                                            echo 'Belum';
                                                                        }
                                                                    @endphp</h6>
                                                                    <input type="checkbox" id="berkas_skjabatan"
                                                                        name="berkas_skjabatan" @php if ($value->berkas_skjabatan) {
                                                                            echo 'checked value="true"';
                                                                        } else {
                                                                            echo 'value="false"';
                                                                        } @endphp>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <input type="hidden" name="id" value="@php echo $value->id; @endphp">
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
