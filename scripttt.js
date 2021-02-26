/*
 * Url preview script 
 * powered by jQuery (https://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * edited by Daan van der Zwaag (https://dvdz.design)
 *
 */

function previewImages() {
  /* CONFIG */

  xOffset = 200;
  yOffset = 80;

  // these 2 variable determine popup's distance from the cursor
  // you might want to adjust to get the right result

  /* END CONFIG */

  $("a.screenshot").hover(function(e) {

      var $this = $(this); // caching $(this)
    
      $this.data('initialText', $this.text());

      
      $("body").append("<div id='previewImage'><img src='" + this.rel + "' alt='rens preview image' />" + "</div>");

      $("#previewImage")
        .css("top", (e.pageY - xOffset) + "px")
        .css("left", (e.pageX + yOffset) + "px")
        .fadeIn("fast");
    },
    function() {

      var $this = $(this); // caching $(this)
      $this.text($this.data('initialText'));

      $("#previewImage").remove();
    });

  $("a.screenshot").mousemove(function(e) {
    
    $("#previewImage")
      .css("top", (e.pageY - xOffset) + "px")
      .css("left", (e.pageX + yOffset) + "px");
    
  });
};

  previewImages();


