/*$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
  columnWidth: '.grid-item'
});*/

/*var $container = $('.grid');
$container.imagesLoaded( function () {
  $container.masonry({
    columnWidth: '.grid-item',
    itemSelector: '.grid-item'
  });   
});*/
 $(document).ready(function(){
    $('.home #categories').masonry({
      // options
      //itemSelector: 'aside',
      //columnWidth: 'aside',
      //itemSelector: 'aside'
  });
});
$(window).load(function() {
    $('.home #categories').masonry({
      // options
      itemSelector: 'aside',
      columnWidth: 'aside'
      //itemSelector: 'aside'
  });
});