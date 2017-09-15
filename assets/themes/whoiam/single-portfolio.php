<?php get_header();?>
<!-- Project Details Start -->
<?php while(have_posts()): the_post(); ?>
    <section id="project_details" class="p-t-60 p-b-100">
        <div class="container">
            <div class="row p-b-60">
                <div class="col-md-12">
                    <div class="heading">
                        <h2> <?php the_title(); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="project_details_text">
                        <?php echo improved_trim_excerpt($text); ?>
                    </div>
                    
                    <div class="project_des">
                        <table class="table table-striped table-responsive">
                            <tbody>
                                <?php if (get_field('chudautu') !='') {?>
                                <tr>
                                    <td><b><?php _e("[:vi]Nhà thầu[:en]Client")?></b></td>
                                    <td class="text-right"><?php echo get_field('chudautu')?></td>
                                </tr>
                                <?php }?>
                                <?php if (get_field('thoigian') !='') {?>
                                <tr>
                                    <td><b><?php _e("[:vi]Thời gian[:en]Construction date")?></b></td>
                                    <td class="text-right"><?php echo get_field('thoigian')?></td>
                                </tr>
                                <?php }?>
                                <?php if (get_field('diadiem') !='') { ?>
                                <tr>
                                    <td><b><?php _e("[:vi]Địa điểm[:en]Location")?>:</b></td>
                                    <td class="text-right"> <?php echo get_field('diadiem')?></td>
                                </tr>
                                <?php }?>
                                <?php if (get_field('chiphi') !='') {?>
                                <tr>
                                    <td><b><?php _e("[:vi]Vốn đầu tư[:en]Value")?></b></td>
                                    <td class="text-right"><?php echo get_field('chiphi')?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="previous-next-links">
                        <div class="col-md-6"><h3><i class="fa fa-long-arrow-left"></i></h3><?php previous_post_link( '%link', 'Previous' ) ?></div>
                        <div class="col-md-6 text-right"><h3><i class="fa fa-long-arrow-right"></i></h3><?php next_post_link( '%link', 'Next' ) ?></div>
                    </div> 
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="about_slider" class="owl-carousel">
                       <?php 
                       for($i=0; $i<=6; $i++): 
                          $hinhanh = get_field('hinhanh'.$i);
                      if(!empty($hinhanh)):
                         $url = $hinhanh['url'];
                     $title = $hinhanh['title'];
                     $alt = $hinhanh['alt'];
                     $caption = $hinhanh['caption'];
                     $imgsrc = $hinhanh['sizes']['large'];
                     ?>					 
                     <div class="item">
                        <div class="content-right-md">
                            <figure class="effect-layla"> 
                                <img src="<?php echo $imgsrc; ?>" alt="img" >
                                <figcaption> </figcaption>
                            </figure>
                        </div>
                    </div>
                <?php  endif; endfor; ?>
            </div>
        </div>
    </div>
</div>
</section>
<?php endwhile; ?>
<!-- Project Details End -->
<?php get_footer();?>
