
$(document).ready( function (e)
{
  impressionist();
});

function impressionist()
{
   impressionist = new Impressionist();
   impressionist.initialize();
   impressionist.addSettingsPanel( " ");
   setTimeout(showViewport, 1000);
}
function showViewport()
{
  $(".preloaderviewport").css("display", "none");
}
