<?php
// parts/delivery-process.php — Delivery process
?>

<section class="delivery-section section">
    <div class="delivery-container container">
        <span class="sub-head">Delivery Process</span>
        <h2>From Build to Production Floor</h2>
        <div class="delivery-inside">
            <div class="delivery-img">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/home/delivery-process-2.svg'; ?>" alt="">
            </div>
            <div class="delivery-content">
                <p>From the initial build to final installation, our process is focused on delivering CNC machines that are ready for real production. We begin by understanding application needs, select the right machine configuration, and carry out thorough build and testing procedures. Each machine is installed on-site, tested under working conditions, and handed over for production use to ensure a smooth and reliable start.</p>
                <?php $text = 'Call Us Now';
                $url = home_url('/contact');
                $type = 'primary';
                include get_template_directory() . '/components/button.php';
                ?>
            </div>
        </div>

    </div>
</section>