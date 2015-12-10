  

	<div class="container">
      <hr>
      <footer>
        <p>&copy; Netmais 2015</p>
      </footer>

      <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
          <?php
              wp_nav_menu( array(
                  'menu'              => 'footer',
                  'theme_location'    => 'bottom-menu',
                  'depth'             => 2,
                  'menu_class'        => 'nav navbar-nav',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
          ?>
        </div>
      </nav>
    </div> <!-- /container -->



  <script>
    var _gaq=[['_setAccount','UA-XXXXXXX'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</div></body>
</html>