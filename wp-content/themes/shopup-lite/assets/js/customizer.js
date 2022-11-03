 (function($) {
     const shopup_lite_section_lists = ['double-image-promo'];
     shopup_lite_section_lists.forEach(shopup_lite_homepage_scroll_preview);

     function shopup_lite_homepage_scroll_preview(item, index) {
         console.log(item);
         // Collect information from customize-controls.js about which panels are opening.
         wp.customize.bind('preview-ready', function() {

             // Initially hide the theme option placeholders on load.
             $('.panel-placeholder').hide();
             item = item.replace(/-/g, '_');
             wp.customize.preview.bind(item, function(data) {
                 // Only on the front page.
                 if (!$('body').hasClass('home')) {
                     return;
                 }

                 // When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
                 if (true === data.expanded) {
                     $('html, body').animate({
                         'scrollTop': $('#shopup_' + item + '_section').position().top
                     });
                 }
             });

         });
     }
 }(jQuery));