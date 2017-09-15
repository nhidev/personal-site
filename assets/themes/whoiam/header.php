<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php wp_title(''); ?>
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="<?=get_bloginfo("template_directory")?>/images/favicon.ico" />
    <link rel="SHORTCUT ICON" href="<?=get_bloginfo("template_directory")?>/images/favicon.ico" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="1 day" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    
    <!--pace (page loader) style-->
    <link href="<?php bloginfo('template_directory'); ?>/css/pace.css" rel="stylesheet">
    <script src="<?php bloginfo('template_directory'); ?>/js/pace.min.js"></script>

    <?php wp_head(); ?>
</head>
<?php if(is_home() || is_front_page()){ ?>
<body  data-spy="scroll" data-target=".menu-area" data-offset="200">
<?php }else{ ?>
<body>
<?php } ?>
 <!--wrapper page-->
    <div class="wrapper">
    <!-- Main Header -->
<?php if(is_home() || is_front_page()){ ?>
      <header class="main-header" id="home">
<?php }else{ ?>
      <header class="main-header no-window" id="home">
<?php } ?>

        <div class="content-table header-content-fixed ">
          
          <div class="v-content">
            <div class="container">
              <h1 class="text-uppercase color-dark name">i’m Nhi Thai</h1>
              <h4  class="text-uppercase color-dark font-alt job"><span id="typed" class="typed"></span></h4>
            </div>
          </div>
        </div>


        <!-- Main navbar -->
        <div class="menu-area">
          <div class="toogle-bars">
            <a href="#menu-collapse" data-toggle="collapse" class="collapsed"><i class="fa fa-bars ic-open"></i> <i class="fa fa-remove ic-close"></i> MENU</a>
          </div>
          <div class="menu-collapse collapse" id="menu-collapse">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <ul class="breadcrumb main-nav no-space">
                    <li class="link-inpage"><a href="#contact" id="hireme-tab" class="link-inpage"><i class="fa fa-briefcase"></i> Hire Me Now</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul class="breadcrumb main-nav nav">
                    <li class="active"><a href="<?php bloginfo('home')?>#home" class="link-inpage">Home</a></li>
                    <li ><a href="<?php bloginfo('home')?>#about" class="link-inpage">About</a></li>
                    <li ><a href="<?php bloginfo('home')?>#resume" class="link-inpage">Resume</a></li>
                    <li ><a href="<?php bloginfo('home')?>#portfolio" class="link-inpage">Portfolio</a></li>
                    <li ><a href="<?php bloginfo('home')?>#contact" id="contact-tab" class="link-inpage">Contact</a></li>
                  </ul>
                </div>
                <div class="col-md-3">
                  <ul class="breadcrumb main-nav no-space">
                    <li>
                      <a href="https://www.facebook.com/nhithai1905" ><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="https://www.linkedin.com/in/nhi-thai-b69b7535/" ><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                      <a href="https://github.com/nhidev" ><i class="fa fa-github"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Main navbar -->
      </header><!-- End Main Header -->

<?php if(!is_home() || !is_front_page()){ ?>
      <section id="blog" class="block-section">
        <!-- TITLE PAGE -->
        <div class=" shape-bottom">
          <div class="bg-secondary block-title">
            <div class="container">
              <h2 class="text-uppercase color-dark text-bold no-margin">
               <?php
                     if(is_category()):
                        echo single_cat_title('');
					elseif(is_single()):
					$category = get_the_category();
					$firstCategory = $category[0]->cat_name; echo $firstCategory;	
                    elseif(is_tax()):
                        $term = $wp_query->queried_object;
                    echo $term->name;
                    else:
                        echo the_title();
                    endif;
                    ?>
              </h2>
              <div class="title-icon"> <i class="fa fa-inbox"></i> </div>
            </div>
          </div>
        </div><!-- END TITLE PAGE -->
        <div class="block-page">
          <div class="container-medium">
<?php } ?>