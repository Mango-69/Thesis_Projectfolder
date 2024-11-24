
(function ($) {
  

    $(window).on('load hashchange', function(){
      
      // First hide all content regions, then show the content-region specified in the URL hash 
      // (or if no hash URL is found, default to first menu item)
      $('.content-region').hide();
      
      // Remove any active classes on the main-menu
      $('.main-menu a').removeClass('active');
      var region = location.hash.toString() || $('.main-menu a:first').attr('href');
      
      // Now show the region specified in the URL hash
      $(region).show();
      
      $('.main-menu a[href="'+ region +'"]').addClass('active'); 
  
      document.addEventListener('DOMContentLoaded', function() {
        console.log('Background image URL:', getComputedStyle(document.body).backgroundImage);
    });
      
    });
    
  })(jQuery);