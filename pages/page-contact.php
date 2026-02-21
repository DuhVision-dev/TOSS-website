

<?php
/*
Template Name: Contact Page
*/
get_header();
?>
<main class="contact-main">
  <section class="contact-hero section">
    <div class="contact-container container">
      <h1>Contact Us Head</h1>
      <p>We provide 24-hour online service. If you need, we can also provide paid door-to-door service.</p>

      <div class="contact-cards-wrapper">

        <div class="cards-sml card-hover">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">Contact Name:</h4>
            <p class="card-sml-content">Mr. Naresh Khandelwal</p>
          </div>
        </div>

        <a href="https://wa.me/8851471671" target="_blank" rel="noopener" class="link-card">
          <div class="cards-sml">
            <div class="card-sml-conent">
              <h4 class="card-sml-label">Whatsapp / Phn</h4>
              <p class="card-sml-content">+91 88514 71671</p>
            </div>
          </div>
        </a>

        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=cnctoss@gmail.com" target="_blank" rel="noopener" class="link-card">
          <div class="cards-sml">
            <div class="card-sml-conent">
              <h4 class="card-sml-label">E Mail:</h4>
              <p class="card-sml-content">cnctoss@gmail.com</p>
            </div>
          </div>
        </a>

        <div class="cards-sml card-hover">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">Contact Name:</h4>
            <p class="card-sml-content">Mr. Ajit Singh</p>
          </div>
        </div>

        <a href="https://wa.me/9540828354" target="_blank" rel="noopener" class="link-card">
          <div class="cards-sml">
            <div class="card-sml-conent">
              <h4 class="card-sml-label">Whatsapp / Phn</h4>
              <p class="card-sml-content">+91 95408 28354</p>
            </div>
          </div>
        </a>

        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=cnctoss@gmail.com" target="_blank" rel="noopener" class="link-card">
          <div class="cards-sml">
            <div class="card-sml-conent">
              <h4 class="card-sml-label">E Mail:</h4>
              <p class="card-sml-content">cnctoss@gmail.com</p>
            </div>
          </div>
        </a>

      </div>
      
    </div>

    <?php get_template_part('parts/cta'); ?>

    <?php get_template_part('parts/map'); ?>

    

  </section>
</main>
<?php
get_footer();
?>