jQuery(function($) {

$(document).ready(function() {
  $('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    } else {
      menu.addClass('open');
    }
  });
});

  
$(document).ready(function() {
$('.masonry').masonry({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.item',
  // use element for option
  columnWidth: '.item',
  percentPosition: true
  }); 
});

});