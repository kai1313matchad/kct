<!-- Page Section -->
    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<h1>News</h1><br><br>
                </div>
            </div>
            <?php
            for($i=0 ; $i<count($listdata) ; $i++)
            { ?>
				<div class="row">
					<div class="col-lg-4">
						<img src="<?php echo base_url() ?>assets/uploads/news/<?php echo $listdata[$i]->path ?>" class="img-responsive" >
					</div>
					<div class="col-lg-8">
						<a href="<?php echo base_url() ?>Home/news_detail/<?php echo $listdata[$i]->id_news  ?>">
							<h3><?php echo $listdata[$i]->judul  ?></h3>
						</a>
						<p>
							<?php echo $listdata[$i]->kutipan  ?>
						</p>
					</div>
				</div><br>
			<?php
            }
            ?>
            <div class="text-center">
                <?php echo $pagination; ?>
            </div>            
        </div>
    </section>