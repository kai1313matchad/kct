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
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Alerts -->
              <li class="nav-item dropdown no-arrow mx-1">
              	<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	<i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                	<span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                  	Alerts Center
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                  	<div class="mr-3">
                    	<div class="icon-circle bg-primary">
                      	<i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                  	<div>
                    	<div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                  </a>
                </div>
              </li>

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
              	<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	<i class="fas fa-envelope fa-fw"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter">7</span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                	<h6 class="dropdown-header">
                  	Message Center
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                  	<div class="dropdown-list-image mr-3">
                    	<img class="rounded-circle" src="img/undraw_profile_1.svg" alt="">
                    	<div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                    	<div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    	<div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                  </a>
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
              	<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	<span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                	<a class="dropdown-item" href="#">
                  	<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="#">
                  	<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  	<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Tambah Kategori</h1>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
              </div>
              <div class="card-body">
                <div class="offset-md-4 col-md-4">
                  <?php if(isset($error)) { echo $error; }?>
                  <?php echo validation_errors(); ?>
                  <form action="<?= base_url()?>Administrator/saveCategory" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" name="ctgName" class="form-control" placeholder="Nama kategori">
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
        dtbSearchList()
      })

      function dtbSearchList() {
        table = $('#list').DataTable({ 
          "info": false,
          "destroy": true,
          "responsive": true,
          "autoWidth": false,
          "processing": true,
          "serverSide": true,
          "order": [],
          "ajax": {
            "url": "<?php echo site_url('Administrator/bannerList')?>",
            "type": "POST",                
          },
          "columnDefs": [ { 
              "targets": [ 0 ],
              "orderable": false,
            },
            {
              "className": "text-center", "targets": ['_all']
            }
          ],
        })
      }
    </script>

	</body>

</html>