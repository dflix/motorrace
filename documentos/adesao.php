<?php

//referenciar o DomPDF com namespace
//use Dompdf\Dompdf;

use Dompdf;

require'../vendor/autoload.php';

//Criando a Instancia

$dompdf = new \Dompdf\Dompdf();
//$dompdf = new DOMPDF();
// $saida = "SAida da Variavel";

$cliente = new \Source\Models\Read();
$cliente->ExeRead("app_clientes", "WHERE cliente_id = :a ",
        "a={$_GET["cliente"]}");
$cliente->getResult();

$nascimento = date("d/m/Y", strtotime($cliente->getResult()[0]["data_nascimento"]));

$endereco = new \Source\Models\Read();
$endereco->ExeRead("app_enderecos", "WHERE cliente_id = :a", 
        "a={$_GET["cliente"]}");
$endereco->getResult();

     //   $pagina = file_get_contents("http://www.rastreadoresprotege.com.br/escritorio/painel/adesao.php?id=3329");
   
    //    $dompdf->load_html($pagina);

// Carrega seu HTML
$dompdf->load_html("
    <style> 
 
            body{    background:#fff;

                     font-family: 'Montserrat','sans-serif'; font-size: 0.8em;}   

</style>
                <body>
			
                        <div style='float:left;width:20%;'>Logotipo </div>
                        <div style='float:right;width:80%; text-align:right;'><span style='color:orange;font-weight:bold;'>Dflix</span>Control 
</br>
<p>Av Itajuibe , 545 apto 22 bloco C</p>
</div>
                        <div style='clear:both;width:100%;'></div>
			<div style='width:100%;background:#ccc;color:#fff;font-size:1.2em; padding:10px;'> 
                        DADOS DO CLIENTE</div>
                        <div style='float:left;width:50%;border-bottom:1px solid #ccc;'> 
                        <b> Nome / Razão Social</b>
                        <p> {$cliente->getResult()[0]["nome"]} </p>
                        </div>
                        <div style='float:left;width:30%;border-bottom:1px solid #ccc;'> 
                        <b> CPF / CNPJ</b>
                        <p> {$cliente->getResult()[0]["cpf"]}{$cliente->getResult()[0]["cnpj"]} </p>
                        </div>
                        <div style='float:left;width:20%;border-bottom:1px solid #ccc;'> 
                        <b> Data Nascimento</b>
                        <p> {$nascimento} </p>
                        </div>

                        <div style='clear:both;width:100%;'></div>

                        <div style='float:left;width:20%;border-bottom:1px solid #ccc;'> 
                        <b> Cep</b>
                        <p> {$endereco->getResult()[0]["cep"]} </p>
                        </div> 
                        <div style='float:left;width:70%;border-bottom:1px solid #ccc;'> 
                        <b> Logradouro</b>
                        <p> {$endereco->getResult()[0]["logradouro"]} </p>
                        </div> 
                        <div style='float:left;width:10%;border-bottom:1px solid #ccc;'> 
                        <b> Numero</b>
                        <p> {$endereco->getResult()[0]["numero"]} </p>
                        </div> 
                        
                          <div style='clear:both;width:100%;'></div>
                          
                        <div style='float:left;width:50%;border-bottom:1px solid #ccc;'> 
                        <b> Complemento</b>
                        <p> .{$endereco->getResult()[0]["complemento"]} </p>
                        </div> 
                          
                        <div style='float:left;width:20%;border-bottom:1px solid #ccc;'> 
                        <b> Bairro</b>
                        <p> {$endereco->getResult()[0]["bairro"]} </p>
                        </div> 
                          
                        <div style='float:left;width:20%;border-bottom:1px solid #ccc;'> 
                        <b> Cidade</b>
                        <p> {$endereco->getResult()[0]["cidade"]} </p>
                        </div> 
                          
                        <div style='float:left;width:10%;border-bottom:1px solid #ccc;'> 
                        <b> UF</b>
                        <p> {$endereco->getResult()[0]["uf"]} </p>
                        </div> 

                        <div style='clear:both;width:100%;'></div>
			<div style='width:100%;background:#ccc;color:#fff;font-size:1.2em; padding:10px;'> 
                        Dados do Pedido</div>
                         
                        <div style='clear:both;width:100%;'></div>



<body>
		");

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "adesao.pdf",
        array(
            "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>