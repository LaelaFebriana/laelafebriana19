<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 30px;
            font-size: 36px;
            font-weight: bold;
        }

        a.button {
            text-decoration: none;
            color: white;
            background-color: #666;
            padding: 12px 20px;
            border-radius: 6px;
            transition: 0.3s ease;
            font-size: 16px;
            font-weight: bold;
        }

        a.button:hover {
            background-color: #555;
        }

        .button-container {
            text-align: center;
            margin: 20px 0;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 0 auto 40px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #444;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #e6e6e6;
        }

        tr:hover {
            background-color: #d6d6d6;
        }

        .aksi a {
            margin: 0 5px;
            padding: 8px 12px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .edit {
            background-color: #5a5a5a;
        }

        .edit:hover {
            background-color: #4a4a4a;
        }

        .hapus {
            background-color: #888;
        }

        .hapus:hover {
            background-color: #777;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <h2>Daftar Mahasiswa</h2>
    <div class="button-container">
        <a class="button" href="tambah.php">+ Tambah Data Mahasiswa</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        include "koneksi.php";
        $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
        $no = 1;

        while ($data = mysqli_fetch_array($query)) {
            echo "<tr>
                    <td>$no</td>
                    <td>{$data['npm']}</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['prodi']}</td>
                    <td>{$data['email']}</td>
                    <td>{$data['alamat']}</td>
                    <td class='aksi'>
                        <a class='edit' href='edit.php?npm={$data['npm']}'>Edit</a>
                        <a class='hapus' href='#' onclick=\"konfirmasiHapus('{$data['npm']}')\">Hapus</a>
                    </td>
                  </tr>";
            $no++;
        }
        ?>
    </table>

    <script>
        function konfirmasiHapus(npm) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data mahasiswa dengan NPM " + npm + " akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "hapus.php?npm=" + npm;
                }
            });
        }
    </script>

</body>

</html>
