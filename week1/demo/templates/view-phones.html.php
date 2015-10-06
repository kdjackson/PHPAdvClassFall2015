<?php if ( count($phones) > 0 ) : ?>
<h1>Phones</h1>
<ul>
<?php foreach( $phones as $key => $values ) : ?>
    <li><?php echo $values['phone']; ?> </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
