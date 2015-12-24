<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Form Edit Ebook</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url();?>ebook/view?id=<?=!empty($pdf->ID_Ebook)?$pdf->ID_Ebook:'';?>" enctype="multipart/form-data">
            <?php echo validation_errors();?>
            <!-- text input -->
            <div class="form-group">
                <label>Judul Ebook</label>
                <input type="text" name="jdl_ebook" class="form-control" value="<?=!empty($pdf->Judul_Ebook)?$pdf->Judul_Ebook:'';?>" />
            </div>
            <div class="form-group">
                <label>Deskripsi Ebook</label>
                <textarea name="desk_ebook" class="form-control" rows="5"><?=!empty($pdf->Deskripsi_Ebook)?$pdf->Deskripsi_Ebook:'';?></textarea>
            </div>
            <div class="form-group">
                <label>Jumlah Halaman Ebook</label>
                <input type="text" name="jml_hal_ebook" class="form-control" value="<?=!empty($pdf->Jml_Hal_Ebook)?$pdf->Jml_Hal_Ebook:'';?>"/>
            </div>
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis_ebook" class="form-control" value="<?=!empty($pdf->Penulis_Ebook)?$pdf->Penulis_Ebook:'';?>"/>
            </div>
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="text" name="thn_terbit_ebook" class="form-control" value="<?=!empty($pdf->Thn_Terbit)?$pdf->Thn_Terbit:'';?>"/>
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
                <input type="text" name="harga_ebook" class="form-control" value="<?=!empty($pdf->Price)?$pdf->Price:'';?>"/>
            </div>
            <div class="form-group">
            <label >Upload Ebook</label>
               <input type="file" name="upload_ebook" accept="application/pdf" id="upload_ebook"/><?=!empty($pdf->Upload_Pdf_Ebook)?$pdf->Upload_Pdf_Ebook:'';?>
            </div>
            <div class="form-group">
            <label >Upload Image Ebook</label>
               <input type="file" name="upload_image_ebook" id="upload_image_ebook"/><?=!empty($pdf->Upload_Image_Ebook)?$pdf->Upload_Image_Ebook:'';?>
            </div>
                <input type="hidden" name="id_ebook" class="form-control" value="<?=!empty($pdf->ID_Ebook)?$pdf->ID_Ebook:'';?>"/>
            <div class="box-footer">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
            </div>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->