<?php
  Breadcrumbs::for('landing', function ($trail) {
      $trail->push('Landing', route('landing'));
  });
?>
