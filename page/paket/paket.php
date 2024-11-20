<?php
                           if(!isset($_SESSION['admin'])){
                                $user_1=(!isset($_SESSION['admin']));
                           
                           }elseif (!isset($_SESSION['customer'])) {
                                $user_1=(!isset($_SESSION['customer']));
                           }
                           
                           $sql_u = $koneksi->query("select* from tb_paket where id_paket='$user_1'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Paket
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Paket</th>
                                            <th>Harga</th>
                                            <th>Pelayanan</th>

                                            <?php if ($_SESSION['admin']) {?>
                                            <th>Aksi</th>
                                            <?php } ?> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no=1;
                                    		$sql = $koneksi->query("select * from tb_paket");
                                    		while ($data = $sql->fetch_assoc()) {
                                    			# code...
                                    		
                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++;?></td>
                                    		<td><?php echo $data['jenis_paket'];?></td>
                                    		<td><?php echo $data['harga'];?></td>
                                    		<td><?php echo $data['pelayanan'];?></td>
                                    		<td>
                                                <?php if ($_SESSION['admin']) {?>
                                    			<a href="?page=paket&aksi=ubah&id=<?php echo $data['id_paket']; ?>" class="btn btn-primary">Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=paket&aksi=hapus&id=<?php echo $data['id_paket']; ?>" class="btn btn-danger">Hapus</a>
                                                <?php } ?> 
                                    	</td>
                                    	</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                              </div> 
                              <?php if ($_SESSION['admin']) {?>
                              <a href="?page=paket&aksi=tambah" class="btn btn-primary active" style="margin-top: 8px">Tambah Data</a>
                              <?php } ?>
                    </div>
                  </div>
</div>