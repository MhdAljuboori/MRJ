$(document).ready(function() {
  $header = $('.website-header');
  $sidebar = $('.sidebar-content');
  $content = $('.website-content');

  if ($header.height() + $sidebar.height() > $content.height()) {
    $content.height($header.height() + $sidebar.height() + 20);
  }
});

