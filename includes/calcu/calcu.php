<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        #openModalBtn {
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        #myModal,
        #segundomodal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ddd;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            z-index: 1;
        }

        #segundomodal {
            z-index: 2;
            width: 80%;
            height: 400px;
            overflow: auto;
        }

        #closeModalBtn,
        #closeSegundoModalBtn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            border: none;
            background: none;
        }

        #opciones {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .option {
            margin: 10px;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .selected {
            background-color: #FFD700;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        #menuDesplegable {
            width: max-content;
            margin: 0 auto;
            margin-bottom: 10px;
            display: none;
            flex-direction: row;
            background-color: #333;
            border-radius: 5px;
            padding: 10px 20px;
            color: #fff;
            z-index: 1;
        }

        #botonMenu {
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        #botonMenu:hover + #menuDesplegable,
        #menuDesplegable:hover {
            display: block;
        }

        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2rem;
            color: #ffffff;
            padding: 2rem 1rem;
            text-align: center;
            letter-spacing: .1rem;
            line-height: 1.4;
        }

        .contenedor {
            width: calc(100% - 2rem);
            display: flex;
            gap: 1rem;
            background-color: rgba(32, 32, 32, 0.795);
            margin: 0.5rem 1rem;
            text-align: center;
            padding: 1rem 0;
        }

        .contenedor div {
            width: auto;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1;
        }

        .contenedor div h2 {
            font-size: 1.2rem;
            font-weight: 300;
        }

        .contenedor div p {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: .1rem;
        }

        .icono {
            height: 100px;
        }

        #contenedor {
            width: 500px;
            height: 300px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        #nombreArchivo {
            margin-top: 10px;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        #contenedorColumnas {
            display: flex;
            justify-content: space-between;
        }

        #columnaModal {
            width: 30%; /* Ajusta según tus necesidades */
        }

        #columnaArchivos {
            width: 30%; /* Ajusta según tus necesidades */
        }

        #columnaClima {
            width: 30%; /* Ajusta según tus necesidades */
        }

        #columnaArchivos {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
          }
      
          #contenedor {
            display: flex;
          }
          
          .columna {
            box-sizing: border-box;
            padding: 10px;
            margin: 5px;
          }
          
          .ancho-30 {
            width: 30%;
          }
          
          .ancho-5 {
            width: 5%;
            display: flex;
            justify-content: center;
            align-items: center;
          }

        #openModalBtn {
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }

        #contenedor {
            width: auto;
            height: auto;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 2px dashed #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        #botonMenu {
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        #menuDesplegable {
            width: 80%;
            margin: 0 auto;
            margin-bottom: 10px;
            display: none;
            flex-direction: row;
            background-color: #333;
            border-radius: 5px;
            padding: 10px 20px;
            color: #fff;
            z-index: 1;
        }

        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2rem;
            color: #ffffff;
            padding: 2rem 1rem;
            text-align: center;
            letter-spacing: .1rem;
            line-height: 1.4;
        }

        .contenedor div {
            width: auto;
            color: #fff;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1;
        }

        .contenedor div h2 {
            font-size: 1.2rem;
            font-weight: 300;
        }

        .contenedor div p {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: .1rem;
        }
        .arrow {
            width: 0;
            height: 0;
            border-top: 20px solid transparent;
            border-bottom: 20px solid transparent;
            border-left: 10px solid #4CAF50; /* Puedes cambiar el color aquí */
          }
          .imgarchivo{
            width: 90%;
          }
    </style>
</head>
<body>
    <div id="contenedorColumnas">
        <div id="columnaModal">
            <h2>Calculadora de recetas</h2>
            <button id="openModalBtn" onclick="openModal()">Calculadora</button>
            <div id="myModal">
                <button id="closeModalBtn" onclick="closeModal()">×</button>
                <div id="opciones">
                    <div class="option" onclick="abrirVentana('Hoja_Gris.html', this)">HOJA GRIS</div>
                    <div class="option" onclick="abrirVentana('hongo(mancha).html', this)">HONGO(MANCHA)</div>
                    <div class="option" onclick="abrirVentana('RANCHA.html', this)">RANCHA</div>
                </div>
            </div>
            <div id="segundomodal">
                <button id="closeSegundoModalBtn" onclick="closeSegundoModal()">×</button>
                <iframe id="iframeSegundoModal" width="100%" height="100%" frameborder="0" src=""></iframe>
            </div>
        </div>

        <div id="columnaArchivos">
            <h2>Archivos</h2>
            <div id="contenedor" ondrop="manejarSoltar(event)" ondragover="permitirSoltar(event)">
              <div class="columna ancho-30">
                <img class="imgarchivo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAdVBMVEX///8AAAC/v79UVFTk5OQJCQnR0dGmpqa6urqMjIz5+fnExMTJycn29vbg4OAYGBhMTEzt7e1DQ0NeXl7X19eysrIQEBB/f38iIiIpKSmOjo5ISEjq6uqqqqocHByXl5c8PDxubm4uLi41NTVpaWl6enqgoKBGNmj3AAADe0lEQVR4nO3da1eqUBSFYUFFBK1AvFBqN+v//8QOZWcIBexgzbUYNd9PDcMNj6JkbnE0Yowxxhhjf6QkCGfCHfxsac36LLlPPUiblW9tK4q2GN5Hu9DaN1ogfUUr4331FQ38dzcmlsAZHmhLDDSAnvdgBoymko7ZJM5rfjW3Es7bNnrrh+2dRykODEndTXZlA0zagKnbOONi2fz9x8eakR6BjIZan2ae3MZ5Lpa9fj8orOqGsjlk3LQJvfR23trt3ceyr6OmZy6TA/9y0yr8Uaew4XH9YiHMZIHN3VgIY01hbiH0NYVTCnHCkx9gO+xshbf49US5pXCnsaLQUjjWWNGEQlQUikUhLArFohAWhWJRCItCsSiERaFYFMKiUCwKYVEoViH0Ao01VdIVWrz7pCw0uBe1hfpvklIoFoWwKBSLQlgUikUhLArFohAWhWINQ7iPF5fFXV7MBZUxPqfoD0MYeuW6zJaszsiNz5cPQ1idxichXJwvH4rwuIwu6zBg6frL4QmvZSebRxQqpC3MRMd3SVlo8MkgXeFEdHS3VIX271tQ+OP+nNBL48bFIfFo0a8BHvE3v1y4uBsLC9O7z9eYwxAioxAWhWJRCItCsSiEpSxMu/z7rl+6QoOXFpybKBeFsCgUi0JYFIpFISwKxaIQFoViUQiLQrEohEWhWBTColAsCmFRKBaFsCgUi0JYFIpFISwKxaIQFoViUQiLQrGGIQxWJ+g8b3uh7035mZmfRaFGFPaLQo0o7BeFGlHYLwo1+nJuk5HguU1Gy+EJy0mfn+Z3Ci/PMWQv3PtxqUXTNWtalIfw9+fLhyFERiEsCsWiEBaFYlEIi0KxKIRFoVgUwqJQLAphUSgWhbAoFItCWBSKRSEsCsWiEBaFYlEIi0KxKIRFoVgUwvobwlxjRaGl0LvHryd6MhV6pzjAdsg9W6FSFEKKNYUqT2nVMk1hl9mcvVtuXDfvuJ58WzZ3Fr5YCL/MeK3ruX5KdPXLPWvTP6l+0cxx65pOGL9yHEN2mrxriePWNc1qP7gN8aiGKuf4MBIQXqmZykVTp81r2kvHTiMYfLvjucBp+/KkdoC10wAPaqCvvTpt4XF99W3Z1unqu/pbaDDEXu327ZuBDP63m/D3uXUoctvVOna0OdRX2t+nGN505Vvb/rcP1jPp/Mx8/2SMMcYYY3q9AV7iPn3PgelUAAAAAElFTkSuQmCC" alt="">
              </div>
              <div class="columna ancho-5">
                <div class="arrow"></div>
              </div>
              <div class="columna ancho-30">
                <img class="imgarchivo" src="data:image/png;base64,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" alt="">
              </div>
              <div class="columna ancho-5">
                <div class="arrow"></div>
              </div>
              <div class="columna ancho-30">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAeFBMVEX///8AAABiYmKxsbH4+PiEhISTk5Pr6+v19fUpKSnBwcFoaGjw8PAbGxvNzc3IyMg2NjZDQ0Pf399XV1e3t7empqaMjIwRERF2dnZ9fX3j4+Orq6skJCSdnZ1ubm5cXFxISEg9PT0xMTEeHh4VFRWAgIBOTk7X19dkCoykAAAFoUlEQVR4nO2d63LaMBBG7dYBQoA4CSEphFualvd/w5K2BFnWylrb2pVnvvOvjFzpBAnd11nWzPIhl+b4HFCuvpg8ifv9dRyLGe5UBPP8VkpxoSSY529Ciis1w/xFRvFOz1Coon5TNJRRVDXM5wKKuoYSisqGAhVV2zC+omG4yYrYZPd1xdidhmH4PW5Of3ENMCJ3/QkYRq6oKRjmP2MqJmEYtS2mYRizoiZiGFExFcP8I5ainuG3m6pirJ8bRcPsVaSiahrainG6flXD7EdVMUqnoWtoK8b4FpUNBdqitqH9LfY/JVY3tBV77xf1DWNX1AQMIyu2MjxP1lviNIzbabQw3D7kH7tTu+zchrZirwM4tuHs8C91u/0xwjBmRWUb7i/JF22yowwjDuC4hstra2mTHWkYry1yDY2/9WOL7GjDaAM4ruHhmv6+RXYew1htkWto7Pn3bZj9qir2NLrRM9yPbWbWFkM/inqGDl6sf/dSUZMyrPE2a5GHRdqG+UOLPCwSN2w3rqiQuuGqRSZVUjes9ylcwgyvW5yG4fTr4/DsTmkabvbH8j9H4wf99vJheXgNHsG9J2g4+x1SktDJlGObW93wQGdvEtoqt8kZfg8syjy0NZ7u3ucNGE1BwDCojn4S3nMVMz+TZ1FDe6xIMu1cli+MeiNgWIYatukeCWQNR6GGPQySL8gaTgKr6bZzUa7IGgYOtJ46l8RA2DCbNZ8jft90LoiJtGGWjR8vrI/X9Jv116edi1FF3tCg49wiDBiygKENDHsBhixgaAPDXlA1NNK33MoPQNXQWGbpnDeJqmHxdkne53TJQtXwazLVPWsaXcNs/HkaYx71Mray4dnxtJ50ztiHumF0YMgChirAkAUMVYAhCxiqAEMWMFQBhixgqAIMWcBQBRiygKEKMGQBQxVgyAKGKsgbTkc3/TOiDxVLGz4GHxNmUlK3NIQNHyP5fUIoChseIxoSl+9kDeOGUnZfYZA1fK4Xq0fcm+Uw7Ncwbi11nzoS/qWJGXU/iV+abB3RkDgCL97jB1/uYvI7kR7/zGI76p8tfdkNI28WMFQBhixgqAIMWcBQBXnD9WIaxMI5ziSedidWMSysMGM+drXIChP6ju0rFYZB2HA2DxfMa5fWx760c+KGu7Ah8y0mVpH87zy7S8GQvZhYmbY3rRC450+yhhuuYWXppSlWi/uWe+IrUZXbQk2GKaxETbmGlUt7y4bE7r0L4V+aD57gz8p1mok/8dydpbAhM7KT9a34qwBxSVO6x18GB+E5s/SU1uallljJMJttd3dB7LaOYJXjkfvp3ZaMaIORNwsYqgBDFjBUAYYsYKiCgmEtuDiBc+GlIBLT2YkbboIPRZWO+d4z9XRJBnmTNtzXC0djx94rfBvI+zQMme8mv6k+/cObmIhlLWvoXQ50UVnobVrHcjdGWcPQKLvu/6ZplacxzxRXokbm00NYiWpaS6pRmbg3rUW6Z/nCEVq5hpWm1dSK3VFghH9LmUvCVr3zV1OiR5TuD1ndxS/7aV93Qb34QHxMs9iXt0GUe8c5p/sn99POxEqGZyZBEA8XnMSfYG7BAoYqwJAFDFWAIQsYqgBDFjBUAYYsYKgCDFnAUAUYsoChCjBkAUMVYMgChj1QnO5dnOhXsw7LsKA3n1aJ3HvqxvidFMzzI7E9MyhD/9shX90PDcmw6U3j7juIQzIcwr2nbgzhtEk3ms4bJXHvqRNNZ1XcTw3JsOFLJMLuDcrQe2qMOmA6LMNsvTqULg4r8pTwwAxbAEMWMFQBhixgqAIMWcBQBRiygKEKMGQBQxVgyAKGKsCQhWG4yYo0MK/L9WqYJDCEIQz16W7o34XWh4j/yYAZE0Ic6qpwOHFfQdId+gUKwey0HbzsugtmE38cXF2efPehw1nGfJNMFx6oyJEmfwD1o287hLeU+gAAAABJRU5ErkJggg==" alt="" class="imgarchivo">
              </div>
            </div>
            <input type="file" id="archivoInput" style="display:none" onchange="mostrarNombreArchivo()">
            <button id="seleccionarButton" onclick="seleccionarArchivo()">Seleccionar Archivo</button>
          </div>
          <div id="externalContent"></div>
          <script>
function loadExternalContent() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("externalContent").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "https://bd02-190-239-93-28.ngrok-free.app", true);
    xhttp.send();
}
loadExternalContent(); // Llamada a la función para cargar el contenido
</script>


        <div id="columnaClima">
            <h2>Clima</h2>
            <button id="botonMenu">Mostrar Clima</button>
    <!-- Menú desplegable -->
            <div id="menuDesplegable" class="contenedor" style="display: none;">
                <div>
                    <h2>Ciudad:</h2>
                    <p id="ciudad-geolocalizada"></p>
                </div>

                <div>
                    <h2>Temperatura:</h2>
                    <!-- El texto personalizado arriba de la imagen -->
                    <p id="temperatura-geolocalizada"></p>
                    <!-- La imagen (icono) debajo del texto personalizado -->
                </div>

                <div>
                    <h2>Humedad:</h2>
                    <p id="humedad-geolocalizada"></p>
                </div>

                <div>
                    <h2>Velocidad del viento:</h2>
                    <p id="viento-geolocalizado"></p>
                </div>
                <div class="caja-ciudad">
                    <h2 id="informacion-geolocalizada"></h2>
                    <img src="" alt="" class="icono">
                </div>
            </div>
        </div>
    </div>
    

    <div class="overlay" id="overlay" onclick="closeOverlay()"></div>

    <script>
        function openModal() {
            var modal = document.getElementById('myModal');
            var overlay = document.getElementById('overlay');
            modal.style.display = 'block';
            overlay.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('myModal');
            var overlay = document.getElementById('overlay');
            modal.style.display = 'none';
            overlay.style.display = 'none';
        }

        function closeSegundoModal() {
            var segundoModal = document.getElementById('segundomodal');
            var overlay = document.getElementById('overlay');
            segundoModal.style.display = 'none';
            overlay.style.display = 'none';
        }

        function closeOverlay() {
            var modal = document.getElementById('myModal');
            var segundoModal = document.getElementById('segundomodal');
            var overlay = document.getElementById('overlay');
            modal.style.display = 'none';
            segundoModal.style.display = 'none';
            overlay.style.display = 'none';
        }

        window.onclick = function (event) {
            var modal = document.getElementById('myModal');
            var segundoModal = document.getElementById('segundomodal');
            var overlay = document.getElementById('overlay');
            if (event.target === modal) {
                closeModal();
            }
            if (event.target === segundoModal) {
                closeSegundoModal();
            }
        };

        function abrirVentana(url, elemento) {
            var contenedorVentana = document.getElementById('segundomodal');
            var iframe = document.getElementById('iframeSegundoModal');
            iframe.src = url;

            var opciones = document.querySelectorAll('.option');
            opciones.forEach(opcion => opcion.classList.remove('selected'));
            elemento.classList.add('selected');

            contenedorVentana.style.display = 'block';

            var overlay = document.getElementById('overlay');
            overlay.style.display = 'block';
        }

        var botonMenu = document.getElementById('botonMenu');
        var menuDesplegable = document.getElementById('menuDesplegable');

        // Función para mostrar u ocultar el menú desplegable
        // Asignar la función al evento click del botón
        botonMenu.addEventListener('click', toggleMenuDesplegable);

        function toggleMenuDesplegable() {
            if (menuDesplegable.style.display === 'block') {
                menuDesplegable.style.display = 'none';
            } else {
                menuDesplegable.style.display = 'block';
            }
        }

        function permitirSoltar(event) {
            event.preventDefault();
            document.getElementById('contenedor').style.border = '2px dashed #4caf50';
        }

        function manejarSoltar(event) {
            event.preventDefault();
            document.getElementById('contenedor').style.border = '2px dashed #ccc';

            var input = document.getElementById('archivoInput');
            input.files = event.dataTransfer.files;

            mostrarNombreArchivo();
        }

        function mostrarNombreArchivo() {
            var input = document.getElementById('archivoInput');
            var nombreArchivo = document.getElementById('nombreArchivo');
            nombreArchivo.textContent = 'Archivo seleccionado: ' + input.files[0].name;
        }

        function seleccionarArchivo() {
            document.getElementById('archivoInput').click();
        }

        // OBTENER ELEMENTOS DEL DOM

        const ciudadGeolocalizada = document.getElementById("ciudad-geolocalizada");
        const temperaturaGeolocalizada = document.getElementById("temperatura-geolocalizada");
        const informacionGeolocalizada = document.getElementById("informacion-geolocalizada");
        const humedadGeolocalizada = document.getElementById("humedad-geolocalizada");
        const vientoGeolocalizado = document.getElementById("viento-geolocalizado");
        const iconoGeolocalizado = document.getElementsByClassName("caja-ciudad");
        const permitirUbicacion = document.getElementById("permitir-ubicacion");

        // Tu clave API de OpenWeather
        const claveAPI = "a38b7193c413acb328bd174709033bb4";

        // Creación de la función Clima
        function clima() {
            if ("geolocation" in navigator) {
                // Localizamos el dispositivo que ingresa a la página
                navigator.geolocation.getCurrentPosition(function (position) {
                    let latitud = position.coords.latitude;
                    let longitud = position.coords.longitude;
                    let url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitud}&lon=${longitud}&appid=${claveAPI}&lang=es&units=metric`;

                    // Realizamos una petición fetch con la url de la API
                    fetch(url)
                        .then(respuesta => respuesta.json())
                        .then(info => {

                            // Introducimos en el DOM los elementos seleccionados
                            let ciudad = info.name;
                            ciudadGeolocalizada.textContent = ciudad;

                            let informacion = info.weather[0].description;
                            informacionGeolocalizada.textContent = informacion.toUpperCase();

                            // El texto personalizado arriba de la imagen
                            let temperatura = info.main.temp;
                            temperaturaGeolocalizada.textContent = `${temperatura} °C`

                            let humedad = info.main.humidity;
                            humedadGeolocalizada.textContent = `${humedad} %`

                            let viento = ((info.wind.speed) * 3.6).toFixed(2);
                            vientoGeolocalizado.textContent = `${viento} Km/h`;

                            let icono = info.weather[0].icon;

                            let img = document.createElement("img");
                            img.src = `http://openweathermap.org/img/wn/${icono}.png`;
                            img.classList.add("icono")
                            iconoGeolocalizado[0].appendChild(img);
                        })
                        .catch(error => console.error(error));
                });
            } else {
                console.log("Geolocalización no disponible en este navegador");
            }
        }

        clima();
    </script>

</body>

</html>
