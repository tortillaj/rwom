<section class="page-content">
<?php the_content(); ?>
</section>

<?php if (!is_page(31) && !empty($custom_fields['contact_form'])): ?>
<div class="contact-form">
  <h2 class="contact-form__title">Find out More!</h2>
  <div class="contact-form__form">
    <?php echo $custom_fields['contact_form']; ?>
  </div>
</div>
<?php endif; ?>