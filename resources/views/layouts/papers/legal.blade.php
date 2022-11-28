<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: legal
        }
    </style>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script>
        window.print()
    </script>
</head>

<body class="legal">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <!-- Write HTML just like a web page -->
        <article class="d-flex flex-column align-items-start">
            <div class="text-start">
                <p>Nomor &nbsp; &nbsp; &nbsp; : </p>
                <p>Lampiran &nbsp; &nbsp;: </p>
                <p>Hal &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Permohonan Pensiun</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; An. {{ $pegawai->nama }}</p>
                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIP. {{ $pegawai->nip }}</p>
                <p>Yth. Bapak Kepala Kantor Wilayah</p>
                <p>Badan Pertanahan Nasional</p>
                <p>Provinsi Jawa Barat</p>
                <p>Di Bandung</p>
                <br>
                <p>Dengan hormat kami sampaikan permohonan pensiun atas nama {{ $pegawai->nama }}, NIP.
                    {{ $pegawai->nip }}, {{ $pegawai->pktgol->pangkat }} ({{ $pegawai->pktgol->golongan }}),
                    {{ $pegawai->jabatan->jabatan }} pada Kantor Pertanahan Kota Bogor.
                    Berdasarkan data kepegawaian dapat kami jelaskan sebagai berikut :</p>
                @php
                    $awal = new DateTime($pegawai->tgl_masuk);
                    $akhir = new DateTime();
                    $diff = $awal->diff($akhir);
                @endphp
                <p>1. Bahwa Pegawai yang bersangkutan dilahirkan pada tanggal
                    {{ date('d F Y', strtotime($pegawai->tgl_lahir)) }} dan pada tanggal
                    {{ date('d F Y', strtotime($pegawai->tgl_lahir . '+ 58 years')) }} genap berusia 58 tahun, telah
                    memiliki masa kerja {{ $diff->y . ' tahun ' . $diff->m . ' bulan ' . $diff->d . ' hari' }}.</p>
                <p>2. Berdasarkan Undang-undang No. 11 Tahun 1960 tentang Pensiun Pegawai, maka yang bersangkutan
                    Terhitung Mulai Tanggal {{ date('d F Y', strtotime($pegawai->tgl_lahir . '+ 58 years')) }} telah
                    mencapai usia batas pensiun.</p>
                <p>3. Sebagai bahan pertimbangan, bersama ini kami lampirkan persyaratan yang diperlukan antara lain:
                </p>
                <p>
                    a. Foto Copy SK Calon PNS (80%);<br>
                    b. Foto Copy SK PNS (100%);<br>
                    c. Foto Copy SK Pangkat terakhir;<br>
                    d. Foto Copy SK Jabatan;<br>
                    e. Foto Copy Sah Kenaikan Gaji Berkala (KGB) Terakhir;<br>
                    f. Foto Copy Sah Kartu Pegawai (KARPEG);<br>
                    g. Daftar Riwayat Pekerjaan (DRP);<br>
                    h. Surat Keterangan belum pernah dijatuhi hukuman disiplin tingkat sedang/berat dari Kepala
                    Kantor;<br>
                    i. Daftar Susunan Keluarga;<br>
                    j. Foto Copy/legalisir Surat Nikah;<br>
                    k. Foto Copy/legalisir Akte Kelahiran Anak;<br>
                    l. Foto Copy Kartu Peserta Taspen;<br>
                    m. DPCP (Daftar Pegawai Calon Pensiun);<br>
                    n. Foto Copy/legalisir PPK (Prestasi Penilaian Kinerja) 2 Tahun Terakhir;<br>
                    o. Pas photo terbaru 3x4 sebanyak 7 Lembar warna/hitam putih.
                </p>
                <p>Demikian permohonan ini kami sampaikan, untuk dapat diproses lebih lanjut.</p>
                <div class="text-end">
                    <p>Kepala Kantor Pertanahan<br>Kota Bogor</p>
                    <br><br><br>
                    <p>Rahmat, A.Ptnh., M.M.</p>
                    <p>NIP. 1970110 199203 1 006</p>
                </div>
                <p>Tembusan, disampaikan kepada Yth. :</p>
                <p>
                    1. Menteri Agraria dan Tata Ruang/Badan Pertanahan Nasional Up. Sekretaris Jenderal, di Jakarta;<br>
                    2. Kepala Badan Kepegawaian Negara, di Jakarta.<br>
                </p>
            </div>
        </article>
    </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
