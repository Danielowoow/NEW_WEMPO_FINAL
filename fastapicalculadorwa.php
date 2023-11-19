<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simple</title>
    <script>
        function calcular() {
            var number1 = document.getElementById("number1").value;
            var number2 = document.getElementById("number2").value;
            var operation = document.getElementById("operation").value;

            var xhr = new XMLHttpRequest();
            var url = "http://127.0.0.1:8000/calculate?number1=" + number1 + "&number2=" + number2 + "&operation=" + operation;

            xhr.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        var responseData = JSON.parse(this.responseText);
                        document.getElementById("resultado").innerHTML = "El resultado es: " + responseData.resultado;
                    } else {
                        document.getElementById("resultado").innerHTML = "Error en la solicitud: " + this.status + " " + this.statusText;
                    }
                }
            };

            xhr.onerror = function () {
                document.getElementById("resultado").innerHTML = "Error en la solicitud AJAX.";
            };

            xhr.open("GET", url, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Calculadora Simple</h1>

    <form onsubmit="event.preventDefault(); calcular();">
        Número 1: <input type="number" id="number1" name="number1" required><br>
        Número 2: <input type="number" id="number2" name="number2" required><br>
        Operación: 
        <select id="operation" name="operation">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="division">División</option>
        </select><br>
        <input type="submit" value="Calcular">
    </form>

    <p id="resultado"></p>
</body>
</html>
