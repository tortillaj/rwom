<div class="module-details">
  <div class="module-details__image">
    <?php echo get_the_post_thumbnail( get_the_ID(), 'medium-slide' ); ?>
  </div>
  <?php if ( ! empty($custom_fields['module_features']) ): ?>
    <ul class="module-details__features">
      <?php foreach ( $custom_fields['module_features'] as $feature ): ?>
        <li class="module-details__feature"><?php echo $feature['feature']; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>