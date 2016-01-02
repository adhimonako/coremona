<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<?php 
    if (isset($user)) {
        foreach ($user as $row ) {
?>
<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Edit User</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php echo validation_errors();?>
        <form role="form" method="post" action="<?php echo base_url();?>user/edit/<?php echo $row['user_id'];?>">
            <!-- text input -->
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama_user" class="form-control" value="<?php echo $row['user_nama'];?>" />
            </div>
            <div class="form-group">
                <label>Email User</label>
                <input type="email" name="email_user" class="form-control" value="<?php echo $row['user_email'];?>" />
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="nm_user" class="form-control" value="<?php echo $row['user_username'];?>" />
            </div>
                <input type="hidden" name="id_user" class="form-control" value="<?php echo $row['user_id'];?>"/>
            
            <div class="box-footer">
                <button class="btn btn-danger">Reset Password</button>
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Update</button>
            </div>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<?php
        }
    }
?>
