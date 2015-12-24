<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<div class="box">
    <div class="box-header">
       <h3 class="box-title">List Ebook In Server</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Ebook</th>
                    <th>Deskripsi Ebook</th>
                    <th>Halaman Ebook</th>
                    <th>Penulis Ebook</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori Ebook</th>
                    <th>Tgl Upload Ebook</th>
                    <th>Harga Ebook</th>
                    <th>Cover Ebook </th>
                    <th>Judul Ebook</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $no = 1;  
            ?>

            <?php 
                if (isset($pdf)) {
                    foreach ($pdf as $row ) {
            ?>
                <tr>
                    <th><?php echo $no++?></th>
                    <th><?php echo $row['Judul_Ebook'];?></th>
                    <th><?php echo $row['Deskripsi_Ebook'];?></th>
                    <th><?php echo $row['Jml_Hal_Ebook'];?></th>
                    <th><?php echo $row['Penulis_Ebook'];?></th>
                    <th><?php echo $row['Thn_Terbit'];?></th>
                    <th><?php echo $row['Kategori_Ebook'];?></th>
                    <th><?php echo $row['Tgl_Upload'];?></th>
                    <th><?php echo $row['Price'];?></th>
                    <th>
                        <img src="<?php echo base_url('pdfimage/'.$row['Upload_Image_Ebook']);?>">
                    </th>
                    <th>
                        <?php echo $row['Upload_Pdf_Ebook'];?>
                    </th>
                    <th>
                        <span class="glyphicon glyphicon-file" onclick="getActive(<?php echo $row['ID_Ebook']?>)"></span> 
                    </th>
                </tr>
            <?php 
                } 
            }
            ?>
            </tbody>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->
<script src="<?php echo base_url();?>asset/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>asset/js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function() 
            {
                $("#example1").dataTable();
                $("#example2").dataTable
                ({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": true
                });
            });
            function getActive(id) {
                var r = confirm("Apakah Ebook Bisa Di Dwonload ?");
                if (r == true) {
                    document.location.href = "<?php echo base_url();?>ebook/set_permisson_ebook/"+id ;
                    alert("Set Permisson Akses Download Sukses");
                } else {
                    alert("Beri Akses Gagal");
                }
            }
</script>