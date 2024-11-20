

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                             Data User
                        </div>
                        <div class="panel-body" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Alamat Email</th>
                                            <th>Level</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $no = 1;

                                            $sql = $koneksi->query("select * from tb_customer ");

                                            while ($data= $sql->fetch_assoc()) {


                                            	
                                                
                                           
                                        ?>

                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['username'];?></td>
                                            <td><?php echo $data['nama_customer'];?></td>
                                            <td><?php echo $data['no_hp'];?></td>
                                            <td><?php echo $data['alamat_email'];?></td>
                                            <td><?php echo $data['level'];?></td>
                                            <td><?php echo $data['password'];?></td>

                                             <td>
                                                <a href="?page=user&aksi=ubah&id=<?php echo $data['id_customer']; ?>" class="btn btn-primary">Ubah</a>
                                                <a onclick="return confirm('Anda Yakin Akan Mengahapus Data Ini ... ???')" href="?page=user&aksi=hapus&id=<?php echo $data['id_customer']; ?>" class="btn btn-danger" > Hapus</a>

                                            </td>
                                        </tr>


                                        <?php  } ?>
                                    </tbody>

                                    </table>
                                  </div>

                                  <a href="?page=user&aksi=tambah" class="btn btn-primary active" style="margin-top: 8px;"> Tambah Data</a>

                                 
                        </div>
                     </div>
                   </div>
     </div>                          