var statSend = false;
        function checkSubmit() {
            if (!statSend) {
                statSend = true;


   swal({
  title: 'Enviando',
  text: 'Por Favor Espere',
  timer: 30000,
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


    