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
            <h1 class="h3 mb-4 text-gray-800">Manage Categories</h1>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
              </div>
              <div class="card-body">
                <div class="row mb-2">
                  <div class="offset-8 col-4 text-right">
                    <a href="<?= base_url()?>admin/add-category" class="btn btn-success"><i class="fas fa-fw fa-plus-circle"></i> Tambah</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered" id="list" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th class="w-1">#</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th class="w-1">Actions</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                    <tbody></tbody>
                  </table>
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
            "url": "<?php echo site_url('Administrator/categoryList')?>",
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