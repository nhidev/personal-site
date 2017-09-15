<?php get_header(); ?>
        <div class="block-page" >
          <div class="container-medium">
			 <?php if(have_posts()): ?>
            <!-- LIST BLOG-->
            <ul class="list-unstyled list-blog">
             <?php while(have_posts()): the_post(); ?>
               <li>
                    <div class="clearfix box-blog">
                      <div class="blog-bg" data-holdbg="<?php echo (_getHinhDaiDien($post->ID) != '' ? _getHinhDaiDien($post->ID) : v5s_catch_that_image()); ?>" >&nbsp;
                      </div>
                      <div class="blog-content">
                        <h5 class="text-uppercase color-dark text-bold">
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		                         <?php the_title(); ?>
                             </a>
                         </h5>
                        <div class="post-meta font-alt">
                          <span><i class="fa fa-calendar"></i> <?php the_time('d/m/Y');?></span>
                          <span><i class="fa fa-folder-o"></i> News</span>
                        </div>
                         <?php the_excerpt(); ?>
                        <a href="<?php the_permalink() ?>" class="btn btn-xs btn-flat-solid primary-btn">Read More</a>
                      </div>
                    </div>
                  </li>
             <?php endwhile; ?>
            </ul><!-- END LIST BLOG--> 
			
            <!--Pagination-->
            <div class="text-center">
              <ul class="pagination   flat-pagination ">
                <li><a href="#">Prev</a></li>
                <li><a href="#">1</a></li>
                <li class="active"><span>2</span></li>
                <li><a href="#">3</a></li>
                <li><a href="#">Next</a></li>
              </ul>
            </div>
            <!--End Pagination-->
            	
              <?php else: ?>
               <p> Page not found </p>
              <?php endif; ?>	
          </div>
        </div>
<?php get_footer(); ?>
