<?php
                           if ($_SESSION['admin']) {
                            $sql = $koneksi -> query("select * from tb_booking");
                        }else{
                            $id_customer_login = $_SESSION['customer'];
                            $sql = $koneksi->query("select * from tb_booking where id_customer='$id_customer_login'");
                           }
                        ?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Booking
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nama Capster</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Booking</th>
                                            <th>Jam Booking</th>
                                            <th>Paket Barbershop</th>
                                            <th>Harga</th>
                                            <th>Lokasi Barbershop</th>
                                            <th>No Antrian</th>
                                            <th>Status Pembayaran</th>
                                            <th>Bayar</th>
                                            <th>Kembalian</th>
                                            
                                            <?php if ($_SESSION['admin']) {?>
                                            <th>Aksi</th>
                                         <?php } ?>  

                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no=1;
                                    		while ($data = $sql->fetch_assoc()) {
                                    			# code...
                                    		
                                    	?>
                                    	<tr>
                                    		
                                    		<td><?php echo $data['nama_capster'];?></td>
                                            <td><?php echo $data['nama_customer'];?></td>
                                            <td><?php echo $data['tanggal_booking'];?></td>
                                    		<td><?php echo $data['jam_booking'];?></td>
                                    		<td><?php echo $data['paket'];?></td>
                                            <td nowrap=""><?php echo number_format($data['harga'],"0",",",".");?></td>
                                    		<td><?php echo $data['lokasi_barbershop'];?></td>
                                            <td><?php echo $data['no_antrian'];?></td>
                                            <td><?php echo $data['status_pembayaran'];?></td>
                                            <td nowrap=""><?php echo number_format($data['bayar'],"0",",",".");?></td>
                                            <td nowrap=""><?php echo number_format($data['kembalian'],"0",",",".");?></td>
                                    		<td nowrap>
                                                <?php if ($_SESSION['admin']) {?>
                                                <?php if($data['status_pembayaran']=="belum lunas"): ?>
                                                    <a type="button" data-toggle="modal" data-target="#<?php echo $data['id_booking']; ?>" href="#" class="btn btn-success">Bayar</a>
                                    			     <a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=booking&aksi=hapus&id=<?php echo $data['id_booking']; ?>" class="btn btn-danger">Hapus</a>
                                                <?php endif ?>
                                                <?php } ?> 
                                                <a href="?page=nota&id=<?php echo $data['id_booking']; ?>" class="btn btn-info">Nota</a>
                                    	</td>
                                    	</tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo $data['id_booking']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
                                              </div>
                                              <form method="POST">
                                                  <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $data['id_booking']; ?>">
                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <input id="harga<?php echo $data['id_booking']; ?>" type="text" name="harga" class="harga form-control" value="<?php echo $data['harga']; ?>" readonly="readonly">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Bayar</label>
                                                            <input type="number" name="bayar" class="form-control "onkeyup="bayarFunc(this,<?php echo $data['id_booking']; ?>)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kembalian</label>
                                                            <input type="text" name="kembalian" class="form-control" id="kembalian<?php echo $data['id_booking']; ?>" readonly="readonly">
                                                        </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                                    <button type="submit" name="bayarSimpan" disabled="disabled" class="tombol btn btn-primary">Simpan</button>
                                                  </div>
                                             </form>
                                            </div>
                                          </div>
                                        </div>
                                    <?php } ?>
                                    </tbody>
                                </table>
                              </div>   
                               <?php if ($_SESSION['customer']) {?>
                              <a href="?page=booking&aksi=tambah" class="btn btn-primary active" style="margin-top: 8px">Booking</a>
                              <?php } ?>
                    </div>
                  </div>
</div>
<?php
if(isset($_POST['bayarSimpan'])){
    $id = $_POST['id'];
    $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembalian'];
    $koneksi->query("UPDATE tb_booking SET status_pembayaran='lunas', bayar='$bayar',kembalian='$kembalian' WHERE id_booking='$id'");
?>
<script type="text/javascript">

                    alert  ("Pembayaran berhasil dilakukan");

                    window.location.href="?page=booking";
            </script>
<?php
}
?>