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
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <?php
    include './functions.php';
    
    $nome_uri = $_POST['nome_uri'];
    $nome_tabela = $_POST['nome_tabela'];
    
    $body_response;
    $response_ok = '{ 
“code”:200, 
“message”:”Ok” 
}
';

    $size = (count($_POST) - 2) / 2;

    

//    for ($i = 1; $i <= $size; $i++) {
//        if ($i = !$size) {
//            
//        } else {
//            
//        }
//    }
    ?>
    <body>
        <h2><?php echo ucfirst($nome_uri); ?></h2>
        <table>
            <tr>
                <th>Method</th>
                <th>URI</th>
                <th>Body(Request)</th>
                <th>Database query</th>
                <th>Body(Response)</th>
            </tr>
            <tr>
                <td width="8%">POST</td>
                <td width="10%">/<?php echo $nome_uri ?>/</td>
                <td><?php echo body_request1($size); ?></td>
                <td width="30%"><?php echo database_query1($size) ?></td>
                <td><?php echo $response_ok ?></td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/<?php echo $nome_uri ?>/</td>
                <td><?php echo body_request2($size); ?></td>
                <td><?php echo database_query2($size) ?></td>
                <td><?php echo $response_ok ?></td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/<?php echo $nome_uri ?>/disable/</td>
                <td><?php echo '{<br>"'.$nome_uri.'Id":1<br>}'; ?></td>
                <td><?php echo database_query3() ?></td>
                <td><?php echo $response_ok ?></td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/<?php echo $nome_uri ?>/</td>
                <td>-</td>
                <td><?php echo database_query4($size) ?></td>
                <td><?php echo body_response1($size) ?></td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/<?php echo $nome_uri.'?'.$nome_uri.'Id=1'; ?></td>
                <td>-</td>
                <td><?php echo database_query5($size); ?></td>
                <td><?php echo body_request1($size); ?></td>
            </tr>
        </table>
    </body>
</html>
