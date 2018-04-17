
$('.datafilterselector').click(function() {
  $('.popupwindow1').show();
});


$('.notify').click(function() {
  $('.notifydrawer').toggle();
});

$(".notifydrawer").hide();
$(".popupwindow1").hide();
$(".formloader").hide();



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

$(document).mouseup(function(e)
{
    var container = $('.notifydrawer');

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

$('.formsubmit').click(function() {
  $('.formloader').show();
});


//login flasher/loading screen
$(document).ready(function() {
  setTimeout(function() {
           		$('.loader').fadeOut('slow');
            }, 10);
});

$("#search").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(7)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});

function replaceURLWithHTMLLinks(text)
    {
      var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
      return text.replace(exp,"<a href='$1'>$1</a>");
    }
replaceURLWithHTMLLinks(comments);


window.remsubject = function (number){
console.log(nummer);


}

//href for user table
