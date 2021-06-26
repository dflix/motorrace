<?php
require'../vendor/autoload.php';

$pedido = new Source\Models\Read();
$pedido->ExeRead("app_pedidos", "WHERE pedido_id = :a", "a={$_GET["pedido"]}");
$pedido->getResult();

//verifica dados do cliente
$cliente = new Source\Models\Read();
$cliente->ExeRead("app_clientes", "WHERE cliente_id = :a", "a={$pedido->getResult()[0]["cliente_id"]}");
$cliente->getResult();

//dados do veiculo
$veiculo = new Source\Models\Read();
$veiculo->ExeRead("app_veiculos", "WHERE pedido_id = :a", "a={$_GET["pedido"]}");
$veiculo->getResult();

//itens do pedido
$itens = new Source\Models\Read();
$itens->ExeRead("app_itens", "WHERE pedido_id = :a", "a={$_GET["pedido"]}");
$itens->getResult();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <title>Ordem de Serviços</title>
    </head>
    <body>

        <table class="table"> 
            <thead> 
                <tr>

                    <th>Auto Center
                        <img src="https://www.hgmrastreadores.com.br/admin/uploads/images/2020/11/logo.webp" width="200" /> </th>
                    <th>Av Gago Coutinho , 544 -Santo André  </th>
                </tr>
            </thead>
        </table>

        <h3> Ordem de Serviços </h3>

        <table class="table"> 
            <thead> 
                <tr> 
                    <th> CLIENTE</th>
                    <th>CPF </th>

                </tr>
            </thead>
            <tbody> 
                <tr> 
                    <td><?= $cliente->getResult()[0]["nome"] ?> </td>
                    <td><?= $cliente->getResult()[0]["cpf"] ?> </td>

                </tr>
            </tbody>

        </table>
        <h3>DADOS VEICULO </h3>
        <table class="table"> 
            <thead> 
                <tr> 
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th>Placa</th>
                </tr>
            </thead>
            <tbody> 
                <tr> 
                    <td><?= $veiculo->getResult()[0]["marca"] ?> </td>
                    <td><?= $veiculo->getResult()[0]["modelo"] ?> </td>
                    <td><?= $veiculo->getResult()[0]["ano"] ?> </td>
                    <td><?= $veiculo->getResult()[0]["cor"] ?> </td>
                    <td><?= $veiculo->getResult()[0]["placa"] ?> </td>
                </tr>
            </tbody>
        </table>

        <h3> Itens do Serviço </h3>
        <table class="table"> 
            <thead>
                <tr>
                    <th>QTD </th>
                    <th>DESCRIÇÃO </th>
                    <th>VALOR UNITARIO </th>
                    <th>VALOR TOTAL </th>
                </tr>
            </thead>



            <tbody>
                <?php
                $total = 0;

                foreach ($itens->getResult() as $value) {
                    $unit = $value["valor_unit"];
                    $valor = $unit * $value["qtd"];
                    ?>
                    <tr> 
                        <td><?= $value["qtd"] ?> </td>
                        <td><?= $value["descricao"] ?> </td>
                        <td><?= number_format($value["valor_unit"] / 100, 2, ".", ",")  ?> </td>
                        <td><?= number_format($valor / 100, 2, ".", ",") ?> </td>
                    </tr>
                    <?php
                    $total += $valor;
                }
                ?>

                <tr> 
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> R$ <?= number_format($total / 100, 2, ".", ".") ?> </td>
                </tr>
            </tbody>
        </table>



        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        -->
    </body>
</html>