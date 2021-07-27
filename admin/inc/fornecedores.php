<div class="container-fluid"> 

    <h3 class="text-white"> Fornecedores </h3>
    
        <?php 
     if(!empty($_GET["editar"])){
         
         $ver = new Source\Models\Read();
         $ver->ExeRead("app_fornecedor", "WHERE id = :a", "a={$_GET["editar"]}");
         $ver->getResult();
         
       //  echo "editar";
         
         $edit = new Source\Core\Fornecedores();
         $edit->editar();
     
         
     }elseif(!empty ($_GET["deletar"])){
         
        $del = new Source\Core\Fornecedores();
        $del->deletar();
       // echo "deletar";
         
      
         
     }else{
         
        $cad = new Source\Core\Fornecedores();
        $cad->cadastra();
        //echo "cadastrar";
         
     }
    ?>
    
    <form action="" method="post"> 
    
        <div class="row"> 
        
            <div class="col-md-8"> 
                <label>Empresa </label>
                <input type="text" class="form-control" name="empresa" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["empresa"]}'";
                }
                ?>/>
            </div>
        
            <div class="col-md-4"> 
                <label>CNPJ </label>
                <input type="text" class="form-control" name="cnpj" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cnpj"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-4"> 
                <label>Telefone </label>
                <input type="text" class="form-control" name="telefone" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["telefone"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-4"> 
                <label>e-mail </label>
                <input type="text" class="form-control" name="email" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["email"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-4"> 
                <label>Site </label>
                <input type="text" class="form-control" name="site" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["site"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-2"> 
                <label>Cep </label>
                <input type="text" class="form-control" onblur="pesquisacep(this.value);" id="cep" name="cep" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cep"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-8"> 
                <label>Logradouro </label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["logradouro"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-2"> 
                <label>Nº</label>
                <input type="text" class="form-control" id="numero" name="numero" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["numero"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-3"> 
                <label>Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["complemento"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-3"> 
                <label>Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["bairro"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-3"> 
                <label>Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cidade"]}'";
                }
                ?> />
            </div>
        
            <div class="col-md-3"> 
                <label>UF</label>
                <input type="text" class="form-control" id="uf" name="uf" <?php 
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["uf"]}'";
                }
                ?> />
            </div>
            
            <div class="col-md-12"> 
                <label>Observações </label>
                <textarea id="summernote" name="obs"><?php 
                if(!empty($_GET["editar"])){
                    echo "{$ver->getResult()[0]["obs"]}";
                }
                ?> </textarea>
                 </br>
                <input type="submit" class="btn btn-success" value="Cadastrar" />
            </div>
        
        
        </div>
    
    </form>

</div>

<table class="table"> 
    <thead> 
        <tr> 
            <th> Empresa</th>
            <th> Telfone</th>
            <th> Email</th>
            <th> Site</th>
            <th> Observações</th>
            <th> Editar</th>
            <th> Deletar</th>
        </tr>
    </thead>
    <tbody> 
        <?php
                    $atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
                    $pager = new Source\Support\Pager("?&p=fornecedores&atual=" , "Primeiro" , "Ultimo" , "1");
                    $pager->ExePager($atual, 5);
                    
                    $exibe = new Source\Models\Read();
                    $exibe->ExeRead("app_fornecedor", "LIMIT :limit OFFSET :offset", "limit={$pager->getLimit()}&offset={$pager->getOffset()}");
                    $exibe->getResult();
                    foreach ($exibe->getResult() as $value) {
        ?>
        <tr> 
            <td> <?= $value["empresa"] ?></td>
            <td> <?= $value["telefone"] ?></td>
            <td> <?= $value["email"] ?></td>
            <td> <?= $value["site"] ?></td>
            <td> 
            
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalreceita<?= $value["id"] ?>">
                                Observações
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="modalreceita<?= $value["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-flag" aria-hidden="true" style="color:green;"></i> Observações</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                              <?= $value["obs"] ?>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><x> Fechar</button>

                                                </div>
                                        </div>
                                    </div>
                                </div>
            
            
            </td>
    <td> <a href="?&p=fornecedores&editar=<?= $value["id"] ?>"><i class="fas fa-edit"></i></a></td>
    <td><a href="?&p=fornecedores&deletar=<?= $value["id"] ?>" style="text-decoration: none; color: red;"> <i class="fas fa-trash-alt"></i></a></td>
        </tr>
                    <?php } ?>
    </tbody>

</table>


               <!-- Adicionando Javascript -->
<script type="text/javascript" >

    function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('logradouro').value = ("");
        document.getElementById('bairro').value = ("");
        document.getElementById('cidade').value = ("");
        document.getElementById('uf').value = ("");

    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value = (conteudo.logradouro);
            document.getElementById('bairro').value = (conteudo.bairro);
            document.getElementById('cidade').value = (conteudo.localidade);
            document.getElementById('uf').value = (conteudo.uf);

        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value = "...";
                document.getElementById('bairro').value = "...";
                document.getElementById('cidade').value = "...";
                document.getElementById('uf').value = "...";


                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    }
    ;

</script>

