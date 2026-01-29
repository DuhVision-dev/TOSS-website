<?php
// parts/delivery-process.php — Delivery process
?>

<section class="delivery-section section">
    <div class="delivery-container container">
        <span class="sub-head">Delivery Process</span>
        <h2>From Build to Production Floor</h2>
        <div class="delivery-inside">
            <div class="delivery-img">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/home/delivery-process.svg'; ?>" alt="">
            </div>
            <div class="delivery-content">
                <p>Lorem ipsum dolor sit amet consectetur. Nullam integer lobortis convallis feugiat in risus eu purus malesuada. Pretium elementum ut consequat et id. Id dolor purus sit commodo sapien ligula. Non quis pellentesque ipsum morbi. Eget enim iaculis vitae ultrices et ornare eu. Convallis in ipsum nulla tempus quis accumsan eros rutrum. Cursus dictumst diam scelerisque placerat. Eget aenean semper sit ultricies non proin ultrices.</p>
                <?php $text = 'Call Us Now';
                $url = home_url('/contact');
                $type = 'primary';
                include get_template_directory() . '/components/button.php';
                ?>
            </div>
        </div>

    </div>
</section>