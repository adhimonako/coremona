<?php 
    if($this->session->userdata("nm_user") == "")
    {
        redirect ("login","refresh");
    }
 ?>
<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Manage Your Profil</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url();?>register/manage_profil">
            <?php 
            
                if (isset($user)) {
                    foreach ($user as $row ) {
            ?>
            <!-- text input -->
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nm_user" class="form-control" value="<?php echo $row['Nama_User'];?>" />
            </div>
            <div class="form-group">
                <label>Email User</label>
                <input type="email" name="email_user" class="form-control" value="<?php echo $row['Email_User'];?>" />
            </div>
            <div class="form-group">
                <label>Tanggal Lahir</label>
            </div>
            <div>
                <input type="date" name="birth_day" class="form_input datepicker small-form" value="<?php echo $row['Tgl_Lahir_User'];?>"/>
            </div>
             <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass_user" class="form-control" placeholder="Password" />
            </div>
             <div class="form-group">
                <label>Confrim Password</label>
                <input type="password" name="pass_confrim" class="form-control" placeholder="Confrim Password" />
            </div>
                <input type="hidden" name="id_user" class="form-control" />
            <?php
                }
            }
            ?>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->