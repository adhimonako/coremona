<div class="box box-succesful">
    <div class="box-header">
        <h3 class="box-title">Input User</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <?php echo validation_errors();?>
        <form role="form" method="post" action="<?php echo base_url();?>user/input_user">
            <!-- text input -->
            <div class="form-group">
                <label>Nama User</label>
                <input type="text" name="nama_user" class="form-control"  />
            </div>
            <div class="form-group">
                <label>Email User</label>
                <input type="email" name="email_user" class="form-control" />
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="nm_user" class="form-control" />
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role_id" class="form-control">
                    <option value="1">Super User</option>
                    <option value="2">Admin</option>
                </select>
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
            <div class="box-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
         </form>
    </div><!-- /.box-body -->
</div><!-- /.box -->