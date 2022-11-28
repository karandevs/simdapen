@extends('layouts.main')

@section('content')
    <!-- Table head options start -->
    <div class="row" id="table-head">
        <div class="col-12">
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
            <div class="card">
                <div class="card-body">
                    <h2 class="card-text">Data Pegawai</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('pegawai.store') }}">
                                        @csrf
                                        <div class="row d-flex align-items-end">
                                            <div class="">
                                                <div class="mb-1">
                                                    <label class="form-label" for="nip">NIP</label>
                                                    <input type="text"
                                                        class="form-control @error('nip') is-invalid @enderror"
                                                        name="nip" id="nip" aria-describedby="nip"
                                                        value="{{ old('nip') }}" required autocomplete="nip" autofocus
                                                        placeholder="Contoh: 19708080 199808 1 002" />
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label" for="nama">Nama Pegawai</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        name="nama" id="nama" aria-describedby="nama"
                                                        value="{{ old('nama') }}" required autocomplete="nama" autofocus
                                                        placeholder="Contoh: Adam Najmi Zidan, S. Kom" />
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label" for="pktgol">Pangkat/Golongan</label>
                                                    <select class="form-control" name="pktgol_id" id="pktgol_id">
                                                        @foreach ($pktgol as $item)
                                                            <option value="{{ $item->id }}">{{ $item->pangkat }}
                                                                ({{ $item->golongan }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label" for="jabatan">Jabatan</label>
                                                    <select class="form-control" name="jabatan_id" id="jabatan_id">
                                                        @foreach ($jabatan as $item)
                                                            <option value="{{ $item->id }}">{{ $item->jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                        name="tgl_lahir" id="tgl_lahir" aria-describedby="tgl_lahir"
                                                        value="{{ old('tgl_lahir') }}" required autocomplete="tgl_lahir"
                                                        autofocus />
                                                </div>
                                                <div class="mb-1">
                                                    <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                                                    <input type="date"
                                                        class="form-control @error('tgl_masuk') is-invalid @enderror"
                                                        name="tgl_masuk" id="tgl_masuk" aria-describedby="tgl_masuk"
                                                        value="{{ old('tgl_masuk') }}" required autocomplete="tgl_masuk"
                                                        autofocus />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <?php if (!empty($data)) { ?>
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach ($data as $key => $value) :
                                $i++;
                            ?>
                            <tr>
                                <td scope="row">{{ $data->firstItem() + $key }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                        data-bs-target="#listModal{{ $i }}">
                                        Lihat
                                    </button>
                                    <div class="modal fade" id="listModal{{ $i }}" tabindex="-1"
                                        aria-labelledby="listModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5>Informasi Pegawai</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <ol class="list-group list-group-numbered border-left-primary">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>NIP</b></div>
                                                                {{ $value->nip }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Nama Pegawai</b></div>
                                                                {{ $value->nama }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Pangkat/Golongan</b></div>
                                                                {{ $value->pktgol->pangkat }} (
                                                                {{ $value->pktgol->golongan }} )
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Jabatan</b></div>
                                                                {{ $value->jabatan->jabatan }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Tanggal Lahir</b></div>
                                                                {{ $value->tgl_lahir }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Tanggal Masuk</b></div>
                                                                {{ $value->tgl_masuk }}
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Usia</b></div>
                                                                @php
                                                                    $tl = new DateTime($value->tgl_lahir);
                                                                    $today = new DateTime('today');
                                                                    $y = $today->diff($tl);
                                                                    echo $y->y;
                                                                    echo ' Tahun ';
                                                                @endphp
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Estimasi Pensiun</b></div>
                                                                @php
                                                                    $awal = new DateTime($value->tgl_lahir);
                                                                    $masa = $awal->add(new DateInterval('P58Y'));
                                                                    $akhir = new DateTime(); // Waktu sekarang
                                                                    $diff = $masa->diff($akhir);
                                                                    echo $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari';
                                                                @endphp
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-start">
                                                            <div class="ms-2 me-auto">
                                                                <div class="fw-bold"><b>Tahun Pensiun</b></div>
                                                                @php
                                                                    echo (int) date('Y', strtotime($value->tgl_lahir)) + 58;
                                                                @endphp
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal{{ $i }}"> Ubah
                                    </button>
                                    <div class="modal fade" id="modal{{ $i }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Pegawai</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('pegawai.update', $value->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row d-flex align-items-end">
                                                            <div class="">
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="nip">NIP</label>
                                                                    <input type="text"
                                                                        class="form-control @error('nip') is-invalid @enderror"
                                                                        name="nip" id="nip"
                                                                        aria-describedby="nip"
                                                                        value="{{ $value->nip }}" autocomplete="nip"
                                                                        autofocus placeholder="{{ $value->nip }}" />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="nama">Nama
                                                                        Pegawai</label>
                                                                    <input type="text"
                                                                        class="form-control @error('nama') is-invalid @enderror"
                                                                        name="nama" id="nama"
                                                                        aria-describedby="nama"
                                                                        value="{{ $value->nama }}" autocomplete="nama"
                                                                        autofocus placeholder="{{ $value->nama }}" />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="pktgol">Pangkat/Golongan</label>
                                                                    <select class="form-control" name="pktgol_id"
                                                                        id="pktgol_id">
                                                                        @foreach ($pktgol as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->pangkat }}
                                                                                ({{ $item->golongan }})
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label"
                                                                        for="jabatan">Jabatan</label>
                                                                    <select class="form-control" name="jabatan_id"
                                                                        id="jabatan_id">
                                                                        @foreach ($jabatan as $item)
                                                                            <option value="{{ $item->id }}">
                                                                                {{ $item->jabatan }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="tgl_lahir">Tanggal
                                                                        Lahir</label>
                                                                    <input type="date"
                                                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                                        name="tgl_lahir" id="tgl_lahir"
                                                                        aria-describedby="tgl_lahir"
                                                                        value="{{ $value->tgl_lahir }}"
                                                                        autocomplete="tgl_lahir" autofocus />
                                                                </div>
                                                                <div class="mb-1">
                                                                    <label class="form-label" for="tgl_masuk">Tanggal
                                                                        Masuk</label>
                                                                    <input type="date"
                                                                        class="form-control @error('tgl_masuk') is-invalid @enderror"
                                                                        name="tgl_masuk" id="tgl_masuk"
                                                                        aria-describedby="tgl_masuk"
                                                                        value="{{ $value->tgl_masuk }}"
                                                                        autocomplete="tgl_masuk" autofocus />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>
                                                    <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                        action="{{ route('pegawai.destroy', $value->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"class="btn btn-danger">Hapus</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('pegawai.destroy', $value->id) }}" class="btn btn-xs btn-danger"
                                        onclick="return confirm('yakin?');">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{ $data->links() }}
    <!-- Table head options end -->
@endsection
