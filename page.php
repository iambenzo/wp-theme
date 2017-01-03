<?php
get_header(); 
while ( have_posts() ) : the_post();
?>

<div class="brand"><?php the_title(); ?></div>
<div class="address-bar"></div>
<div class="container">
  <div class="row">
    <div class="box">
        <div class="col-lg-12">

              <?php the_content();?>

        </div>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>

<?php
endwhile;
get_footer();
?>