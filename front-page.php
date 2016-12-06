<?php get_header(); ?>

           
<div class="full-container">

<!-- Large photo -->

<div class="home-overlay">

  <div class="lg-homepage-photo">
    <?php if( get_theme_mod( 'dogood_lg_photo' ) != "" ): ?>
      <img src="<?php echo get_theme_mod( 'dogood_lg_photo' ); ?>">
    <?php endif; ?>
  </div>

  <!-- Headlines -->

  <div class="home-text-overlay">

    <div class="site-headline">
      <p id="site-headline"><?php echo get_theme_mod('dogood_headline_text'); ?></p>
    </div>

    <div class="site-subheadline">
      <p id="site-subheadline"><?php echo get_theme_mod('dogood_subheadline_text'); ?></p>
    </div>

    <div class="front-button">

      <?php if ( ! dynamic_sidebar( 'front-button') ): ?>
        <h3>Headline Setup</h3>
        <p>Refer to the documentation for how to set up this section.</p>
      <?php endif; ?>

    </div>

  </div>

</div> 


    <div class="mission-statement">
      <div class="page-container">
        <?php if ( ! dynamic_sidebar( 'mission-statement') ): ?>
        <h3>Mission Statement Setup</h3>
        <p>Set up your mission statement with a widget. Go to Appearance > Widgets and add a text widget to the "Mission Statement" section.</p>
        <?php endif; ?>
      </div>
    </div>


<div class="page-container">

    <div class="section group">

      <div class="col span_4_of_12">
      <?php if ( ! dynamic_sidebar( 'create-your-own-1') ): ?>
        <h3>Homepage Feature 1</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

      <div class="col span_4_of_12">
      <?php if ( ! dynamic_sidebar( 'create-your-own-2') ): ?>
        <h3>Homepage Feature 2</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

      <div class="col span_4_of_12">
      <?php if ( ! dynamic_sidebar( 'create-your-own-3') ): ?>
        <h3>Homepage Feature 3</h3>
        <p>Set up your content with a widget. Go to Appearance > Widgets and use the Homepage Feature widget.</p>
      <?php endif; ?>
      </div>

    </div>         

    <h2 class="home-titles">Latest News</h2>

    <div class="section group">

        <!-- WP LOOP -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'do-good' ); ?></p>

        <?php endif; ?> 

        <!-- show latest blog posts -->

            <?php
              $args = array( 'posts_per_page' => 3, 'orderby' => 'date' );
              $postslist = get_posts( $args );
              foreach ( $postslist as $post ) :
              setup_postdata( $post ); ?> 

              <div class="col span_4_of_12 most-recent-post">

                   <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a><br /><br />
                    <?php the_excerpt(); ?><a href="<?php the_permalink(); ?>">[Read More]</a><br /><br />

              </div>
              <?php
              endforeach; 
              wp_reset_postdata();
              ?>

    </div>
    
</div>  


    <div class="page-container">

      <div class="google-map"> 
      <?php if ( ! dynamic_sidebar( 'google-map') ): ?>
        <h3>Google Map Setup</h3>
          <p>Set up your Google Map with a widget. Go to Appearance > Widgets and add a text widget to the "Google Map" section.</p>
        <?php endif; ?>
    </div>
    
    </div>

    <div class="footer-cta">

      <?php if ( ! dynamic_sidebar( 'front-bar') ): ?>
        <h3>Call to Action Bar Setup</h3>
        <p>Set up your call to action bar with a widget. Go to Appearance > Widgets and add the widget to the "Footer Call to Action Bar" section.</p>
      <?php endif; ?>

    </div>

</div><!-- end of full container -->

<?php get_footer(); ?>