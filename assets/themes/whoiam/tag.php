<?php
get_header();
?>
<div class="col-lg-8 col-md-8">
	<div class="content_bottom_left">
		<div id="cat_description">
			<div class="single_category wow fadeInDown">
				<?php 
				if(is_category()) {
					$category = get_category(get_query_var('cat'));
					$cat_id = $category->cat_ID;
		 //echo $cat_id;exit;
				}
				?>
				<h1>Tags: <?php single_cat_title(''); ?></h1>
				<p><?php echo category_description(); ?></p>
				<div class="archive_style_1">	
					<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
							<div class="business_category_left wow fadeInDown">
								<ul class="fashion_catgnav">
									<li>
										<div class="catgimg2_container">
											<a href="<?php the_permalink() ?>"><img  class="img-responsive img-hover" src="<?php echo v5s_catch_that_image(); ?>"   alt="<?php the_title(); ?>"  /></a>
										</div>
										<h2 class="catg_titile"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
										<div class="comments_box">
											<span class="meta_date"><?php echo get_the_date("d-m-Y"); ?></span>
											<span class="meta_comment"><a href="#">No Comments</a></span>
											<span class="meta_more"><a  href="<?php the_permalink() ?>">Xem thêm...</a></span>
										</div>
										<p> <?php new_excerpt_more(the_excerpt()); ?></p>
									</li>
								</ul>
							</div>  
						<?php endwhile; ?>
						<?php emm_paginate(); ?>
					<?php else: ?>
						<div id="nonepost">
							Trang bạn đang truy cập hiện không có, vui lòng quay lại dau
						</div><!--#nonepost-->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div><!--#mainleft-->
</div><!-- end .main -->
<?php get_sidebar();?> 
<?php
get_footer();
?>