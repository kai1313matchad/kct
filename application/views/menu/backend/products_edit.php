<!-- Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">Edit Project</h1>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <form action="<?php echo base_url() ?>Administrator/update_products" method="post" enctype="multipart/form-data">
              <div class="row">
                <?php if($error == true) { ?>
                  <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong><?=$error;?></strong>
                    </div>
                  </div>
                <?php } ?>
                <?php echo validation_errors(); ?>
                <?php if(@$msg<>"") echo @$msg; ?>
                <?php extract($data) ?>
              </div>
              <div class="row">
                <div class="col-lg-10 col-lg-offset-2">
                  <img src="<?php echo base_url().'assets/uploads/products/'.$path ?>" class="img-thumbnail upd-banner img-responsive">
                </div>
              </div>               
              <div class="row">              
                <div class="col-lg-2">
                  <label>Pilih Gambar</label>
                </div>
                <div class="col-lg-4">
                  <div class="input-group">
                    <label class="input-group-btn">
                      <span class="btn btn-primary">
                        Browse&hellip; <input type="file" style="display: none;" name="img" multiple>
                      </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">                        
                <div class="col-lg-8 col-lg-offset-2">
                  <label>Ukuran Gambar Optimal: 900px X 600px, </label>
                  <label style="color:red ;">Maksimal Ukuran 3MB</label>
                </div>
              </div>
              <div class="row" style="margin-bottom: 5px;">
                <div class="col-lg-2">
                  <label>Nama Project</label>
                </div>
                <div class="col-lg-4">
                  <div class="input-group">
                    <span class="input-group-addon" type="button">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </span>
                    <input id="nama" type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" />
                  </div>
                </div>
                <div class="col-lg-2">
                  <label>Nama Klien</label>
                </div>
                <div class="col-lg-4">
                  <div class="input-group">
                    <span class="input-group-addon" type="button">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </span>
                    <input id="klien" type="text" class="form-control" name="klien" value="<?php echo $klien; ?>" />
                  </div>
                </div>
              </div>
              <div class="row" style="margin-bottom: 5px;">
                <div class="col-lg-2">
                  <label>Kategori Project</label>
                </div>
                <div class="col-lg-4">
                  <select name="ktg" id="kategori" class="form-control input-md select2">
                    <option value="Billboard" <?php if ($kategori == "Billboard") { echo 'selected'; } ?>>Billboard</option>
                    <option value="Canopy" <?php if ($kategori == "Canopy") { echo 'selected'; } ?>>Canopy</option>
                    <option value="Fascia" <?php if ($kategori == "Fascia") { echo 'selected'; } ?>>Fascia</option>
                    <option value="LetterSign" <?php if ($kategori == "LetterSign") { echo 'selected'; } ?>>Letter Sign</option>
                    <option value="Signage" <?php if ($kategori == "Signage") { echo 'selected'; } ?>>Signage</option>
                    <option value="Container" <?php if ($kategori == "Container") { echo 'selected'; } ?>>Container</option>
                  </select>
                </div>
                <div class="col-lg-2">
                  <label>Lokasi Project</label>
                </div>
                <div class="col-lg-4">
                  <div class="input-group">
                    <span class="input-group-addon" type="button">
                      <i class="glyphicon glyphicon-pencil"></i>
                    </span>
                    <input id="lokasi" type="text" class="form-control" name="lokasi" value="<?php echo $lokasi; ?>" />
                  </div>
                </div>
              </div>
              <div class="row" style="margin-bottom: 5px;">
                <div class="col-lg-2">
                  <label>Tanggal</label>
                </div>
                <div class='col-lg-4'>
                  <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>     
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                      <input type='text' class="form-control" name="tgl" value="<?php echo $tanggal ?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <label>Caption</label>
                </div>
                <div class="col-lg-10">
                  <div class="form-group">
                    <textarea id="caption" name="caption" class="form-control" rows="5" style="resize: vertical;"  >
                      <?php echo $caption; ?>
                    </textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-lg-offset-8 text-right">
                  <input type="hidden" name="id" value="<?php echo $id_product; ?>">
                  <input type="hidden" name="path" value="<?php echo $path; ?>">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a href="<?php echo base_url() ?>Administrator/edit_products/<?php echo $id_product?>" class="btn btn-default" type="submit">Batal</a>
                </div>
              </div><br>
            </form>
          </div>
        </div>
      </div>

    <!-- tinymceplug -->
    <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/plugins/wordcount/plugin.js"></script>
    <script src="<?php echo base_url() ?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
    <!-- /tinymceplug -->
    <!-- datetime -->
    <script src="<?php echo base_url() ?>assets/js/moment.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <!-- /datetime -->
    <script type="text/javascript">
      // We can attach the `fileselect` event to all file inputs on the page
      $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
      });
      // We can watch for our custom `fileselect` event like this
      $(document).ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {
          var input = $(this).parents('.input-group').find(':text'),
          log = numFiles > 1 ? numFiles + ' files selected' : label;
          if( input.length ) {
            input.val(log);
          } 
          else {
            if( log ) alert(log);
          }
        });
      });
      $(function () {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD'
        });         
      });

      tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
          "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker toc",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "save table contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern codesample"
        ],
        external_plugins: {
          //"moxiemanager": "/moxiemanager-php/plugin.js"
        },
        content_css: "css/development.css",
        add_unload_trigger: false,
        toolbar: "insertfile undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons table codesample",
        image_advtab: true,
        image_caption: true,
        style_formats: [
          {title: 'Bold text', format: 'h1'},
          {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
          {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
          {title: 'Example 1', inline: 'span', classes: 'example1'},
          {title: 'Example 2', inline: 'span', classes: 'example2'},
          {title: 'Table styles'},
          {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        template_replace_values : {
          username : "Jack Black"
        },
        template_preview_replace_values : {
          username : "Preview user name"
        },
        link_class_list: [
          {title: 'Example 1', value: 'example1'},
          {title: 'Example 2', value: 'example2'}
        ],
        image_class_list: [
          {title: 'Example 1', value: 'example1'},
          {title: 'Example 2', value: 'example2'}
        ],
        templates: [
          {title: 'Some title 1', description: 'Some desc 1', content: '<strong class="red">My content: {$username}</strong>'},
          {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
        ],
        setup: function(ed) {
          /*ed.on(
            'Init PreInit PostRender PreProcess PostProcess BeforeExecCommand ExecCommand Activate Deactivate ' +
            'NodeChange SetAttrib Load Save BeforeSetContent SetContent BeforeGetContent GetContent Remove Show Hide' +
            'Change Undo Redo AddUndo BeforeAddUndo', function(e) {
            console.log(e.type, e);
          });*/
        },
        spellchecker_callback: function(method, data, success) {
          if (method == "spellcheck") {
            var words = data.match(this.getWordCharPattern());
            var suggestions = {};
            for (var i = 0; i < words.length; i++) {
              suggestions[words[i]] = ["First", "second"];
            }
            success({words: suggestions, dictionary: true});
          }
          if (method == "addToDictionary") {
            success();
          }
        }
      });
      if (!window.console) {
        window.console = {
          log: function() {
            tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);
          }
        };
      }
    </script>