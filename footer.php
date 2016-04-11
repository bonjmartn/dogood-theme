<div class="full-container">

<!-- Footer Widgets -->
<footer>

  <div class="page-container">

        <div class="section group">
          <div class="col span_3_of_12">
            <?php if ( ! dynamic_sidebar( 'footer-1') ): ?>
              <h3>Footer Setup</h3>
              <p>Add widgets to this footer section by going to Appearance > Widgets and adding widgets to the "Footer 1" section.</p>
            <?php endif; ?>
          </div>

          <div class="col span_3_of_12">
            <?php if ( ! dynamic_sidebar( 'footer-2') ): ?>
              <h3>Footer Setup</h3>
              <p>Add widgets to this footer section by going to Appearance > Widgets and adding widgets to the "Footer 2" section.</p>
            <?php endif; ?>
          </div>

          <div class="col span_3_of_12">
            <?php if ( ! dynamic_sidebar( 'footer-3') ): ?>
              <h3>Footer Setup</h3>
              <p>Add widgets to this footer section by going to Appearance > Widgets and adding widgets to the "Footer 3" section.</p>
            <?php endif; ?>
          </div>

          <div class="col span_3_of_12 social-widget">
            <?php if ( ! dynamic_sidebar( 'social-icons') ): ?>
              <h3>Social Icons Setup</h3>
              <p>Add your social media icons here with a widget. Go to Appearance > Widgets and add the Social Icons widgets to the "Footer 4" section.</p>
            <?php endif; ?>
          </div>
      
      </div>
    </div>
</footer>

  <!-- Bottom Strip -->

  <div class="footer-strip">
    <div class="page-container">
      <span id="copyright">&copy; <?php echo date ('Y') ?> <?php bloginfo('name'); ?>, a 501c Non-Profit Organization &nbsp; &bull; &nbsp; Website design by <a href="http://www.zenwebthemes.com/">ZenWebThemes.com</a></span>
    </div>
  </div>

</div><!-- end of full container -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11765431-13', 'auto');
  ga('send', 'pageview');

</script>

<?php wp_footer(); ?>

</body>
</html>