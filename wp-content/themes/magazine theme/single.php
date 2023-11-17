<?php get_header(); ?>



<main id="site-content">

	<section class="banner">
        <section class="banner" style="background-image:url(<?php the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; width:100%; height:500px;">
            <div class="container-fluid">
                <div class=" row">

 
                  </div>
              <div class=" text-center align-itemes-center " >
                <h1 style="font: normal normal 500 70px/80px 'IBM Plex Serif'; text-transform: capitalize; padding-top:3em;"><?php the_title();?></h1>          

              </div>
                </div>
            </div>
        </section>


<section class="loop">
    <div class="container py-5">


              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              <div class="row">
              <div class="text text-center align-itemes-center " >
                <div class="col">
     
              <h2 class="pt-3"><?php the_title();?></h2>
              <div class="spacing">
              <?php the_content(); ?>
              </div>
                </div>
              </div>

              <?php get_template_part( 'content', get_post_format() ); ?>

                    <div class= "comments-area">
                      <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                      comments_template();
                    endif;
                    ?>
     </div>
              <?php endwhile; endif; ?>
              <div style="text-align:center;">

              <!-- <?php //$withcomments = 1; comments_template(); ?> -->
        </div>

              <?php
              			the_post_navigation(
                      array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'popularfx' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'popularfx' ) . '</span> <span class="nav-title">%title</span>',
                      )
                    );
              ?>
        


  </div>
</section>
</main>




<?php get_footer(); ?>
