<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header">
                <h2 class="box-title">Daftar User</h2>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="col-lg-2 pull-right">
                    <a href="<?php echo base_url().'user/input_user';?>"><button class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i>Add</button></a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;  
                    ?>

                    <?php 
                        if (isset($data_view)) {
                            foreach ($data_view as $row ) {
                    ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['user_nama'];?></td>
                            <td><?php echo $row['user_email'];?></td>
                            <td><?php echo $row['user_username'];?></td>
                            <td>
                                <a href="<?=base_url().'user/edit/'.$row['user_id'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                                <a href="javascript:void(0)"><span class="glyphicon glyphicon-trash" onclick="hapus_ebook(<?php echo $row['user_id']?>)"></span></a>
                            </td>
                        </tr>
                    <?php 
                        } 
                    }
                    ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
<script src="<?php echo base_url();?>asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
            function hapus_ebook(id) 
            {
                var r = confirm("Apakah Yakin menghapus? ");
                if (r == true) {
                    document.location.href = "<?php echo base_url();?>user/hapus/"+ id;
                }
            }

            function edit(id,judul,desk,jml_hal,penulis,kategori,upload_pdf,upload_image)
            {
                var r = confirm("Apakah Ebook Mau Di Edit ? ");
                if (r == true) {
                    $("input[name= jdl_ebook]").val(judul);
                    $("input[name= desk_ebook]").val(desk);
                    $("input[name= jml_hal_ebook]").val(jml_hal);
                    $("input[name= penulis_ebook]").val(penulis);
                    $("input[name= kategori_ebook]").val(kategori);
                    $("input[name= upload_ebook]").val(upload_pdf);
                    $("input[name= upload_image_ebook]").val(upload_image);
                    $("input[name= id_ebook]").val(id);
                    document.location.href = "<?php echo base_url();?>ebook/view/"+val(id);
                }
               
            }
            
</script>