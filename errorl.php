<?php  if (count($errorl) > 0) : ?>
  <div class="error">
  	<?php foreach ($errorl as $error) : ?>
  	  <p><?php echo "$error" ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>