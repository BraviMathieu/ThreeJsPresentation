document.addEventListener("DOMContentLoaded", function(event) {
  presentation();
});

function presentation(){
   let presentation = new Presentation();
   presentation.initialize();
   presentation.addSettingsPanel();
}