jQuery( 'iframe[src*="youtube.com"]').wrap("<div class='flex-video widescreen'/>");
jQuery( 'iframe[src*="vimeo.com"]').wrap("<div class='flex-video widescreen vimeo'/>");

$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 603) {
    $('.page-template-homepage .top-bar').addClass("fixed");
  } else {
    $('.page-template-homepage .top-bar').removeClass("fixed");
  }
});