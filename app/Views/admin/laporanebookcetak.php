<!DOCTYPE html>
<html>
<title>LAPORAN BUKU DIGITAL</title>
<style type="text/css">
    body {
        -webkit-print-color-adjust: exact;
        padding: 50px;
    }

    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        font-size: 14px;
    }

    #table td,
    #table th {
        padding: 8px;
        padding-top: 10px;
    }

    #table tr {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    @page {
        size: auto;
        margin: 0;
    }
</style>

<body>
    <!-- <table style='width:540px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
        <tr>
            <td><img src="<?= base_url('foto/logo.jpg'); ?>" width="90"></td>
            <td>
                <center>
                    <font size="5"><b>SMA YPK DIOSPORA</b></font><br>
                    <font size="3"><b> Jl. Kotaraja Dalam, Kel. Vim,<br> Kec. Abepura, Kota Jayapura, Papua</b></font><br>
                </center>
            </td>
        </tr>
    </table>
    <br> -->
    <center>
        <h4>LAPORAN BUKU DIGITAL<br></h4>
    </center>
    <br>
    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Nama Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Foto</th>
                <th>Total Download</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($laporan as $row): ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $row->kodebuku; ?></td>
                    <td><?= $row->namabuku; ?></td>
                    <td><?= $row->nama_kategori; ?></td>
                    <td><?= $row->penulis; ?></td>
                    <td><img src="<?= base_url('foto/' . $row->fotobuku); ?>" width="100px"></td>

                    <td><?= $row->totaldownload; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>