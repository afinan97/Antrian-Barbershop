<?php
                           if(!isset($_SESSION['admin'])){
                                $user_1=(!isset($_SESSION['admin']));
                           
                           }elseif (!isset($_SESSION['customer'])) {
                                $user_1=(!isset($_SESSION['customer']));
                           }
                           
                           $sql_u = $koneksi->query("select* from tb_capster where id_capster='$user_1'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>
<div class="row">
                <div class="col-md-12">
                	
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Capster
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Lokasi Barbershop</th>
                                            <th>Jam Mulai Barbershop</th>
                                            <th>Jam Selesai Barbershop</th>
                                            
                                            <?php if ($_SESSION['admin']) {?>
                                            <th>Aksi</th>
                                            <?php } ?> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no=1;
                                    		$sql = $koneksi->query("select * from tb_capster");
                                    		while ($data = $sql->fetch_assoc()) {
                                    			# code...
                                    		
                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++;?></td>
                                    		<td><?php echo $data['nama'];?></td>
                                    		<td><?php echo $data['no_hp'];?></td>
                                    		<td><?php echo $data['lokasi_barbershop'];?></td>
                                    		<td><?php echo $data['jam_mulai_barbershop'];?></td>
                                            <td><?php echo $data['jam_selesai_barbershop'];?></td>
                                    		<td>
                                                <?php if ($_SESSION['admin']) {?>
                                    			<a href="?page=capster&aksi=ubah&id=<?php echo $data['id_capster']; ?>" class="btn btn-primary">Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')" href="?page=capster&aksi=hapus&id=<?php echo $data['id_capster']; ?>" class="btn btn-danger">Hapus</a>
                                                <?php } ?> 
                                    	</td>
                                    	</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                              </div>     
                              <?php if ($_SESSION['admin']) {?>
                              <a href="?page=capster&aksi=tambah" class="btn btn-primary active" style="margin-top: 8px;"></i> Tambah Data</a>
                              <?php } ?> 
                    </div>

                  </div>
</div>