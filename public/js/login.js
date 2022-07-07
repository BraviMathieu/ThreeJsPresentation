document.querySelectorAll(".info-item .btn").forEach(function(element){
  element.addEventListener('click',function(e){
    document.querySelector(".container-custom").classList.toggle("log-in");
  })
})