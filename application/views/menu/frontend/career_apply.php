<section id="about" class="page-apply">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Curriculum Vitae</h1>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="section-heading">About Us</h2>
							<p>
							We Tritunggal Metalworks (PT Kreasi Cipta Tritunggal) is a company focused on the field of billboard construction. As for some of the products we produce in the form of billboard construction such as billboards / banners / Videotron, neon, letter sign, canopi, fence, BTS tower, the working ACP for interior and exterior. Tritunggal Metalworks itself has stood since 2004 until today. All the products we produce in our own workshop, supported by experts in the field of human resources, adequate equipment and quality control processes are trustworthy so that all the products we produce have reliable quality and competitive prices as well as affordable.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">							
					<div class="row">
						<div class="col-lg-12">
							<h2 class="section-heading">
								<strong></strong>
							</h2>
						</div>
					</div>
					<form action="<?php echo base_url() ?>Home/career_send" method="post" enctype="multipart/form-data">					
					<?php
			            if ($error == true) {
			        ?>
			            <div class="col-lg-12">
			            	<div class="alert alert-danger alert-dismissible" role="alert">
				            	<button type="button" class="close" data-dismiss="alert">
				            		<span aria-hidden="true">&times;</span>
				            	</button>
				                <strong><?=$error?></strong>
				            </div>
			            </div>		                            
			        <?php } ?>
			        <?php extract($jobs) ?>
					<?php echo validation_errors(); ?>
					<?php if(@$msg<>"") echo @$msg; ?>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nama">Nama Lengkap : </label><br>
									<input type="text" name="nama" size="40" id="nama">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="status">Status Pernikahan: </label><br>		
									<label class="radio-inline">
								    	<input type="radio" name="sts_nikah" value="0" checked="true">Single
									</label>
									<label class="radio-inline">
										<input type="radio" name="sts_nikah" value="1">Menikah
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="umur">Umur : </label><br>
									<input type="number" min="17" name="umur" id="umur" value="17">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="instansi">Nama Instansi : </label><br>
									<input type="text" name="sekolah" size="40">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="jeniskelamin">Jenis Kelamin : </label><br>
								<label class="radio-inline">
								    <input type="radio" name="gender" value="0" checked="true">Pria
								</label>
								<label class="radio-inline">
									<input type="radio" name="gender" value="1">Wanita
								</label>
								<br>
							</div>
							<div class="col-lg-6">
								<label for="jurusan">Jurusan : </label><br>
								<input type="text" name="jurusan" size="40" id="jurusan">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="alamat">Alamat : </label><br>
								<textarea name="alamat" rows="3" style="resize: vertical;" cols="40">
									
								</textarea>
							</div>
							<div class="col-lg-6"><br>
								<label for="pendidikan">Pendidikan Terakhir : </label><br>
								<select name="pend_akhir">
									<option value="SMA">SMA</option>
									<option value="D1">D1</option>
									<option value="D2">D2</option>
									<option value="D3">D3</option>
									<option value="D4">D4</option>
									<option value="S1">S1</option>
									<option value="S2">S2</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="notelp">No. Telp : </label><br>
								<input type="text" name="no_tlp" size="20" id="notelp">
							</div>
							<div class="col-lg-6">
								<label for="tahunmasuk">Tahun Masuk : </label><br>
								<input type="number" min="1990" name="thn_daftar" size="17" value="1990">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label for="email">Email : </label><br>
								<input type="email" name="email" size="40" id="email">
							</div>
							<div class="col-lg-6">
								<label for="tahunlulus">Tahun Lulus : </label><br>
								<input type="number" min="1990" name="thn_lulus" size="17" value="1990">
							</div>
						</div><br><br>
						<div class="row">
							<div class="col-lg-12">
								<h2 class="section-heading">
									<strong>Pengalaman Bekerja</strong>
								</h2>
							</div>
						</div><br>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="namaperusahaan">Nama Perusahaan Terakhir : </label><br>
									<input type="text" name="perusahaan" size="40" id="namaperusahaan">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="Tahunmulai">Tahun Mulai : </label><br>
									<input type="number" min="1990" name="thn_masuk" size="17" id="tahunmulai" value="1990">
								</div>
							</div>			
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="jabatan">Jabatan : </label><br>
									<input type="text" name="jabatan" size="40" id="jabatan">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="Tahunberakhir">Tahun Berakhir : </label><br>
									<input type="number" min="1990" name="thn_keluar" size="17" id="thnakhir" value="1990">
								</div>
							</div>
						</div>
						<div class="row">							
							<div class="col-lg-6">								
								<div class="form-group">
									<label for="alasanpindah">Alasan Pindah : </label><br>
									<textarea name="alasan" rows="3" style="resize: vertical;" cols="40">
										
									</textarea>
								</div><br>
							</div>							
						</div>
						<div class="row">
							<div class="col-lg-12">						
								<input type="file" name="cv"><br>
								<p>
									<strong>
										Upload .pdf / .zip(CV,transkrip nilai, ijasah, sertifikat, dll) 
									</strong>
								</p>
								<button type="submit" class="btn btn-primary btn-md">
									<input type="hidden" name="id" value="<?php echo $id_job; ?>">
									<input type="hidden" name="job" value="<?php echo $judul; ?>">
									Send
								</button>
								<input class="btn btn-primary btn-md" type="reset" value="Cancel">
							</div>
						</div>
					</form>					
				</div>				
			</div>		
		</div>
    </section>