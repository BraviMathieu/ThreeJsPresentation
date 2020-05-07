
$(document).ready( function (e)
{
  presentation();
});

function presentation()
{
   let presentation = new Presentation();
   presentation.initialize();
   presentation.addSettingsPanel();
   showViewport();
}
function showViewport()
{
  $(".preloaderviewport").css("display", "none");
}
