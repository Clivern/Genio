<?php
/**
 * The template used for displaying testimonials section in front page
 *
 * @package genio-wt
 */

global $Genio_Wt_Core;

$genio_testimonials = $Genio_Wt_Core->getTestimonials();
?>
		<section id="testimonials" class="secondary-block bg-image sec__testimonials-bg" data-stellar-background-ratio="0.5">
	
			<!-- #OVERLAY -->
			<div class="overlay pattern-overlay"></div>

			<div class="container text-center">
				
				<!-- #TESTIMONIAL HEADER -->
				<div class="list-gutter-md testimonial-header">
					<a href="#" class="inline-block sm-rounded-box quote-rotator-prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<span class="inline-block rounded-box h3">
						<i class="fa fa-quote-left"></i>
					</span>
					<a href="#" class="inline-block sm-rounded-box quote-rotator-next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

				<!-- #TESTIMONIALS -->
				<?php if( count($genio_testimonials) >= 1 ){ ?>
				<div class="col-md-8 col-md-push-2 secondary-block__sub-padder">
					<!-- QUOTES -->
					<div class="quotes">
						<!-- ITEM -->
           					<?php foreach ($genio_testimonials as $genio_testimonial ) { ?>
						<div class="quote">
							<?php if( !empty($genio_testimonial['main']) ){ ?>
							<p class="h5 light"><?php echo $genio_testimonial['main']; ?></p>
							<?php } ?>
							<div class="lg-padder inline-block text-left list-gutter-sm">
								<?php if( !empty($genio_testimonial['photo']) ){ ?>
								<div class="md-rounded-box inline-block v-middle">
									<img src="<?php echo esc_url($genio_testimonial['photo']); ?>" alt="#" class="img-responsive">
								</div>
								<?php } ?>
								<?php if( !(empty($genio_testimonial['name'])) || !(empty($genio_testimonial['job'])) || !(empty($genio_testimonial['company']))  ){ ?>
								<div class="inline-block v-middle">
									<?php if( !empty($genio_testimonial['name']) ){ ?>
										<h6 class="semi-bold"><?php echo $genio_testimonial['name']; ?></h6>
									<?php } ?>
									<?php if( !(empty($genio_testimonial['job'])) || !(empty($genio_testimonial['company'])) ){ ?>
										<span class="light inline-block xs-padder testimonial-job"><?php if(!empty($genio_testimonial['job'])){ echo $genio_testimonial['job']; } ?><?php if(!empty($genio_testimonial['company'])){ echo ' - ' . $genio_testimonial['company']; } ?></span>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</section>