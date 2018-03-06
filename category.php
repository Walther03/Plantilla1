<?php get_header(); ?>

<?php $shortname = "phototheme"; ?>
    
    <div id="left_content">
    
        <div class="posts_container">

            <?php $x = 0; ?>
            <?php
              global $query_string;
              query_posts( $query_string . '&posts_per_page=9' );
            ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php if($x == 2) { ?>
                <div class="home_post_box home_post_box_last">                
                <?php } else { ?>
                <div class="home_post_box">                
                <?php } ?>

                    <a href="<?php the_permalink(); ?>" class="medium_img"><?php the_post_thumbnail('home-post-medium',array('alt' => 'post image')); ?></a>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p><?php $temp_arr_content = explode(" ",substr(strip_tags(get_the_content()),0,190)); $temp_arr_content[count($temp_arr_content)-1] = ""; $display_arr_content = implode(" ",$temp_arr_content); echo $display_arr_content . '...'; ?></p>
                </div><!--//home_post_box-->
                
                <?php if($x == 2) { echo '<div class="home_divider"></div>'; $x = -1; } ?>
            
            <?php $x++ ?>
            <?php endwhile; ?>    
            
            <?php if($x != 0) { echo '<div class="home_divider"></div>'; } ?>
            <div class="clear"></div>
            
        </div><!--//posts_container-->
        
        <div class="load_more_cont">
            <?php next_posts_link('Load more posts...') ?>
        </div><!--//load_more_cont-->
        
        <?php get_footer('left'); ?>
        
<script type="text/javascript">
// Ajax-fetching "Load more posts"
$('.load_more_cont a').live('click', function(e) {
	e.preventDefault();
	//$(this).addClass('loading').text('Loading...');
        $('.load_more_text a').html('Loading...');
	$.ajax({
		type: "GET",
		url: $(this).attr('href') + '#main_container',
		dataType: "html",
		success: function(out) {
			result = $(out).find('.posts_container .home_post_box');
			nextlink = $(out).find('.load_more_cont a').attr('href');
                        //alert(nextlink);
			//$('#boxes').append(result).masonry('appended', result);
                    $('.posts_container').append(result);
			//$('.fetch a').removeClass('loading').text('Load more posts');
                        $('.load_more_text a').html('Load more posts...');
                        
                        
			if (nextlink != undefined) {
				$('.load_more_cont a').attr('href', nextlink);
			} else {
				$('.load_more_cont').remove();
                                $('.posts_container').append('<div class="clear"></div>');
                              //  $('.load_more_cont').css('visibilty','hidden');
			}

                    if (nextlink != undefined) {
                        $.get(nextlink, function(data) {
                          //alert(nextlink);
                          if($(data + ":contains('home_post_box')") != '') {
                            //alert('not found');
                              //                      $('.load_more_cont').remove();
                                                    $('.posts_container').append('<div class="clear"></div>');        
                          }
                        });                        
                    }
                        
		}
	});
});
</script>                        
        
    </div><!--left_content-->
    
<?php get_sidebar(); ?>
    
<?php get_footer(); ?>                