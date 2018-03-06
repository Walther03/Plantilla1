    <div id="sidebar">

        <?php $shortname = "phototheme"; ?>

    

        <ul class="side_social_list">

          <?php if(get_option($shortname.'_twitter_link','') != "") { ?>

            <li><a href="<?php echo get_option($shortname.'_twitter_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-icon.png" /></a></li>

          <?php } ?>

          <?php if(get_option($shortname.'_facebook_link','') != "") { ?>

            <li><a href="<?php echo get_option($shortname.'_facebook_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook-icon.png" /></a></li>

          <?php } ?>

          <?php if(get_option($shortname.'_google_plus_link','') != "") { ?>

            <li><a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gplus-icon.png" /></a></li>

          <?php } ?>

          <?php if(get_option($shortname.'_dribbble_link','') != "") { ?>

            <li><a href="<?php echo get_option($shortname.'_dribbble_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/dribbble-icon.png" /></a></li>

          <?php } ?>

          <?php if(get_option($shortname.'_pinterest_link','') != "") { ?>

            <li><a href="<?php echo get_option($shortname.'_pinterest_link',''); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/pinterest-icon.png" /></a></li>

          <?php } ?>                

        </ul><!--//side_social_list-->

        

        <div class="logo_cont">

            <div align="center">

                <?php if(get_option($shortname.'_custom_logo_url','') != "") { ?>

                  <a href="<?php bloginfo('url'); ?>"><img src="<?php echo stripslashes(stripslashes(get_option($shortname.'_custom_logo_url',''))); ?>" class="logo" /></a>

                <?php } else { ?>

                  <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" class="logo" /></a>

                <?php } ?>                                        

            </div>

        </div><!--//logo_cont-->

        

        <div id="menu_container">

        <!--

            <ul class="page_list">

              <li><a href="#">Home</a></li>

              <li><a href="#">About</a></li>

              <li><a href="#">Blog</a></li>

            </ul>-->

            <?php wp_nav_menu('menu=header_menu&container=false&menu_class=page_list'); ?>

        <!--

            <ul class="cat_list">

              <li><a href="#">Landscape</a></li>

              <li><a href="#">Architecture</a></li>

              <li><a href="#">Portrait</a></li>

            </ul>-->

            <?php wp_nav_menu('menu=category_menu&container=false&menu_class=cat_list'); ?>

        </div><!--//menu_container-->

        

        <div class="side_search_cont">

            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">

            <div align="center"><input type="text" name="s" id="s" /></div>

            <INPUT TYPE="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/search-icon.png" class="search_icon" BORDER="0" ALT="Submit Form">

            </form>

        </div><!--//side_search_cont-->

        

        <div class="side_box side_random_box">
            
            <?php
            
            if(is_home()) {
                global $slider_arr;
                $category_ID = get_category_id('blog');
                $args = array(
                             //'category_name' => 'blog',
                             'post_type' => 'post',
                             'posts_per_page' => -1,
                             'post__not_in' => $slider_arr,
                             'cat' => '-' . $category_ID,
                             );
                query_posts($args);                
                
                $x = 0;
                while (have_posts()) : the_post(); ?>                            
                
                    <?php if($x == 2) { ?>
                        <div class="side_random_box last_side_random_box">
                    <?php } else { ?>
                        <div class="side_random_box">
                    <?php } ?>
                    
                        <a href="<?php the_permalink(); ?>" class="small_img"><?php the_post_thumbnail('home-post-small',array('alt' => 'post image')); ?></a>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php $temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,190)); $temp_arr_content[count($temp_arr_content)-1] = ""; $display_arr_content = implode(" ",$temp_arr_content); echo $display_arr_content . '...'; ?></p>
                    </div><!--//side_random_box-->
    
                <?php $x++; ?>
                <?php endwhile; ?>        
                <?php wp_reset_query(); ?>                            
        
            <?php } elseif(is_singular()) { ?>
                        
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>    
                    <h1><?php the_title(); ?></h1>
                    <div class="single_left_content">
                    <?php the_content(); ?>
                    </div><!--//single_left_content-->
                    <br /><br />
                    
                    <?php if(is_single()) { ?>
                        <?php comments_template(); ?>
                    <?php } ?>    
                <?php endwhile; else: ?>    
                    <h3>Sorry, no posts matched your criteria.</h3>                
                <?php endif; ?>                
            
            <?php } else { 
            
                while (have_posts()) : the_post(); ?>                            
                
                    <?php if($x == 2) { ?>
                        <div class="side_random_box last_side_random_box">
                    <?php } else { ?>
                        <div class="side_random_box">
                    <?php } ?>
                    
                        <a href="<?php the_permalink(); ?>" class="small_img"><?php the_post_thumbnail('home-post-small',array('alt' => 'post image')); ?></a>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php $temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,190)); $temp_arr_content[count($temp_arr_content)-1] = ""; $display_arr_content = implode(" ",$temp_arr_content); echo $display_arr_content . '...'; ?></p>
                    </div><!--//side_random_box-->
    
                <?php $x++; ?>
                <?php endwhile; ?>                    
            
            <?php } ?>
        </div><!--//side_box-->  

        

        <div class="side_widgets">

        

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>       

            

                <div class="side_box">

                    <h3>Blogroll Favorite Sites</h3>

                    <ul>

                      <li><a href="#">Documentation</a></li>

                      <li><a href="#">Plugins</a></li>

                    </ul>

                </div><!--//side_box-->

            

            <?php endif; ?>     

            

        </div><!--//side_widgets-->

        

    </div><!--//sidebar-->