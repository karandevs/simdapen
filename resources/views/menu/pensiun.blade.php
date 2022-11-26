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
