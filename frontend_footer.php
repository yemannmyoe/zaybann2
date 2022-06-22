  <!-- Footer -->
  </div>
  <footer class="py-3 mt-5" style="background-color: #020800">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="frontend/vendor/jquery/jquery.min.js"></script>
  <script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

  var sessionuser = '<?php echo $session_value; ?>';
  $(document).ready(function(){
    $("body").tooltip({selector: '[data-toggle=tooltip]'});
  })

</script>
  <script type ="text/javascript" src="custom.js"></script>


</body>

</html>
