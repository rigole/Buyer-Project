
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
              <p><a href="mailto:info@example.com">contact@flashpay.com</a></p>
            </div>
          </div>

        </div>

        <div  class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form id="formu" action="#contact" method="POST"  class="">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name"  class="form-control" required="required" placeholder="Votre Nom" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" title="veuillez saisir une adresse email valide"  name="email" required="required" placeholder="votre Email"  />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" required="required" placeholder="Objet"  />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" required="required"  placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>

          <!-- Modal -->
  
          
            
<div class="text-center"> <a href="#contact" data-toggle="" data-target=""> <button  type="submit">Envoyer</button></a></div>

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
            <h3>FlashPay</h3>
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
              <strong>Email:</strong> contact@flashpayer.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
             <!--  <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>-->
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Notre  Newsletter</h4>
            <p>Abonnez vous à votre newsletter pour être au courant de nos dernières offres et actualités</p>
            <form action="#footer" method="post">
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
      <div class="copyright">
        &copy; Copyright <strong>FlashPayer 2020</strong>. Tous droits réservés
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://bootstra.com/">FlashPayer </a>
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
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script src="js/main.js"></script>
  <script src="../js/app2.js"></script>
  <script>
 /*   function choixService() {

  if (document.formular.paychoice.value == "Choisissez le fournisseur") {
    document.getElementById('lienpaiment').setAttribute('href','#featured-services');
    document.getElementById('error').innerHTML="Veuillez Selectionner un fournisseur"; 
  }
  
  else if (document.formular.paychoice.value == "Eneo")  { 
    document.getElementById('lienpaiment').setAttribute('href','shop/achat.php');
    }
    else{
      document.getElementById('lienpaiment').setAttribute('href','shop/facture.php');
    }
} 
*/
$(document).ready(function(){
     $('#country').change(function(){
         var id_pays = $(this).val();
         $.ajax({
            url:"ville.php",
            method:"POST",
            data:{id_pys:id_pays},
            dataType:"text",
            success:function(data)
            {
              $("#city").html(data);
            }

         });
     });
});

$(document).ready(function(){
     $('#country').change(function(){
         var id_service = $(this).val();
         $.ajax({
            url:"service.php",
            method:"POST",
            data:{id_serv:id_service},
            dataType:"text",
            success:function(data)
            {
              $("#service").html(data);
            }

         });
     });
});

$(document).ready(function(){
     $('#service').change(function(){
         var id_fournisseur = $(this).val();
         $.ajax({
            url:"fournisseur.php",
            method:"POST",
            data:{id_four:id_fournisseur},
            dataType:"text",
            success:function(data)
            {
              $("#fournisseur").html(data);
            }

         });
     });
});

    </script>

</body>
</html>