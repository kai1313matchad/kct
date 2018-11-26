<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Account Data</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <?php extract($account)?>
                <?php echo validation_errors(); ?>
                <?php if(@$msg<>"") echo @$msg; ?>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Admin Data</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url() ?>Administrator/change_account_pass" method="post" >
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="username" type="text" class="form-control" name="username" value="<?php echo $username ; ?>" readonly>
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="password" type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2 col-lg-offset-2 text-left">
                                                <button class="btn btn-primary" type="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Email Contact Us</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url() ?>Administrator/change_contact_mail" method="post">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="username" type="email" class="form-control" name="cmail" value="<?php echo $contact_mail ; ?>">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="password" type="password" class="form-control" name="password2">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2 col-lg-offset-2 text-left">
                                                <button class="btn btn-primary" type="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Email Career</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="<?php echo base_url() ?>Administrator/change_hc_mail" method="post">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="username" type="text" class="form-control" name="hcmail" value="<?php echo $hc_mail ; ?>">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label>Password</label>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <span class="input-group-addon" type="button"><i class="glyphicon glyphicon-pencil"></i></span>
                                                    <input id="password" type="password" class="form-control" name="password3">
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-lg-2 col-lg-offset-2 text-left">
                                                <button class="btn btn-primary" type="submit">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
            </div>
            <!-- /.container-fluid -->            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->