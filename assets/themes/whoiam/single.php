<?php get_header();?>
<div class="block-page" >
  <div class="container-medium">
    <div class="row">
      <div class="col-md-12">
        <div class="blog-content"> 
          <h5 class="text-uppercase color-dark text-bold "><a href="<?php the_permalink() ?>" title=" <?php the_title(); ?>">
            <?php the_title(); ?>
            </a></h5>
          <div class="white-space-20"></div>
          <div class="post-meta font-alt"> 
          <span><i class="fa fa-calendar"></i> <?php the_time('d/m/Y');?></span>
          <span><i class="fa fa-folder-o"></i> News</span>
          </div>
          <?php while(have_posts()): the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile; ?>
        </div>
        <div class="white-space-30"></div>
      </div>
    </div>
  </div>
</div>
<?php get_footer();?>
