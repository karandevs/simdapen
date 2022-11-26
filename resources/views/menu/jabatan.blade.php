@extends('layouts.main')

@section('content')
    <!-- Table head options start -->
    <div class="row" id="table-head">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-text"> Data Jabatan </h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pangkat</h5>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal"aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('jabatan.store') }}">
                                        @csrf
                                        <div class="row d-flex align-items-end">
                                            <div class="">
                                                <div class="mb-1">
                                                    <label class="form-label" for="jabatan">Jabatan</label>
                                                    <input type="text"
                                                        class="form-control @error('jabatan') is-invalid @enderror"
                                                        name="jabatan" id="jabatan" aria-describedby="jabatan"
                                                        value="{{ old('jabatan') }}" required autocomplete="jabatan"
                                                        autofocus placeholder="Contoh: Kepala Kantor" />
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
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Jabatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{ $data->firstItem() + $key }}</td>
                                    <td>{{ $value->jabatan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal{{ $value->id }}"> Ubah
                                        </button>
                                        <div class="modal fade" id="modal{{ $value->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Jabatan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST"
                                                            action="{{ route('jabatan.update', $value->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row d-flex align-items-end">
                                                                <div class="">
                                                                    <div class="mb-1">
                                                                        <label class="form-label"
                                                                            for="jabatan">Jabatan</label>
                                                                        <input type="text"
                                                                            class="form-control @error('jabatan') is-invalid @enderror"
                                                                            name="jabatan" id="jabatan"
                                                                            aria-describedby="jabatan"
                                                                            value="{{ old('jabatan') }}"
                                                                            autocomplete="jabatan" autofocus required
                                                                            placeholder="{{ $value->jabatan }}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                        </form>
                                                        <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                            action="{{ route('jabatan.destroy', $value->id) }}"
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
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{ $data->links() }}
    <!-- Table head options end -->
@endsection
