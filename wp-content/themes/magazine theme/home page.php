<?php



/**
 * The main template file
 *
 * Template Name: Home Page
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

  get_header();?>



     <div class="container-fluid paddding mb-5">
                <div class="row mx-0">


                <?php

            $allPosts = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 1,
              'offset' => 4,

            );

            $getAllPosts = new WP_Query($allPosts);

            // var_dump($getAllPosts);


          if ($getAllPosts->have_posts() ) :

          while ($getAllPosts->have_posts()) : $getAllPosts->the_post();

          ?>


        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">

            <div class="fh5co_suceefh5co_height"><img src="<?php echo the_post_thumbnail(); ?>" alt="img">
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
                    </a></div>
                    <div class=""><a href="<?php the_permalink() ?>" class="fh5co_good_font">  <?php the_title();?> </a></div>
               </div>
            </div> 
        </div>

        <?php

          endwhile;  

          wp_reset_postdata(); 
          endif;	        
          ?>          

        
        <div class="col-md-6">
            <div class="row">
              
            <?php

                $allPosts = array(
                  'post_type' => 'post',
                  'post_status' => 'publish',
                  'posts_per_page' => 4,
                  'offset' => 5,


                );

                  $getAllPosts = new WP_Query($allPosts);

                  // var_dump($getAllPosts);


                  if ($getAllPosts->have_posts() ) :

                  while ($getAllPosts->have_posts()) : $getAllPosts->the_post();

                  ?>



                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="<?php echo the_post_thumbnail(); ?>" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">

                            <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?> </a></div>
                            <div class=""><a href="<?php the_permalink() ?>" class="fh5co_good_font_2 "><p><?php the_excerpt(); ?></p></a></div>
                        </div>
                    </div>
                </div>

                <?php

                endwhile;  

                wp_reset_postdata(); 
                endif;	        
                ?>      
 
            </div>
        </div>
     </div>
 
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">

        <?php query_posts( array(
                      'category_name' => 'trending',
                      // 'posts_per_page' => ,
                    )); ?>

                    <?php
                         if (have_posts()) :
                         while ( have_posts() ) : the_post();        
                            ?>  


            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="<?php echo the_post_thumbnail(); ?>"alt=""
                       class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="<?php the_permalink() ?>" class="text-white"> <?php the_title();?>  </a>
                        <div class="fh5co_latest_trading_date_and_name_color">  by <?php the_author(); ?>   <?php echo get_the_date(); ?> </div>
                    </div>
                </div>
            </div>

            <?php

                      endwhile;
                      wp_reset_query();
                      else :
                      ?>
                      <p>Sorry no posts matched your criteria.</p>
                      <?php
                      endif;
                      ?>


        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
        <?php query_posts( array(
                      'category_name' => 'all',
                      // 'posts_per_page' => ,
                    )); ?>

                    <?php
                        if (have_posts()) :
                        while ( have_posts() ) : the_post();        
                            ?>  

            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="<?php echo the_post_thumbnail(); ?> alt="/></div>
                    <div>
                        <a href="<?php the_permalink() ?>" class="d-block fh5co_small_post_heading"><span class=""><?php the_excerpt();?></span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> by <?php the_author(); ?>   <?php echo get_the_date(); ?> </div>
                    </div>
                </div>
            </div>

                        <?php

            endwhile;
            wp_reset_query();
            else :
            ?>
            <p>Sorry no posts matched your criteria.</p>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-white">Video News</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">

            <?php query_posts( array(
                      // 'category_name' => 'all',
                      'posts_per_page' => 3,
                    )); ?>

                    <?php
                        if (have_posts()) :
                        while ( have_posts() ) : the_post();        
                            ?>  


                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                              <?php $meta = get_post_meta(get_the_ID() , 'video' ); 
                              
                              // var_dump($meta);
                              foreach($meta as $met){
                              ?>
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $met ?>?rel=0&amp;showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                                        <?php  } ?>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                <img src="<?php// echo the_post_thumbnail(); ?> " alt=""/>
                            </div>
                            <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                        <span><i class="fa fa-play"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                            <span class=""><?php the_title();?> </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></div>
                        </div>
                    </div>
                </div>
                
                <?php
                endwhile;
                wp_reset_query();
                else :
                ?>
                <p>Sorry no posts matched your criteria.</p>
                <?php
                endif;
                ?>
 
               
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>



                <?php query_posts( array(
                      'category_name' => 'all',
                      'posts_per_page' => 4,
                      'offset' => 1,
                    )); ?>

                    <?php
                        if (have_posts()) :
                        while ( have_posts() ) : the_post();        
                            ?>  


                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="<?php echo the_post_thumbnail(); ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="<?php the_permalink() ?>" class="fh5co_magna py-2"><?php the_title();?> </a> <a href="<?php the_permalink() ?>" class="fh5co_mini_time py-3">  <?php the_author(); ?>  <?php echo get_the_date(); ?> </a>
                        <div class="fh5co_consectetur"><?php the_excerpt();?> 
                        </div>
                    </div>
                </div>


                <?php

                    endwhile;
                    wp_reset_query();
                    else :
                    ?>
                    <p>Sorry no posts matched your criteria.</p>
                    <?php
                    endif;
                    ?>



            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
             
               <div class="clearfix"></div>
                <div class="fh5co_tags_all">

                   <?php 
                    $tags = get_tags(array(
                      'hide_empty' => false,
                        'smallest'                  => 10, 
                        'largest'                   => 22,
                        'unit'                      => 'px', 
                        'number'                    => 10,  
                        'format'                    => 'flat',
                        'separator'                 => " ",
                        'orderby'                   => 'count', 
                        'order'                     => 'DESC',
                        'show_count'                => 1,
                        'echo'                      => false
                    ));
                    echo '<ul class="AddYourClassUl">';
                    foreach ($tags as $tag) {
                    echo '<li class="fh5co_tagg">' . $tag->name . '</li>';
                    }
                    echo '</ul>';
                ?>

                </div>
                <div>
              <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                
                <?php             

              $popularpost = new WP_Query( array( 'posts_per_page' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
              while ( $popularpost->have_posts() ) : $popularpost->the_post();
                          
              ?>

                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                      <img class="fh5co_most_trading"  alt="img"  src="<?php echo get_the_post_thumbnail_url();?>" />
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><?php echo the_title();?> Views   <?php echo '(' . wpb_get_post_views(get_the_ID()) .')';?> </div> 
                        <div class="most_fh5co_treding_font_123"> <?php echo the_date(); ?></div>
                    </div>
                </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>             
            </div>
        </div>


        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">

            <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post();  ?>



                <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>

                <?php endwhile; ?>


                <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
                <div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>

                <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

             </div>
        </div>
    </div>
</div>


            
<?php get_footer(); ?>