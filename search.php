<?php get_header(); ?>
    
    <div id="left_content">

        <div class="posts_container">
        
            <?php            
            $x = 0;
            while (have_posts()) : the_post(); ?>                                    
        
                <?php if($x == 1) { ?>
                <div class="home_post_box blog_post_box home_post_box_last">
                <?php } else { ?>
                <div class="home_post_box blog_post_box">
                <?php } ?>
                
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-post',array('alt' => 'post image')); ?></a>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="post_meta"><?php the_time('m-d-Y') ?> / <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
                    <p><?php $temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,190)); $temp_arr_content[count($temp_arr_content)-1] = ""; $display_arr_content = implode(" ",$temp_arr_content); echo $display_arr_content . '...'; ?></p>
                </div><!--//home_post_box-->
                
                <?php if($x == 1) { echo '<div class="home_divider"></div>'; $x = -1; } ?>
                
            <?php $x++; ?>
            <?php endwhile; ?>                
            <?php if($x != 0) { echo '<div class="home_divider"></div>'; } ?>
            
            <div class="clear"></div>
            
        </div><!--//posts_container-->
        
        <?php get_footer('left'); ?>
        
    </div><!--left_content-->
    
<?php get_sidebar(); ?>
    
<?php get_footer(); ?>                