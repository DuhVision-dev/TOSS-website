

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

        <div class="cards-sml">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">Contact Name:</h4>
            <p class="card-sml-content">Mr. Naresh</p>
          </div>
        </div>

        <div class="cards-sml">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">Tel:</h4>
            <p class="card-sml-content">+91 9988776655</p>
          </div>
        </div>

        <div class="cards-sml">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">E Mail:</h4>
            <p class="card-sml-content">mr.naresh@example.com</p>
          </div>
        </div>

        <div class="cards-sml">
          <div class="card-sml-conent">
            <h4 class="card-sml-label">WhatsApp</h4>
            <p class="card-sml-content">+91 9988776655</p>
          </div>
        </div>

      </div>
    </div>

    <?php get_template_part('parts/cta'); ?>

    <?php get_template_part('parts/map'); ?>

    

  </section>
</main>
<?php
get_footer();
?>