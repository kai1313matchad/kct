<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Artikel</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php
            if (@$this->input->get('sts') == "del_sukses")
            {   ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                    <strong>Data berhasil di hapus!</strong>
                </div>
            <?php
            }
            ?>
            <div class="row">                
                <form action="<?php echo base_url() ?>Administrator/news_search" method="post" >
                    <div class="col-lg-6 col-lg-offset-6 text-right">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Berdasarkan Judul" />
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>   
                            </div>
                        </div>  
                    </div>                          
                </form>                
            </div><br>
            <?php 
            if($total == null)
            {   ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>No records found!</strong>
                    </div>
                </div>
            </div>
            <?php
            }
            else
            {   ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Kutipan</th>                                    
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i = 0; $i < count($listdata); ++$i)
                            { ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo ($page+$i+1); ?>            
                                    </td>
                                    <td>
                                        <?php echo ucfirst($listdata[$i]->judul); ?>
                                    </td>
                                    <td>
                                        <?php echo $listdata[$i]->kutipan; ?>
                                    </td>
                                    <td class="text-center">
                                        <a target="_blank" href="<?php echo base_url().'assets/uploads/news/'.$listdata[$i]->path ?>">
                                            <img src="<?php echo base_url().'assets/uploads/news/'.$listdata[$i]->path ?>" class="img-thumbnail thumb-banner img-responsive">
                                        </a>                                    
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                        echo anchor('Administrator/edit_news/'.$listdata[$i]->id_news,'<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button>',array('onclick'=>"return confirm('Are You Sure To Edit This Data ?')"));
                                    ?>
                                    <?php
                                        echo anchor('Administrator/delete_news/'.$listdata[$i]->id_news.'/'.$listdata[$i]->path,'<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>',array('onclick'=>"return confirm('Are You Sure To Delete This Data ?')")); 
                                    ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->