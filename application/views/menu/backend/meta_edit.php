<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Meta</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">
                <form action="<?php echo base_url() ?>Administrator/update_meta" method="post" enctype="multipart/form-data">
                    <div class="row">
                    <?php
                        if($error == true)
                        {?>
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong><?=$error?></strong>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <?php echo validation_errors(); ?>
                    <?php if(@$msg<>"") echo @$msg; ?>
                    <?php extract($data) ?>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>
                                Meta Title
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <span class="input-group-addon" type="button">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </span>
                                <input id="meta_title" type="text" class="form-control" name="meta_title" value="<?php echo $meta_title; ?>" />
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>
                                Meta Keyword
                            </label>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <textarea id="meta_keyword" name="meta_keyword" class="form-control" rows="5" style="resize: vertical;" ><?php echo $meta_keyword; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>
                                Meta Desc
                            </label>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group">
                                <textarea id="meta_desc" name="meta_desc" class="form-control" rows="5" style="resize: vertical;" ><?php echo $meta_desc; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-8 text-right">
                            <input type="hidden" name="meta_id" value="<?php echo $meta_id; ?>">
                            <!-- <input type="hidden" name="path" value="<?php //echo $path; ?>"> -->
                            <button class="btn btn-primary" type="submit">
                                Simpan
                            </button>
                            <a href="<?php echo base_url() ?>Administrator/edit_meta/<?php echo $meta_id?>" class="btn btn-default" type="submit">
                                Batal
                            </a>
                        </div>                            
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    