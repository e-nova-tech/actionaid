/**
 * Jquery Awesomeness for child sponsorhip appeal
 *
 * @package     app.webroot.js.sponsor-a-child
 * @copyright   Copyright 2012, ActionAid Association India 
 * @link        http://actionaid.org/india
 * @author      Remy Bertot / Kevin Muller
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$(function() {
  if($(window).width() <= 1024){
    $(".ctrl").css('display', 'none');
  }
  else{
    var slide_current = 0;
    var slide_min = 0;
    var slide_max = 4;
    var fade_interval = 500;
    var DS = "/";
    var url_base = "img/appeals/sponsor-a-child";
    var resolution = "960";
  
    var content = [
      {
        "author"  : "Ramratan",
        "quote"   : "I am now an Upsarpanch in my BalPanchayat.",
        "context" : "Ramratan, an ActionAid supported child, hails from Sangwara village in Madhya Pradesh and is part of the Balpanchayat. This is a children parliament that among various things convinces parents to send their children to school.",
        "image"   : "slide0.jpg"
      },
      {
        "author"  : "Shanno",
        "quote"   : "We play hide and seek at school. It’s fun.",
        "context" : "ActionAid intervention in her village has enabled Shanno and her friends from Dabokpura village in Dhaulpur to attend school regularly. One of the ActionAid supported children in her community, Shanno is an example of how your donations can make a difference.",
        "image"   : "slide1.jpg"
      },
      {
        "author"  : "Shazia",
        "quote"   : "I want to become a teacher when I grow up.",
        "context" : "Shazia, an ActionAid supported child hails from Banglore. Here along with BRIDGE we have been executing projects in 26 wards -39 slums, aimed at promoting community leadership & generating awareness about rights of women and children, thus making dreams of these little ones a reality.",
        "image"   : "slide2.jpg"
      },
      {
        "author"  : "Sivraj",
        "quote"   : "I tell them not to skip school ever. Like me.",
        "context" : "Sivraj is one of the sponsored children in Singrai Village who is attending the nearby middle school regularly. He is a student of class five. Boys like Manoj and Banti started attending school due to the steps taken by Bal-Panchyat, where Shivraj is a member.",
        "image"   : "slide3.jpg"
      },
      {
        "author"  : "Rinki",
        "quote"   : "I like to read Hindi subjects most.",
        "context" : "Rinki comes from an impoverished family from Pitampura in MadhyaPradesh. ActionAid’s continuous work in her community, made possible by our donors has made school accessible to Rinki and her friends.",
        "image"   : "slide4.jpg"
      }
    ];
  
    // Image slideshow preloader
    function loadImages(images, callback) {
      //Keep track of the images that are loaded
      var imagesLoaded = 0;
  
      // When a picture finish loading
      function _imageLoaded() {
        imagesLoaded++;
        // If all images loaded do the callback
        // Else recursive call to load the next pix
        if(imagesLoaded == images.length) {
          callback();
        } else {
          _loadImages();
        }
      }
      // Load one picture after the other
      function _loadImages() {
        //Create an temp image and load the url
        var img = new Image();
        var url = url_base+DS+resolution+DS+images[imagesLoaded].image;
        $(img).attr('src',url);
        // don't reload cached images
        if (img.complete || img.readyState === 4) {
          _imageLoaded();
        } else {
          $(img).load(function() {
            _imageLoaded();
          });
        }
      };
      // Start 
      _loadImages();
    }
  
    // switch slides
    function switchSlide() {
      // fade out, put new content on front and fade in 
      $("#slideshow").animate({'opacity' : '0'}, fade_interval, function() {
        $('.slide.caption .author').text(content[slide_current].author);
        $('.slide.caption .quote').text("“"+content[slide_current].quote+"”");
        $('.slide.caption .context').text(content[slide_current].context);
        $(this).css({'background-image' : 'url('+url_base+DS+resolution+DS+content[slide_current].image+')'})
          .animate({'opacity' : '1'},fade_interval);
      });
    }
  
    // MAIN Entry Point
    // Load pictures before showing arrows
    loadImages(content,function(){
      $("#slideshow .arrow")
        .css({'display' : 'block'})
        .animate({'opacity' : '1'},fade_interval * 5);;
  
      // bind click events on arrow
      $("#js_ctrl-next").click(function(c){
         // switch old image from front to back for better visual effect
         $("#slideshow_container")
           .css({'background-image' : 'url('+url_base+DS+resolution+DS+content[slide_current].image+')'});
         if (slide_current > slide_min) {
           slide_current = slide_current - 1;
         } else {
           slide_current = slide_max;
         }
         switchSlide();
         return false;
      });
      $("#js_ctrl-prev").click(function(c){
         $("#slideshow_container")
           .css({'background-image' : 'url('+url_base+DS+resolution+DS+content[slide_current].image+')'});
         if (slide_current < slide_max) {
           slide_current = slide_current + 1;
         } else {
           slide_current = slide_min;
         }
         switchSlide();
         return false;
      });
    });
  }

  // faq accordion
	$('.accordion h4').click(function() {
		$(this).next().toggle();
		return false;
	}).next().hide();
});
