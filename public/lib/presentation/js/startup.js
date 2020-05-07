
$(document).ready( function (e)
{
  impressionist();
});

function impressionist()
{
   impressionist = new Impressionist();
   impressionist.initialize();
   impressionist.addSettingsPanel( " ");
   showViewport();
}
function showViewport()
{
  $(".preloaderviewport").css("display", "none");
}
