<!-- Page Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Interior-Fascia Production</h1><br><br>
				</div>
			</div>
            <div class="row">
				<?php
           		for($i=0 ; $i<count($listdata) ; $i++)
				{ ?>
				<div class="col-lg-4">
					<div class="thumbnail">
						<a href="<?php echo base_url() ?>assets/uploads/products/<?php echo $listdata[$i]->path ?>" target="_blank">
							<img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $listdata[$i]->path ?>" alt="" style="width:100%">
						</a>
						<div class="caption">
							<div class="text-center"><?php echo $listdata[$i]->nama ?></div>
							<br>
							<p class="text-justify">
								<?php echo $listdata[$i]->caption ?>
							</p>
						</div>
					</div>
				</div>
			<?php
				}
           	?>
           	</div>
           	<div class="row text-center">
            	<?php echo $pagination; ?>
            </div>
		</div>
    </section>
    <section class="sect-footer">
        <img src="<?php echo base_url() ?>assets/img/9.png">
    </section>