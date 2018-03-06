

$(".left-menu").toggleClass("nav-hide", 500);
$(".ticketwindow").hide();



$(document).ready(function() {
  $('#nav-icon').click(function() {
    $(".left-menu").toggleClass("nav-hide", 500);
    $(this).toggleClass('open');
  });
});




  $('.datafilterselector').click(function() {
    $('.popupwindow1').show();
  });
  $('.notify').click(function() {
    $('.notifydrawer').toggle();
  });


  $('.closepopupwindow1').click(function() {
    $('.popupwindow1').hide();
  });


$(".notifydrawer").hide();
$(".ticketwindow").hide();
$(".profilewindow").hide();
$(".profilewindow2").hide();
$(".appsettingswindow").hide();
$(".settingswindow").hide();
$(".popupwindow1").hide();

$(".toggle1").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").show(1000);
  $(".homewindow1").show(1000);
  $(".homewindow2").show(1000);
  $(".charthome").show(1000);
  $(".ticketwindow").hide(1000);
  $(".profilewindow").hide(1000);
  $(".profilewindow2").hide(1000);
  $(".appsettingswindow").hide(1000);
  $(".settingswindow").hide(1000);
  $(".left-menu").toggleClass("nav-hide", 1000);
  $('#nav-icon').toggleClass('open');
});


$(".toggle2").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide(1000);
  $(".homewindow1").hide(1000);
  $(".homewindow2").hide(1000);
  $(".charthome").hide(1000);
  $(".ticketwindow").show(1000);
  $(".profilewindow").hide(1000);
  $(".profilewindow2").hide(1000);
  $(".appsettingswindow").hide(1000);
  $(".settingswindow").hide(1000);
  $(".left-menu").toggleClass("nav-hide", 1000);
  $('#nav-icon').toggleClass('open');
});

$(".toggle3").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide(1000);
  $(".homewindow1").hide(1000);
  $(".homewindow2").hide(1000);
  $(".ticketwindow").hide(1000);
  $(".charthome").hide(1000);
  $(".profilewindow").show(1000);
  $(".profilewindow2").show(1000);
  $(".appsettingswindow").hide(1000);
  $(".settingswindow").hide(1000);
  $(".left-menu").toggleClass("nav-hide", 1000);
  $('#nav-icon').toggleClass('open');
});
$(".toggle4").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide(1000);
  $(".homewindow1").hide(1000);
  $(".homewindow2").hide(1000);
  $(".charthome").hide(1000);
  $(".ticketwindow").hide(1000);
  $(".profilewindow").hide(1000);
  $(".profilewindow2").hide(1000);
  $(".appsettingswindow").show(1000);
  $(".settingswindow").hide(1000);
  $(".left-menu").toggleClass("nav-hide", 1000);
  $('#nav-icon').toggleClass('open');
});

$(".toggle5").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide(1000);
  $(".homewindow1").hide(1000);
  $(".homewindow2").hide(1000);
  $(".charthome").hide(1000);
  $(".ticketwindow").hide(1000);
  $(".profilewindow").hide(1000);
  $(".profilewindow2").hide(1000);
  $(".appsettingswindow").hide(1000);
  $(".settingswindow").show(1000);
  $(".left-menu").toggleClass("nav-hide", 1000);
  $('#nav-icon').toggleClass('open');
});



// filter grid div TicketingSystem
var $btns = $('.btn').click(function() {
  if (this.id == 'all') {
    $('#parent > div').fadeIn(450);
  } else {
    var $el = $('.' + this.id).fadeIn(450);
    $('#parent > div').not($el).hide();
  }
  $btns.removeClass('active');
  $(this).addClass('active');
});



// max char num

var p = $('#dash p');
var ks = $('#dash').height();
while ($(p).outerHeight() > ks) {
  $(p).text(function(index, text) {
    return text.replace(/\W*\s(\S)*$/, '...');
  });
}


$(document).mouseup(function(e)
{
    var container = $('.popupwindow1');

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.hide();
    }
});
