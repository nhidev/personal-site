<?php get_header(); ?>
		<!-- projects-page section 
		================================================== -->
		<section class="projects-section projects-page-section">
			<div class="container">
				<div class="title-section alt-title">
					<div class="row">
						<div class="col-md-5">
							<h1>Latest Project</h1>
						</div>
					</div>
				</div>
				<div class="project-box iso-call col3">
					<?php
					$countPost = 1;
					while (have_posts()): 
						the_post();                                
					?>	
					<div class="project-post <?php echo $term->slug; ?> default-size">
						<a href="<?php the_permalink() ?>" class="item-image">
							<img src="<?php echo (_getHinhDaiDien($post->ID) != '' ? _getHinhDaiDien($post->ID) : v5s_catch_that_image()); ?>" alt="">
						</a>
						<h2><a href="<?php the_permalink() ?>"> <?php echo wp_trim_words( get_the_title() , 7,"..."); ?></a></h2>
					</div>
					<?php
					$countPost++;
					endwhile; 
					?>       
				</div>
			</div>
		</section>
		<!-- End projects-page section -->
		<?php get_footer(); ?>