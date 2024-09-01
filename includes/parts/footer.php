  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            
            <h3></h3>
            <p>
              Hitec University<br>
              Taxila, 47040<br>
              Islamabad <br><br>
              <strong>Phone:</strong> +92 000 0000000<br>
              <strong>Email:</strong> Telemedicine@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cardiology</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Orthopedic</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Child Specialist</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">General Physician</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Phychiatrist</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Neurology</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p></p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>TeleMedicine</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="#">TeleMedicine.com</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

<script>
	function showDoctors(val){
        if(val){
            $.ajax({
                type:'POST',
                url:'includes/parts/ajaxFile.php',
                data:'department_id='+val,
                success:function(html){
                    $('#doctor').html(html);
                }
            }); 
        }else{
            $('#doctor').html('<option value="">Select Department First</option>'); 
        }
    
    }
	function showDates(val){
		
		var doc_id=document.getElementById('doctor').value;
        if(val){
            $.ajax({
                type:'POST',
                url:'includes/parts/ajaxFile.php',
                data:'doctor_id='+doc_id,
                success:function(html){
                    $('#patient_date').html(html);
                }
            }); 
        }else{
           $('#patient_date').html('<option value="">Select Type First</option>'); 
        }
    
    }
	
	function showslots(val){
		
		var doc_id=document.getElementById('doctor').value;
        if(val){
            $.ajax({
                type:'POST',
                url:'includes/parts/ajaxFile.php',
                data:'doc_id='+doc_id+'&date='+val,
                success:function(html){
                    $('#appointment_slot').html(html);
                }
            }); 
        }else{
          $('#appointment_slot').html('<option value="">Select Date First</option>'); 
        }
    
    }
	</script>
</body>

</html>