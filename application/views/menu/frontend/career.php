<!-- Page Section -->
    <section id="about" class="page-section">
        <div class="container">
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
                    <div class="col-lg-12">
						<h1>Find Your Purpose Join Us</h1>
						<h2 class="section-heading">We're Hiring!!!</h2><br><br>
						<?php for($i=0 ; $i<count($listdata) ; $i++) { ?>
						<div class="row">
							<div class="col-xs-2">
								<label class="control-label" style="font-size: 22px;">Position</label>
							</div>
							<div class="col-xs-6">
								<label class="control-label" style="font-size: 22px;"><?= $listdata[$i]->judul; ?></label>
							</div>
							<div class="col-xs-4 text-right">
								<span style="font-size: 22px;">
									<a href="<?php echo base_url() ?>Home/career_details/<?php echo $listdata[$i]->id_job ?>">
										See more Details>>>
									</a>
								</span>
							</div>
						</div>
						<?php } ?>
						<div class="text-center">
                			<?= $pagination; ?>
            			</div>					
					</div>
				</div>
			</div>
		</div>
	</section>