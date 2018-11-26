<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Pelamar</h1>
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
                <form action="<?php echo base_url() ?>Administrator/applicant_search" method="post" >
                    <div class="col-lg-6 col-lg-offset-6 text-right">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Berdasarkan Nama" />
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Lowongan</th>
                                    <th class="text-center">Umur</th>
                                    <th class="text-center">Pendidikan</th>
                                    <th class="text-center">Asal Instansi</th>
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
                                    <td class="text-center">
                                        <?php echo ucfirst($listdata[$i]->nama); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ucfirst($listdata[$i]->judul_job); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ucfirst($listdata[$i]->umur); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ucfirst($listdata[$i]->pend_akhir); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo ucfirst($listdata[$i]->sekolah); ?>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning tombol" 
                                            data-toggle="modal"
                                            data-target="#viewApplicant"
                                            data-id="<?php echo $listdata[$i]->id_applicant?>"
                                            data-job="<?php echo $listdata[$i]->judul_job?>"
                                            data-nama="<?php echo $listdata[$i]->nama?>"
                                            data-stsnikah="<?php echo $listdata[$i]->sts_nikah?>"
                                            data-umur="<?php echo $listdata[$i]->umur?>"
                                            data-gender="<?php echo $listdata[$i]->gender?>"
                                            data-instansi="<?php echo $listdata[$i]->sekolah?>"
                                            data-jurusan="<?php echo $listdata[$i]->jurusan?>"
                                            data-alamat="<?php echo $listdata[$i]->alamat?>"
                                            data-notlp="<?php echo $listdata[$i]->no_tlp?>"
                                            data-email="<?php echo $listdata[$i]->email?>"
                                            data-pend="<?php echo $listdata[$i]->pend_akhir?>"
                                            data-thnmasuk="<?php echo $listdata[$i]->thn_daftar?>"
                                            data-thnlulus="<?php echo $listdata[$i]->thn_lulus?>"
                                            data-perusahaan="<?php echo $listdata[$i]->instansi?>"
                                            data-thnmskkrj="<?php echo $listdata[$i]->thn_masuk?>"
                                            data-thnkeluar="<?php echo $listdata[$i]->thn_keluar?>"
                                            data-alasan="<?php echo $listdata[$i]->alasan?>"
                                            data-path="<?php echo $listdata[$i]->path_cv?>"
                                            data-baseurl="<?php echo base_url()?>"
                                        >
                                            <i class="fa fa-fw fa-search"></i>
                                        </button>
                                        <a href="<?php echo base_url()?>Administrator/download_file/<?php echo $listdata[$i]->path_cv ?>" type="button" class="btn btn-success tombol" >
                                            <i class="fa fa-fw fa-download"></i>
                                        </a>
                                        <a href="<?php echo base_url()?>Administrator/delete_applicant/<?php echo $listdata[$i]->id_applicant?>/<?php echo $listdata[$i]->path_cv ?>" type="button" class="btn btn-danger tombol" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
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
    <!-- Modals -->
    <div class="modal fade" id="viewApplicant" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center">
                        <strong>Data Pelamar</strong>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <label>Data Diri Pelamar</label>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Nama</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="nm-apply"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Status</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="stsnikah"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Umur</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="umur"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Gender</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="gender"></div>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Alamat</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="alamat"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>No Tlp/Hp</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="notlp"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Email</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="email"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Instansi</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="instansi"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Jurusan</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="jurusan"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Pendidikan</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="pend"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Masuk</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="thnmasuk"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Lulus</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="thnlulus"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <label>Pengalaman Pelamar</label>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Perusahaan</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="perusahaan"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Masuk</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="thnmskkrj"></div>
                        </div>
                        <div class="col-lg-2">
                            <label>Keluar</label>
                        </div>
                        <div class="col-lg-4">
                            <div class="thnkeluar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label>Alasan Keluar</label>
                        </div>
                        <div class="col-lg-10">
                            <div class="alasan"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    // button for modal
    $(document).on("click",'.tombol',function(e)
    {
        var id = $(this).data('id');
        var job = $(this).data('job');
        var nama = $(this).data('nama');
        var stsnikah = $(this).data('stsnikah');
        if(stsnikah == '0')
        {
            stsnikah = 'Single';
        }
        else
        {
            stsnikah = 'Menikah';
        }
        var umur = $(this).data('umur');
        var gender = $(this).data('gender');
        if(gender == '0')
        {
            gender = 'Pria';
        }
        else
        {
            gender = 'Wanita';
        }
        var instansi = $(this).data('instansi');
        var jurusan = $(this).data('jurusan');
        var alamat = $(this).data('alamat');
        var notlp = $(this).data('notlp');
        var email = $(this).data('email');
        var pend = $(this).data('pend');
        var thnmasuk = $(this).data('thnmasuk');
        var thnlulus = $(this).data('thnlulus');
        var perusahaan = $(this).data('perusahaan');
        var thnmskkrj = $(this).data('thnmskkrj');
        var thnkeluar = $(this).data('thnkeluar');
        var alasan = $(this).data('alasan');
        var path = $(this).data('path');
        var baseurl = $(this).data('baseurl');
        $(".id").val(id);
        $(".job").text(job);
        $(".nm-apply").text(nama);
        $(".stsnikah").text(stsnikah);
        $(".umur").text(umur);
        $(".gender").text(gender);
        $(".instansi").text(instansi);
        $(".jurusan").text(jurusan);
        $(".alamat").text(alamat);
        $(".notlp").text(notlp);
        $(".email").text(email);
        $(".pend").text(pend);
        $(".thnmasuk").text(thnmasuk);
        $(".thnlulus").text(thnlulus);
        $(".perusahaan").text(perusahaan);
        $(".thnmskkrj").text(thnmskkrj);
        $(".thnkeluar").text(thnkeluar);
        $(".alasan").text(alasan);
        $(".path").text(path);
    });
    </script>