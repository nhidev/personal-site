<?php get_header(); ?>
<!-- Error Start -->
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="error">
				<img src="<?=get_bloginfo("template_directory")?>/images/error.png" class="img-responsive" alt="image">
				<br>
				<a class="btn-light button-black" href="<?php bloginfo('home')?>">Go back to home page</a>
			</div>
		</div>
	</div>
</div>
<!-- Error End -->		 
<?php get_footer(); ?>