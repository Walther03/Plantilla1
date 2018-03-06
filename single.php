<?php get_header(); ?>
    
    <div id="left_content">

        <div class="single_content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          
                <h1><?php the_title(); ?></h1>
                
                <div class="single_left_content">
                
                <?php the_content(); ?>
                
                </div><!--//single_left_content-->
                
                <br /><br />
                
                <?php comments_template(); ?>
            
            <?php endwhile; else: ?>
            
                <h3>Sorry, no posts matched your criteria.</h3>
            
            <?php endif; ?>    
        </div><!--//single_content-->
        
        <?php get_footer('left'); ?>
        
    </div><!--left_content-->
    
<?php get_sidebar(); ?>
    
<?php get_footer(); ?>                