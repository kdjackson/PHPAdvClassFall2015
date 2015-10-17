<?php if ( isset($errors) && is_array($errors) ) : ?>
    <?php foreach ($errors as $err): ?>
        <p class="bg-danger"><?php echo $err; ?></p>
    <?php endforeach; ?>
<?php endif; ?>
