<div class="footer" >   
		<div class="content">
        <p>
          <a href="#">Terms of Use</a> |  <a href="#">Privacy Policy</a> <br>
          <a href="#">How to use inquiry</a> |  <a href="#">About Us</a>  | <a href="#">Contact Us</a><br>
          Copyright &copy; 2013
        </p>     
        </div>    
</div> <!-- End of Footer -->     

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="{{ asset('js/lib/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/boostrap/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chosen/chosen.jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/sidebar/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sidebar/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/sidebar/sidebarEffects.js') }}"></script>
  <script type="text/javascript">
    
  var config = {
      '.chosen-select-no-single' : {disable_search_threshold:10},
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  </script>