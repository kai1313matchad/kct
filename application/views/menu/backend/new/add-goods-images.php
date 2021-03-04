<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'application/views/layout/backend/head-new.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" />
    <style>
      .w-1 {
        width: 8.333333%;
      }
      .w-2 {
        width: 16.666667%;
      }
      .w-15 {
        width: 12.5% !important;
      }
      .w-3 {
        width: 25%;
      }
      .w-5 {
        width: 41.666667%;
      }
      .w-6 {
        width: 50%;
      }
    </style>
	</head>
	<body id="page-top">
  	<!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
			<?php include 'application/views/layout/backend/sidebar.php'; ?>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          	<!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            	<i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <?php include 'application/views/layout/backend/topbar.php'; ?>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Gambar Barang</h1>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Gambar Barang</h6>
              </div>
              <div class="card-body">
                <div class="offset-md-2 col-md-8">
                  <?php if(isset($error)) { echo $error; }?>
                  <?php echo validation_errors(); ?>
                  <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ids" value="<?= $goods["itemId"];?>">
                    <div class="dropzone"><h3 class="dz-message">Klik atau Drop Gambar Disini</h3></div>
                    <div class="form-group mt-2">
                      <a href="<?= base_url()?>admin/manage-goods" class="btn btn-md btn-success"><i class="fas fa-fw fa-save"></i> Simpan</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <?php include 'application/views/layout/backend/footer-new.php'; ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php include 'application/views/layout/backend/jspack.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.js" integrity="sha512-/diY7kiMCU8WBbgrhBMJjMDtrsJGPP2LQG4gaw9tHRYlQ50sJLhAQZH/MSpEPdQHcY0YXYfsosyjMArCDTa3SA==" crossorigin="anonymous"></script>
    <script>
      Dropzone.autoDiscover = false;
      var uploadImg= new Dropzone(".dropzone",{
        url: '<?= base_url() ?>Administrator/addingGoodsImages',
        maxFilesize: 2,
        method:"POST",
        acceptedFiles:"image/jpeg, image/png, image/jpg",
        paramName:"imgFile",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
      })

      //Event ketika Memulai mengupload
      uploadImg.on("sending",function(a,b,c){
        a.token = Math.random();
        ids = $('[name="ids"]').val()
        c.append("token",a.token);
        c.append("ids",ids);
      })

      //Event ketika foto dihapus
      uploadImg.on("removedfile",function(a){
        token = a.token;
        ids = $('[name="ids"]').val()
        $.ajax({
          type:"POST",
          data:{token:token, ids:ids},
          url:"<?php echo base_url('Administrator/removeGoodsImages') ?>",
          cache:false,
          dataType: 'JSON',
          success: function(data){
            console.log(data);
          },
          error: function(){
            console.log(data);
          }
        })
      })
    </script>

	</body>

</html>