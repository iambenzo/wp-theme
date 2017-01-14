<?php
  if( is_single() ){
    //Blog post
    $category = get_the_category();
    $c = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => 3,
			'no_found_rows'       => true,
      'category_name'       => $category[0]->cat_name,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

      if ($c->have_posts()) :
?>
<div class="row">
    <div class="box-dark">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Some
                <strong>Similar Posts</strong>
            </h2>
            <hr>
            <?php while ( $c->have_posts() ) : $c->the_post(); ?>
              <div class="col-lg-4 text-center">
              <a href="<?php the_permalink();?>" style="color:#fff">
                <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive img-border img-center' ) );
                  } else {
                ?>
                <img class="img-responsive img-border img-center" src="<?php echo(get_template_directory_uri()); ?>/img/default.jpg" style="height:150px;width:300px;">
                <?php } ?>
                <h5><?php the_title();?></h5>
                </a>
                <hr class="visible-xs">
              </div>
            <?php
              endwhile;
              $category_id = get_cat_ID( $category[0]->cat_name );
              $category_link = get_category_link( $category_id );
            ?>
            <div class="row">
              <div class="col-lg-12 text-center">
                <hr class="visible-lg visible-md visible-sm">
                <a href="<?php echo esc_url( $category_link );?>" class="btn btn-default">Read More</a>
              </div>
            </div>
        </div>
    </div>
</div>
<?php
      endif;
  } elseif ( is_front_page() || is_page() && !is_page_template( 'page-Blog.php' )) {
    //Home page - hopefully
    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => 3,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
?>

<div class="row">
    <div class="box-dark">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">The Most
                <strong>Recent Posts</strong>
            </h2>
            <hr>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
              <div class="col-lg-4 text-center">
              <a href="<?php the_permalink();?>" style="color:#fff">
                <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'medium', array( 'class' => 'img-responsive img-border img-center' ) );
                  } else {
                ?>
                <img class="img-responsive img-border img-center" src="<?php echo(get_theme_root_uri()); ?>/iambenzo/img/default.jpg" style="height:300px;width:300px;">
                <?php } ?>
                <h5><?php the_title();?></h5>
                </a>
                <hr class="visible-xs">
              </div>
            <?php
              endwhile;
              $page = get_page_by_title( 'Blog' );
            ?>
            <div class="row">
              <div class="col-lg-12 text-center">
                <hr class="visible-lg visible-md visible-sm">
                <a href="<?php echo get_page_link($page->ID);?>" class="btn btn-default">Read More</a>
              </div>
            </div>
        </div>
    </div>
</div>

<?php endif;
  }
?>
