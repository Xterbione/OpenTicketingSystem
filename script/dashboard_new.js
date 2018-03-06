
$('.datafilterselector').click(function() {
  $('.popupwindow1').show();
});


$('.notify').click(function() {
  $('.notifydrawer').toggle();
});

$(".notifydrawer").hide();
$(".popupwindow1").hide();


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



//href for user table
