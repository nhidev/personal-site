<?php get_header(); ?>
<!-- Content Row -->
<!-- Content Column -->
<div class="col-xs-12 col-md-9">
	<?php
	global $query_string;
	query_posts( $query_string . '&post_type=san-pham&orderby=menu_order&order=ASC' );
	?>
	<h1><i class="fa fa-search"></i> <?php _e('Kết quả tìm kiếm từ khóa'); ?> "<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?>"</h1>   
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<?php 
				$hinhanh = get_field('hinhanh1');
				if(!empty($hinhanh)):
				$url = $hinhanh['url'];
				$title = $hinhanh['title'];
				$alt = $hinhanh['alt'];
				$caption = $hinhanh['caption'];
				$imgsrc = $hinhanh['sizes']['thumbnail'];
				?>
				<a href="<?php echo $imgsrc; ?>" title="<?php echo $title; ?>">
					<img src="<?php echo $imgsrc; ?>" alt="<?php echo $alt; ?>" alt="<?php echo $alt ?>"  /> </a>
				<?php endif;?>
			</div>
			<div class="col-xs-12 col-md-8 ">
				<a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a> 
				<div class="cbp-vm-price">
					<?php
					if(get_field('dongia') != '' && get_field('dongia') != 0){
						if(get_field('giamgia') != '' && get_field('giamgia') != 0)
						{		
							echo format_price((int)get_field('dongia') -(int)get_field('giamgia'),0);  
						}else{
							echo format_price((int)get_field('dongia'),0);
						}
					}
					else echo 'Liên hệ';
					?>	
				</div>
			</div>
		</div> <hr/>
	<?php endwhile; ?>
<?php else : ?>
	<p class="jk_err">Không tìm thấy đường dẫn này</p>
	<p>Trở về trang chủ <a href="<? bloginfo('url'); ?>"><? bloginfo('url'); ?></a></p>
<?php endif; ?>
<div class="emm-paginate"><?php if (function_exists("emm_paginate")) {
	emm_paginate();
} ?>
</div>
</div> <!--End col-xs-12 col-md-9-->
<?php get_sidebar();?> 
<!--End related product-->
<?php get_footer(); ?>