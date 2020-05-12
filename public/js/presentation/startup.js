
$(document).ready( function ()
{
  presentation();
});

function presentation()
{
   let presentation = new Presentation();
   presentation.initialize();
   presentation.addSettingsPanel();
}