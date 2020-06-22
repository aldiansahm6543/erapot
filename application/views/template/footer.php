    </div>
  </div>

  <div class="overlay"></div>
  <script src="<?= base_url() ?>/asset/js/jquery-3.3.1.slim.min.js"></script>
  <script src="<?= base_url() ?>/asset/js/popper.min.js"></script>
  <script src="<?= base_url() ?>/asset/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/asset/js/jquery.mCustomScrollbar.concat.min.js">
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
      });

      $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
      });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
</body>

</html>