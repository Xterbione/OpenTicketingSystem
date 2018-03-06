
$('.datafilterselector').click(function() {
  $('.popupwindow1').show();
});


$('.notify').click(function() {
  $('.notifydrawer').toggle();
});

$(".notifydrawer").hide();
$(".popupwindow1").hide();
$(".homewindow").show();
$(".homewindow1").show();
$(".homewindow2").show();
$(".charthome").show();
$(".ticketwindow").hide();
$(".profilewindow").hide();
$(".profilewindow2").hide();
$(".appsettingswindow").hide();
$(".settingswindow").hide();
$(".left-menu").toggleClass("nav-hide", );
$('#nav-icon').toggleClass('open');

$(".toggle1").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").show();
  $(".homewindow1").show();
  $(".homewindow2").show();
  $(".charthome").show();
  $(".ticketwindow").hide();
  $(".profilewindow").hide();
  $(".profilewindow2").hide();
  $(".appsettingswindow").hide();
  $(".settingswindow").hide();
  $(".left-menu").toggleClass("nav-hide", );
  $('#nav-icon').toggleClass('open');
});


$(".toggle2").click(function() {
  $(".notifydrawer").hide(1000);
  $(".popupwindow1").hide(1000);
  $(".homewindow").hide(1000);
  $(".homewindow1").hide(1000);
  $(".homewindow2").hide(1000);
  $(".charthome").hide(1000);
  $(".ticketwindow").show(1000);
  $(".profilewindow").hide(1000);
  $(".profilewindow2").hide(1000);
  $(".appsettingswindow").hide(1000);
  $(".settingswindow").hide(1000);
  $('#nav-icon').toggleClass('open');
});

$(".toggle3").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide();
  $(".homewindow1").hide();
  $(".homewindow2").hide();
  $(".ticketwindow").hide();
  $(".charthome").hide();
  $(".profilewindow").show();
  $(".profilewindow2").show();
  $(".appsettingswindow").hide();
  $(".settingswindow").hide();
});
$(".toggle4").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide();
  $(".homewindow1").hide();
  $(".homewindow2").hide();
  $(".charthome").hide();
  $(".ticketwindow").hide();
  $(".profilewindow").hide();
  $(".profilewindow2").hide();
  $(".appsettingswindow").show();
  $(".settingswindow").hide();
});

$(".toggle5").click(function() {
  $(".notifydrawer").hide();
  $(".popupwindow1").hide();
  $(".homewindow").hide();
  $(".homewindow1").hide();
  $(".homewindow2").hide();
  $(".charthome").hide();
  $(".ticketwindow").hide();
  $(".profilewindow").hide();
  $(".profilewindow2").hide();
  $(".appsettingswindow").hide();
  $(".settingswindow").show();
});
//hide div outside div click
$(document).mouseup(function(e)
{
    var container = $('.popupwindow1');

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        container.hide();
    }
});
        //filter selector
$('.closepopupwindow1').click(function() {
  $('.popupwindow1').hide();
});


//login flasher/loading screen
$(document).ready(setTimeout(function() {
           		$('.loader').fadeOut('slow');
}),2000);



//href for user table
