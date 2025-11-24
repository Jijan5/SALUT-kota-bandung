<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h2>Daftar Pendaftar Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Email</th>
                <th>Agama</th>
                <th>Gender</th>
                <th>Status</th>
                <th>NIK</th>
                <th>Provinsi</th>
                <th>Kab/Kota</th>
                <th>Kecamatan</th>
                <th>Desa/Kelurahan</th>
                <th>Kode Pos</th>
                <th>Alamat</th>
                <th>Alamat Pengirim Modul</th>
                <th>Alamat Lain</th>
                <th>Lokasi Ujian Provinsi</th>
                <th>Lokasi Ujian Kab/Kota</th>
                <th>Ukuran Almamater</th>
                <th>Nama Ibu Kandung</th>
                <th>No. HP</th>
                <th>No. HP Alternatif</th>
                <th>Jalur Program</th>
                <th>File Ijazah</th>
                <th>No. Ijazah</th>
                <th>File Transkrip</th>
                <th>IPK</th>
                <th>File Foto</th>
                <th>File KTP</th>
                <th>File SS PDDIKTI</th>
                <th>Form Tanda Tangan</th>
                <th>Surat Pernyataan</th>
                <th>Surat Keterangan Pindah</th>
                <th>File RPL Pembelajaran</th>
                <th>File RPL Administrasi</th>
                <th>File RPL Ekstrakulikuler</th>
                <th>File RPL Prestasi</th>
                <th>File CV</th>
                <th>File Bukti Pembayaran</th>
        </thead>
        <tbody>
            @forelse($datapendaftar as $index => $pendaftar)
                <tr>
                    <td>{{ $index + 1}}</td>
                    <td>{{ $pendaftar->nama }}</td>
                    <td>{{ $pendaftar->tempat_lahir }}</td>
                    <td>{{ $pendaftar->tanggal_lahir }}</td>
                    <td>{{ $pendaftar->email }}</td>
                    <td>{{ $pendaftar->agama }}</td>
                    <td>{{ $pendaftar->gender }}</td>
                    <td>{{ $pendaftar->status }}</td>
                    <td>{{ $pendaftar->nik }}</td>
                    <td>{{ $pendaftar->provinsi }}</td>
                    <td>{{ $pendaftar->kab_kota }}</td>
                    <td>{{ $pendaftar->kecamatan }}</td>
                    <td>{{ $pendaftar->desa_kelurahan }}</td>
                    <td>{{ $pendaftar->kode_pos }}</td>
                    <td>{{ $pendaftar->alamat }}</td>
                    <td>{{ $pendaftar->alamat_pengirim_modul }}</td>
                    <td>{{ $pendaftar->alamat_lain }}</td>
                    <td>{{ $pendaftar->ukuran_almat }}</td>
                    <td>{{ $pendaftar->nama_ibu_kandung }}</td>
                    <td>{{ $pendaftar->no_hp }}</td>
                    <td>{{ $pendaftar->no_hp_alternatif }}</td>
                    <td>{{ $pendaftar->jalur_program }}</td>
                    <td>{{ $pendaftar->file_ijazah }}</td>
                    <td>{{ $pendaftar->no_ijazah }}</td>
                    <td>{{ $pendaftar->file_transkrip }}</td>
                    <td>{{ $pendaftar->ipk }}</td>
                    <td>{{ $pendaftar->file_foto }}</td>
                    <td>{{ $pendaftar->file_ktp }}</td>
                    <td>{{ $pendaftar->file_ss_pddikti }}</td>
                    <td>{{ $pendaftar->form_tanda_tangan }}</td>
                    <td>{{ $pendaftar->surat_pernyataan }}</td>
                    <td>{{ $pendaftar->surat_keterangan_pindah }}</td>
                    <td>{{ $pendaftar->file_rpl_pembelajaran }}</td>
                    <td>{{ $pendaftar->file_rpl_administrasi }}</td>
                    <td>{{ $pendaftar->file_rpl_ekstrakulikuler }}</td>
                    <td>{{ $pendaftar->file_rpl_prestasi }}</td>
                    <td>{{ $pendaftar->file_cv }}</td>
                    <td>{{ $pendaftar->file_bukti_pembayaran }}</td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
