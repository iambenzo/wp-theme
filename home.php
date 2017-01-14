<?php
  get_header();
  $options = get_option( 'iambenzo_settings' );
?>

        <!--<div class="brand">iAmBenzo</div>-->
        <!--<div class="address-bar"></div>-->

        <div class="container">

            <div class="row">
                <div class="box">
                    <div class="col-lg-12 text-center">
                        <div id="carousel" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel" data-slide-to="1"></li>
                                <li data-target="#carousel" data-slide-to="2"></li>
                                <!--<li data-target="#carousel-example-generic" data-slide-to="3"></li>-->
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive img-full" src="<?php echo(get_template_directory_uri()); ?>/img/slide-1.jpg" alt="">
                                </div>
                                <div class="item ">
                                    <img class="img-responsive img-full" src="<?php echo(get_template_directory_uri()); ?>/img/slide-2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="img-responsive img-full" src="<?php echo(get_template_directory_uri()); ?>/img/slide-3.jpg" alt="">
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                        <h2 class="brand-before">
                            <small>Welcome to</small>
                        </h2>
                        <h1 class="brand-name"><?php echo get_bloginfo( 'name' ); ?></h1>
                        <hr class="tagline-divider">
                        <h2>
                            <small>By
                                <strong><?php echo get_bloginfo( 'description' ); ?></strong>
                            </small>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center"><?php echo $options['iambenzo_text_field_0']; ?>
                            <strong><?php echo $options['iambenzo_text_field_1']; ?></strong>
                        </h2>
                        <hr>
                          <?php echo $options['iambenzo_textarea_field_2']; ?>
                       </div>
                </div>
            </div>

            <?php get_sidebar(); ?>

            <div class="row">

              <div class="box-clear">

                <div class="col-lg-12">

                  <?php if ( is_active_sidebar( 'basebar' ) ) :

                    dynamic_sidebar( 'basebar' );

                  endif; ?>

                </div>

              </div>

            </div>

        </div>
        <!-- /.container -->


<?php get_footer(); ?>
