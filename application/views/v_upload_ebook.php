<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Form Upload Ebook</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php echo validation_errors();?>
        <form role="form" method="post" action="<?php echo base_url();?>ebook/input_ebook" enctype="multipart/form-data">
            <!-- text input -->
            <div class="form-group">
                <label>Judul Ebook</label>
                <input type="text" name="jdl_ebook" class="form-control" placeholder="Judul Ebook" />
            </div>
            <div class="form-group">
                <label>Deskripsi Ebook</label>
                <textarea name="desk_ebook" class="form-control" rows="5" placeholder="Deskripsi Singkat Ebook"></textarea>
            </div>
            <div class="form-group">
                <label>Jumlah Halaman Ebook</label>
                <input type="text" name="jml_hal_ebook" class="form-control" placeholder="Jumlah Halaman Ebook" />
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis_ebook" class="form-control" placeholder="Penulis Ebook" />
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="thn_terbit_ebook" class="form-control" placeholder="Tahun Terbit Ebook" />
            </div>
            <div class="form-group">
                <label>Kategori Ebook</label>
                <select name="kategori_ebook">
                    <option>Komedi </option>
                    <option>Sejarah</option>
                    <option>Pendidikan</option>
                    <option>Biografi</option>
                    <option>Anak-anak</option>
                    <option>Bisnis & Keuangan</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga Ebook</label>
                <input type="text" name="harga_ebook" class="form-control" placeholder="Harga Ebook Dalam Rupiah" />
            </div>
            <div class="form-group">
            <label >Upload Ebook</label>
               <input type="file" name="upload_ebook" accept="application/pdf" id="upload_ebook">
            </div>
            <div class="form-group">
            <label >Upload Image Ebook</label>
               <input type="file" name="upload_image_ebook" id="upload_image_ebook">
            </div>
                <input type="hidden" name="id_ebook" class="form-control" />
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" >Simpan</button>
            </div>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.boxs -->
<!-- lala -->
