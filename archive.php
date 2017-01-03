<?php
/**
 * Template Name: Blog page
 */
get_header();
?>


  <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    //query_posts('posts_per_page=3&paged=' . $paged);
    $query = new WP_Query('paged=' . $paged );
    if ( have_posts() ): ?>
    <div class="brand"><?php the_archive_title(); ?></div>
      <div class="address-bar"><?php the_archive_description(); ?></div>
        <div class="container">
    
    <?php  
    while ( have_posts() ) : the_post();
  ?>
  <div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center"><strong><?php the_title();?></strong>
                 - <?php the_date();?>
            </h2>
            <hr>
            <?php 
              if ( has_post_thumbnail() ) {
                ?>
                <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'img-responsive img-border img-left' ) );?>
                </a>
                <?php
              } else {
            ?>
            <a href="<?php the_permalink(); ?>">
            <img class="img-responsive img-border img-left" src="<?php echo(get_template_directory_uri()); ?>/img/default.jpg" style="height:150px;width:150px;">
            </a>
            <?php } ?>
            <hr class="visible-xs">
            <?php the_excerpt();?>
            <div class="row">
              <div class="col-lg-12 text-center">
                <hr>
                <a href="<?php the_permalink();?>" class="btn btn-default btn-lg">Read More</a>
              </div>
            </div>
        </div>
    </div>
  </div>
  <?php endwhile; endif;?>
    <div class="row">
    <div class="box-clear">
        <div class="col-lg-12 text-center">
        <ul class="pager">
            <li class="previous"><?php next_posts_link( '<span>&larr;</span> Older'); ?>
            </li>
            <li class="next"><?php previous_posts_link( 'Newer <span>&rarr;</span>'); ?>
            </li>
          </ul>
        </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>

<?php
wp_reset_postdata();
get_footer();
?>