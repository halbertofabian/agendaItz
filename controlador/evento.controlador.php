<?php
class EventoControlador
{
    public static function ctrAgregarEvento()
    {

        if (isset($_POST['btnGuardarEvento'])) {
            //Lo primerito, creamos una variable iniciando curl, pasándole la url
            $ch = curl_init('http://itzagenda.softmormx.com/api/api.php/insertar/evento');

            //especificamos el POST (tambien podemos hacer peticiones enviando datos por GET
            curl_setopt($ch, CURLOPT_POST, 1);

            //le decimos qué paramáetros enviamos (pares nombre/valor, también acepta un array)
            curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);

            //le decimos que queremos recoger una respuesta (si no esperas respuesta, ponlo a false)
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //recogemos la respuesta
            $respuesta = curl_exec($ch);

            //Covertimos a arreglo la respuesta en formato que viene en formato json
            $respuesta = json_decode($respuesta,true);

            
            //o el error, por si falla
            //$error = curl_error($ch);


        


          if ($respuesta['status']) {

               
            echo  '<script>
            swal({
                title: "¡Muy bien!",
                text: "'.$respuesta['message'].'",
                icon: "success",
                buttons: [,true],
                
              })
              .then((willDelete) => {
                if (willDelete) {
                    location.href = "evento"
                }
              });
              
              
            </script>';
            } else {
             
                echo  '<script>
                swal({
                    title: "¡Mal!",
                    text: "No se pudo insertar un registro",
                    icon: "error",
                    buttons: [,true],
                    
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        window.history.back();
                    }
                  });
                  
                  
                </script>';
            }



            
            

            //y finalmente cerramos curl
            curl_close($ch);
        }
    }
}
