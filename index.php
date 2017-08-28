<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>
        <form method="POST" action="table.php">
            <label>Nome na URI:</label>
            <input type="text" name="nome_uri" value="product"/>

            <label>Nome na tabela:</label>
            <input type="text" name="nome_tabela" value="products"/>
            <br>
            <hr>
            <br>

            <label>Atributo:</label>
            <label>Valor:</label><br>
            <div id="atributos">
                <input type="text" name="atributo1" value="name"/>
                <input type="text" name="valor1" value="Arroz"/><br>
            </div>
            <br>
            <input type="button" value="+" id="mais">
            <input type="submit" id="enviar" value="Enviar">
        </form>

        <script>
            var num = 2;
            var div = document.getElementById("atributos");

            $('#mais').click(function () {
                var atributo = document.createElement("input");
                var valor = document.createElement("input");
                var br = document.createElement("br");

                atributo.setAttribute("name", "atributo" + num);
                valor.setAttribute("name", "valor" + num);

                

                div.appendChild(atributo);
                div.appendChild(valor);
                div.appendChild(br);

                num = num+1;
            });
        </script>
    </body>
</html>
