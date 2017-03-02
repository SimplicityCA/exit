function check_scroll() {
  if($(window).scrollTop() > 57)
  {
    $('header').addClass('is_stuck');
  }
  else
  {
    if($(window).scrollTop() <= 57)
    {
      $('header').removeClass('is_stuck');
    }
  }
}
$( document ).ready(function() {
  check_scroll();
  $( window ).scroll(function() {
    check_scroll();
  });
  $('a.btn-menu').click(function(){
    var $navbar = $('div.collapse.navbar-collapse.menu-container');
    if ($navbar.hasClass('in')) {
      $navbar.removeClass('in');
    }
  });
});