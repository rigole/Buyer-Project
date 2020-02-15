
<section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactez Nous</h3>
          <p>Plusieurs Moyens existent pour nous contacter</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Addresse</h3>
              <address>BP 1779, Douala, Cameroun</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>telePhone </h3>
              <p><a href="tel:+155895548855">+237 657614590</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="">contact@flashpay.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="#contact" method="post" role="form" class="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name"  required="required" class="form-control" id="name" placeholder="Votre Nom"  />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control"  required="required" name="email" id="email" placeholder="votre Email"   />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control"  required="required" name="subject" id="subject" placeholder="Objet"  />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control"  required="required" name="message" rows="5" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><a href="#contact" data-toggle="" data-target=""><button type="submit">Envoyer</button></a></div>
            <?php if(!empty($_POST['name'])): ?> 
              <div class="alert alert-success"> 
                 <h2>Merci de nous avoir contacté </h2>
                   <p>Nous nous repondrons dans les plus bref délais</p>
                    <?php endif ; ?>
          </form>
        </div>
        
              
      </div>
      
      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3><span style="color:white;">FlashPay</span></h3>
            <p></p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Liens Utiles</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Acceuil</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">A propos de nous</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="shop/faq.php">FAQ</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Conditions d'utilisations</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Politique de confidentialité</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contactez nous</h4>
            <p>
              BP 1779 Bonanjo <br>
              Douala<br>
             Cameroun <br>
              <strong>Phone:</strong> +237 657614590<br>
              <strong>Email:</strong> contact@flashpay.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
             <!--  <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a> -->
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Notre  Newsletter</h4>
            <p>Abonnez vous à votre newsletter pour être au courant de nos dernières offres et actualités</p>
            <form style="color:black;" action="#footer" method="post">
            <input type="email" required="required" name="mail"><input type="submit"  value="S'inscrire">
              <?php if(!empty($_POST['mail'])): ?> 
                   <p style="color:white;">Merçi de vous être abonné à notre newsletter</p>
                    <?php endif ; ?>
            </form>
          </div>

        </div>
      </div>
     </div>

     <div class="container">
      <div class="copyright" >
        &copy; Copyright <strong><span style="color:white;">FlashPay 2019</span></strong>. Tous droits réservés
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://.com/">FlashPay </a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>
  <script src="../js/app.js"></script>
 <!-- <script src="../js/app.js"></script>-->
  <!-- <script src="https://js.stripe.com/v2/"></script>-->
  <script>

 /* Stripe.setPublishableKey('pk_test_6o4xIOyDQ2Wx56YQLJkzvH4G004TvhMaV2')
   var $form = $('#payment_form')
   $form.submit (function (e) {
     e.preventDefault()
     $form.find('button').attr('disabled',true)
     Stripe.card.createToken($form, function(status,response){
      
        if (response.error) {
          $form.find('.message').remove();
          $form.prepend('<div class="alert alert-danger"><p>' + response.error.message + '<p></div>');
        }
        else{
          var token = response.id;
          $form.append($('<input type="hidden" name="stripeToken">').val(token))
          $form.get(0).submit()  
        } 

     })
     

   })*/
  



  </script>
  <script>
   /*$(document).ready(function (){
    var txt = $('#nomProduit');

if(txt.text() == "Facture Eneo"){
  $("#numerofacture").show();
}
else{
  $("#numerofacture").hide();

}*/

//})(jQuery);
  
  
/*var facture = document.getElementById('nomProduit').innerText;
var contract = document.getElementById('numerofacture');
if(facture == "facture Eneo" || "Facture D'eau"){
  contract.removeAttribute("disabled");
  contract.setAttribute("enabled","");
}else{
  contract.setAttribute("disabled" , "");
  contract.removeAttribute("enabled");
}/

  </script>
 
</body>
</html>