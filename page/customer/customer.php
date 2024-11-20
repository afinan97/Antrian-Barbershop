<?php
                           if(!isset($_SESSION['admin'])){
                                $user_1=(!isset($_SESSION['admin']));
                           
                           }elseif (!isset($_SESSION['customer'])) {
                                $user_1=(!isset($_SESSION['customer']));
                           }
                           
                           $sql_u = $koneksi->query("select* from tb_customer where id_customer='$user_1'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>


<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data Customer
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Customer</th>
                                            <th>No HP</th>
                                            <th>Alamat email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		$no=1;
                                    		$sql = $koneksi->query("select * from tb_customer");
                                    		while ($data = $sql->fetch_assoc()) {
                                    			# code...
                                    		
                                    	?>
                                    	<tr>
                                    		<td><?php echo $no++;?></td>
                                    		<td><?php echo $data['nama_customer'];?></td>
                                    		<td><?php echo $data['no_hp'];?></td>
                                    		<td><?php echo $data['alamat_email'];?></td>
                                    		<td>
                                    			<a href="?page=customer&aksi=ubah&id=<?php echo $data['id_customer']; ?>" class="btn btn-primary">Ubah</a>
                                    			<a onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')" href="?page=customer&aksi=hapus&id=<?php echo $data['id_customer']; ?>" class="btn btn-danger">Hapus</a>

                                    	</td>
                                    	</tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                          </div>
                         
                    </div>
                  </div>
</div>
                               