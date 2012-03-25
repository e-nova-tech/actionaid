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
  var slide_current = 0;
  var slide_min = 0;
  var slide_max = 4;
  var fade_interval = 500;

  var content = [
    {
      "author"  : "Eshwaramma",
      "quote"   : "I like to help people and that makes me happy.",
      "context" : "Eshwaramma is a campaigner for children with disabilities, winner of the International Diana Award. This 18 year old quadriplegic was also a sponsored child when she was younger. She is a perfect example of the difference you can make with a child sponsorship.",
      "image"   : "img/appeals/sponsor-a-child/slide0.jpg"
    },
    {
      "author"  : "Rajashekar",
      "quote"   : "I am happy I do not have to leave school and friends",
      "context" : "Rajasekar is an active member of the children’s group is his village who were instrumental in bringing awareness in the community of the problem of migration which enabled the people to negotiate with the local government for regular employment under the NREGA.",
      "image"   : "img/appeals/sponsor-a-child/slide1.jpg"
    },
    {
      "author"  : "Kavitha",
      "quote"   : "We stopped discrimination in our School, now we all sit, play and eat together",
      "context" : "Kavitha is a 11 year old dalit girl from Bamini village Bhopal. She is studying in class 5. ActionAid works with the community to ensure the right to access to education to all is respected.",
      "image"   : "img/appeals/sponsor-a-child/slide2.jpg"
    },
    {
      "author"  : "Kiran",
      "quote"   : "I could raise my voice against the violence in our school",
      "context" : "Public hearings organized ActionAid and Bachpan provide a platform for children like Kiran to speak out. The NCPCR (National Commission for Protection of Child rights) immediately passed an order to the education department to look into the matter. The teacher’s behavior has stopped.",
      "image"   : "img/appeals/sponsor-a-child/slide3.jpg"
    },
    {
      "author"  : "Aneesha",
      "quote"   : "I enjoyed drawing for our donors very much. I look forward for drawing classes in my school.",
      "context" : "Like the message mentionned by Aneesha, a 7 year old girl living in Dyaneshwar Nagarut, you will receive messages that will keep you in touch with the community the child lives in.",
      "image"   : "img/appeals/sponsor-a-child/slide4.jpg"
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
      $(img).attr('src',images[imagesLoaded].image);
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
      $(this).css({'background-image' : 'url('+content[slide_current].image+')'})
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
         .css({'background-image' : 'url('+content[slide_current].image+')'});
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
         .css({'background-image' : 'url('+content[slide_current].image+')'});
       if (slide_current < slide_max) {
         slide_current = slide_current + 1;
       } else {
         slide_current = slide_min;
       }
       switchSlide();
       return false;
    });
  });
});
