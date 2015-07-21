    <footer id="footer" class="clearfix">
      <div id="footer-widgets">

        <div class="container">

        <div id="footer-wrapper">

          <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10 copyright">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
              <?php endif; ?>
            </div> <!-- end widget1 -->

            <div class="col-xs-12 col-sm-2 col-md-2 footerShareIcons">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
              <?php endif; ?>
            </div> <!-- end widget1 -->

          </div> <!-- end .row -->

        </div> <!-- end #footer-wrapper -->

        </div> <!-- end .container -->
      </div> <!-- end #footer-widgets -->

      <div id="sub-floor">
        <div class="container">
          <div class="row">
            <div class="col-md-4 copyright">
              &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
            </div>
            <div class="col-md-4 col-md-offset-4 attribution">
              <!-- <a href="http://www.danvswild.com/brew" target="_blank">BREW</a> theme by <a target="_blank" href="http://www.danvswild.com">Dan vs Wild</a> -->
            </div>
          </div> <!-- end .row -->
        </div>
      </div>

    </footer> <!-- end footer -->

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>
    <!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->
