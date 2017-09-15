<?php get_header(); ?>
<section id="news-section" class="p-t-50 p-b-100">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <div class="row">
          <h3><i class="fa fa-search"></i> 
            <?php _e('Kết quả tìm kiếm từ khóa'); ?> "<?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<strong>'); echo $key; _e('</strong>'); wp_reset_query(); ?>"</h3>   
            <?php if(have_posts()): ?>
              <div class="blog-box p-t-50">
                <?php while(have_posts()): the_post(); ?>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="latest_page_box">
                    <div class="news_image">
                      <a  href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="hover-img"> 
                        <img  src="<?php echo (_getHinhDaiDien($post->ID) != '' ? _getHinhDaiDien($post->ID) : v5s_catch_that_image()); ?>" class="img-responsive img-hover"  alt="<?php the_title(); ?>"  />
                      </a>
                    </div>
                    <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
                    <div class="m-b-30"> <?php the_excerpt(); ?></div>
                  </div>
                </div>
              <?php endwhile; ?>
              <?php emm_paginate(); ?>
            </div>
          <?php else: ?>
            <div class="blog-box"> Trang bạn đang truy cập hiện không có, vui lòng quay lại dau </div>
          <?php endif; ?>
        </div>
      </div>
      <?php get_sidebar();?>
    </div>
  </div>
</div>
</section>


<?php get_footer(); ?>