<?php
/*
Template Name: Contact Page
*/
get_header();
?>
<div class="container site-inner">
  <h1>Contact</h1>
  <form class="ajax-form">
    <label>Name<br><input type="text" name="name"></label>
    <label>Email<br><input type="email" name="email"></label>
    <button class="button" type="submit">Send</button>
  </form>
</div>
<?php
get_footer();
?>