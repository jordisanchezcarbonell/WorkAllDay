AOS.init({
  duration: 1200,
})
// Wrap every letter in a span   (el, i) => 70*i
var textWrapper = document.querySelector('.ml2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 600,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 600,
    easing: "easeOutExpo",
    delay: 1000
  });

var statSend = false;
        function checkSubmit() {
            if (!statSend) {
                statSend = true;


   swal({
  title: 'Enviando',
  text: 'Por Favor Espere',
  timer: 1000,
 // imageUrl: "cargando.gif", si quieres agregarle una imagen //personalizada
 // imageWidth: 400, anchura de la img
 // imageHeight: 200, alto de la img
 // imageAlt: 'Custom image', otra imagen debajo 
  onOpen: () => {
    swal.showLoading()
  }
}).then((result) => {
  if (

    result.dismiss === swal.DismissReason.timer
  ) {

  }
})




                return true;
            } else {
                swal("Por favor espere", 
    "El formulario se esta enviando",
     "success");
                return false;
            }
        }


    
//

$('#circleDrop').click(function(){
  $('.card-middle').slideToggle();
  $('.close').toggleClass('closeRotate');
});


