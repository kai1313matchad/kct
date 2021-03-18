<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include 'application/views/layout/backend/head-new.php'; ?>
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
            <h1 class="h3 mb-4 text-gray-800">Tambah Artikel</h1>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Artikel</h6>
              </div>
              <div class="card-body">
                <div class="offset-md-2 col-md-8">
                  <?php if(isset($error)) { echo $error; }?>
                  <?php echo validation_errors(); ?>
                  <form action="<?= base_url()?>Administrator/saveArticle" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judulArticle" class="form-control" placeholder="Judul artikel">
                    </div>
                    <div class="form-group">
                      <label>Isi</label>
                      <textarea name="isiArticle" class="form-control textarea"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Thumbnail</label>
                      <input type="file" name="fileArticle" class="form-control" placeholder="File">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-md btn-success"><i class="fas fa-fw fa-save"></i> Simpan</button>
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
        <?php include 'application/views/layout/backend/footer.php'; ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <?php include 'application/views/layout/backend/jspack.php'; ?>
    <script>
      $(function () {
        //Init TextArea
        $('.textarea').summernote({
          height: 200
        })
      })
    </script>

	</body>

</html>