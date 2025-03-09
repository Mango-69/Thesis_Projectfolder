(function ($) {

  $(window).on('load hashchange', function() {

      // First hide all content regions, then show the content-region specified in the URL hash 
      // (or if no hash URL is found, default to first menu item)
      $('.content-region').addClass('hide');
      
      // Remove any active classes on the main-menu
      $('.main-menu a').removeClass('active');
      
      // Get the region from the URL hash or default to the first menu item's href
      var region = location.hash.toString() || $('.main-menu a:first').attr('href');
      
      // Now show the region specified in the URL hash
      $(region).removeClass('hide');
      
      // Add the 'active' class to the clicked menu link
      $('.main-menu a[href="'+ region +'"]').addClass('active'); 

      // Log the background image URL (as per your existing code)
      document.addEventListener('DOMContentLoaded', function() {
          console.log('Background image URL:', getComputedStyle(document.body).backgroundImage);
      });

  });

})(jQuery);
