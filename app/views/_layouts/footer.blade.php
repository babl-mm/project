<div class="footer" >   
		<div class="content">
        <p>
          <a href="#">Terms of Use</a> |  <a href="#">Privacy Policy</a> <br>
          <a href="#">How to use inquiry</a> |  <a href="#">About Us</a>  | <a href="#">Contact Us</a><br>
          Copyright &copy; 2013
        </p>     
        </div>    
</div> <!-- End of Footer -->     
<div class="footer">
	
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
  <script type="text/javascript">
    
  var config = {
      '.chosen-select-no-single' : {disable_search_threshold:10},
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  </script>