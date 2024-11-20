<?php $id_customer = (isset($_SESSION['customer'])) ? $_SESSION['customer'] : $_SESSION['admin'];
$sql = $koneksi->query("SELECT * FROM tb_customer WHERE id_customer='$id_customer'");
$profil = $sql->fetch_assoc();
?>

<div class="panel panel-pimary">
    <div class="panel-heading">
        <h2 class="panel-title"> Profil </h2>
</div>
<div class="panel-body">
    <table class="table table-striped">
        <tr>
            <th style="border-top:none;width: 10px;"> Nama </th>
            <td style="border-top:none;">: <?php echo $profil['nama_customer']; ?> </td>
        </tr>

        <tr>
            <th style="border-top:none;width: 10px;"> Username </th>
            <td style="border-top:none;">: <?php echo $profil['username']; ?> </td>
        </tr>

        <tr>
            <th style="border-top:none;width: 10px;"> No HP </th>
            <td style="border-top:none;">: <?php echo $profil['no_hp']; ?> </td>
        </tr>

        <tr>
            <th style="border-top:none;width: 10px;"> Email </th>
            <td style="border-top:none;">: <?php echo $profil['alamat_email']; ?> </td>
        </tr>
    </table>
    <a href="?page=profil&aksi=ubahakun&id=<?php echo $id_customer; ?>" class="btn btn-primary"> Ubah</a>
</div>
</div>