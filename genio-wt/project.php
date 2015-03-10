<?php
/**
 * The template for displaying project items
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * 
 * @package genio-wt
 */

global $Genio_Wt_Core, $genio_project;
?>

<?php
	// this action used to get
	// featured content out of the main post
	// and show like a video , gallery
	do_action( 'genio_featured_content', array( 'project', get_the_ID(), get_the_content()) );
?>

<div class="row project-details">

	<?php if( !(empty($genio_project['client'])) || !(empty($genio_project['role'])) || !(empty($genio_project['date'])) || !(empty($genio_project['link_text'])) || !(empty($genio_project['link'])) ){ ?>
	<div class="col-md-8 wow fadeInLeft">
		<div class="typeset">
		<?php the_content(); ?>
		</div>
	</div>

	<div class="col-md-3 col-md-push-1 project-info wow fadeInRight">
							
		<h5 class="bold text-capitalize"><?php _e('Project Info', 'genio_wt_lang'); ?></h5>

		<ul class="list-unstyled">
			<?php if( !empty($genio_project['client']) ){ ?>
				<li>
					<b><?php _e('Company','genio_wt_lang'); ?></b> : <?php echo $genio_project['client']; ?>
				</li>
			<?php } ?>
			<?php if( !empty($genio_project['date']) ){ ?>
				<li>
					<b><?php _e('Date','genio_wt_lang'); ?></b> : <?php echo $genio_project['date']; ?>
				</li>
			<?php } ?>
			<?php if( !empty($genio_project['role']) ){ ?>
				<li>
					<b><?php _e('Role','genio_wt_lang'); ?></b> : <?php echo $genio_project['role']; ?>
				</li>
			<?php } ?>
		</ul>

		<?php if( !(empty($genio_project['link_text'])) && !(empty($genio_project['link'])) ){ ?>
		<div class="lg-padder">
			<a target="_blank" href="<?php echo esc_url($genio_project['link']); ?>" class="btn btn--main-color"><?php echo $genio_project['link_text']; ?></a>
		</div>
		<?php } ?>
	</div>
	<?php }else{ ?>
		<div class="col-md-12 wow fadeInLeft">
			<div class="typeset">
			<?php the_content(); ?>
			</div>
		</div>
	<?php } ?>
</div>