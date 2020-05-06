
$(document).ready( function (e)
{
  impressionist();
});
var loggedinstate;

function impressionist()
{
   impressionist = new Impressionist();
   impressionist.initialize();
   impressionist.addSettingsPanel( " " );
   loggedinstate = true;
   setTimeout(showViewport, 1000);
}
function showViewport()
{
  $(".preloaderviewport").css("display", "none");
}
