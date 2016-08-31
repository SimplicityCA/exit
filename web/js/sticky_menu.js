function check_scroll() {
  if($(window).scrollTop() > 0)
  {
    $('header').addClass('is_stuck');
  }
  else
  {
    if($(window).scrollTop() == 0)
    {
      $('header').removeClass('is_stuck');
    }
  }
}
$( document ).ready(function() {
  console.log( "ready!" );
  check_scroll();
  $( window ).scroll(function() {
    check_scroll();
  });
});