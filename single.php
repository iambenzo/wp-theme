<?php
get_header(); 
while ( have_posts() ) : the_post();
?>

<div class="brand"><?php the_title(); ?></div>
<div class="address-bar"><?php the_date();?></div>
<div class="container">
  <div class="row">
    <div class="box">
        <div class="col-lg-12">

              <?php
              the_content();
              ?>

        </div>
        <div class="col-lg-12 text-center">
          <div class="col-lg-4 text-center"></div>
            <div class="col-lg-4 text-center">
              <?php
                $defaults = array(
                  'before'           => '<h2 class="intro-text text-center">Read <strong>' . __( 'More' ).'</strong></h2><hr><p>',
                  'after'            => '</p>',
                  'link_before'      => '<span class="btn btn-default btn-md" style="margin-right:5px;min-width:120px;">',
                  'link_after'       => '</span>',
                  'next_or_number'   => 'next',
                  'separator'        => '',
                  'nextpagelink'     => __( 'Next Page' ),
                  'previouspagelink' => __( 'Previous Page' ),
                  'pagelink'         => '%',
                  'echo'             => 1
                );
               
                      wp_link_pages( $defaults );

              ?>
            </div>
          <div class="col-lg-4 text-center"></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="box-clear">
        <div class="col-lg-12 text-center">
        <ul class="pager">
            <li class="previous"><?php previous_post_link( '%link', 'Previous Post' ); ?>
            </li>
            <li class="next"><?php next_post_link( '%link', 'Next Post' ); ?>
            </li>
          </ul>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="box">
        <div class="col-lg-12">
          <?php comments_template(); ?> 
        </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php
endwhile;
get_footer();
?>