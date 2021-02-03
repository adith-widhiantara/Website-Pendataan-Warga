<?php
  Breadcrumbs::for('landing', function ($trail) {
    $trail->push('Halaman Utama', route('landing'));
  });

  Breadcrumbs::for('user.read', function ($trail, $user) {
    $trail->parent('landing');
    $trail->push('Profil Saya', route('user.showAuth', $user -> nip));
  });
?>
