<div class="container-fluid"> 
    <h3 class="text-white">Funcionários </h3>
    
    <?php 
    
    if(!empty($_GET["editar"])){
        
       
        $ver = new Source\Models\Read();
        $ver->ExeRead("app_funcionarios", "WHERE id = :a", "a={$_GET["editar"]}");
        $ver->getResult();
        
        $funcionario = new Source\Core\Funcionarios();
        $funcionario->editar();
        
        
    }elseif(!empty($_GET["deletar"])){
         $funcionario = new Source\Core\Funcionarios();
        $funcionario->deletar();
    }else{
        $funcionario = new Source\Core\Funcionarios();
        $funcionario->cadastra();
    }
    ?>
    
    <form method="post" action=""> 
        <div class="row"> 
        
            <div class="col-md-4"> 
                <label> <b>Nome</b> </label>
                <input type="text" class="form-control" name="nome" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["nome"]}'";
                }
                
                ?> />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>CPF</b> </label>
                <input type="text" class="form-control" name="cpf" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cpf"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>RG</b> </label>
                <input type="text" class="form-control" name="rg" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["rg"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-2"> 
                <label> <b>Nascimento</b> </label>
                <input type="text" class="form-control" name="data_nascimento" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["data_nascimento"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-2"> 
                <label> <b>Cep</b> </label>
                <input type="text" class="form-control" onblur="pesquisacep(this.value);" id="cep" name="cep" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cep"]}'";
                }
                
                ?> />
            </div>
        
            <div class="col-md-8"> 
                <label> <b>Logradouro</b> </label>
                <input type="text" class="form-control" id="logradouro" name="logradouro" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["logradouro"]}'";
                }
                
                ?> />
            </div>
        
            <div class="col-md-2"> 
                <label> <b>Número</b> </label>
                <input type="text" class="form-control" id="numero" name="numero" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["numero"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>Complemento</b> </label>
                <input type="text" class="form-control" id="complemento" name="complemento" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["complemento"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>Bairro</b> </label>
                <input type="text" class="form-control" id="bairro" name="bairro" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["bairro"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>Cidade</b> </label>
                <input type="text" class="form-control" id="cidade" name="cidade" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["cidade"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-3"> 
                <label> <b>UF</b> </label>
                <input type="text" class="form-control" id="uf" name="uf" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["uf"]}'";
                }
                
                ?>  />
            </div>
        
            <div class="col-md-4"> 
                <label> <b>Tipo</b> </label>
                <select name="tipo" class="form-control">
                    <?php 
                
                if(!empty($_GET["editar"])){
                    echo "<option value='{$ver->getResult()[0]["tipo"]}'> {$ver->getResult()[0]["tipo"]} </option>";
                }
                
                ?> 
                    <option value="#"> Tipo de funcionário </option>
                    <option value="1"> Autonomo </option>
                    <option value="2"> Assalariado </option>
                    <option value="3"> Comissionado </option>
                </select>
            </div>
            
                    
            <div class="col-md-4"> 
                <label> <b>Salario</b> </label>
                <input type="text" class="form-control" id="salario" name="salario" <?php 
                
                if(!empty($_GET["editar"])){
                    $salario = number_format($ver->getResult()[0]["salario"] / 100, 2, ",", ".");
                    echo "value='{$salario}'";
                }
                
                ?>  />
            </div>
                    
            <div class="col-md-4"> 
                <label> <b>Dia Pagamento Salario</b> </label>
                <input type="text" class="form-control" id="dia_salario" name="dia_salario" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["dia_salario"]}'";
                }
                
                ?>/>
            </div>
            
                    
            <div class="col-md-2"> 
                <label> <b>Comissão</b> </label>
                <input type="text" class="form-control" id="comissao" name="comissao" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["comissao"]}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-2"> 
                <label> <b>Dia Pgto Comissão</b> </label>
                <input type="text" class="form-control" id="dia_comissao" name="dia_comissao" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["dia_comissao"]}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-2"> 
                <label> <b>Vale Transorte</b> </label>
                <input type="text" class="form-control" id="vale_transporte" name="vale_transporte" <?php 
                
                if(!empty($_GET["editar"])){
                    $vt = number_format($ver->getResult()[0]["vale_transporte"] / 100, 2, ",", ".");
                    echo "value='{$vt}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-2"> 
                <label> <b>Dia Pgto VT</b> </label>
                <input type="text" class="form-control" id="dia_transporte" name="dia_transporte" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["dia_transporte"]}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-2"> 
                <label> <b>Vale Refeição</b> </label>
                <input type="text" class="form-control" id="vale_refeicao" name="vale_refeicao" <?php 
                
                if(!empty($_GET["editar"])){
                    $vr = number_format($ver->getResult()[0]["vale_refeicao"] / 100, 2 , ",", ".");
                    echo "value='{$vr}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-2"> 
                <label> <b>Dia Pgto VR</b> </label>
                <input type="text" class="form-control" id="dia_refeicao" name="dia_refeicao" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["dia_refeicao"]}'";
                }
                
                ?> />
            </div>
                    
            <div class="col-md-4"> 
                <label> <b>Telefone</b> </label>
                <input type="text" class="form-control" id="telefone" name="telefone" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["telefone"]}'";
                }
                
                ?> />
            </div>
            
            <div class="col-md-4"> 
            <label> <b>Status</b> </label>
                <select name="status" class="form-control"> 
                    <?php 
                    if(!empty($_GET["editar"])){
                          echo "<option value='{$ver->getResult()[0]["status"]}'> {$ver->getResult()[0]["status"]} </option>";
                    }
                    ?>
                    <option value="#"> Status </option>
                    <option value="1"> Ativo </option>
                    <option value="0"> Inativo </option>
                    
                </select>
            </div>
            
                                
            <div class="col-md-4"> 
                <label> <b>Função</b> </label>
                <input type="text" class="form-control" id="funcao" name="funcao" <?php 
                
                if(!empty($_GET["editar"])){
                    echo "value='{$ver->getResult()[0]["funcao"]}'";
                }
                
                ?> />
            </div>
            
            <div class="col-md-4"> 
                </br>
            <input type="submit" value="ENVIAR" class="btn btn-success" />
            </div>
            
        
        </div>
    
    </form>
    
    
    
    <table class="table"> 
    
        <thead> 
            <tr> 
                <th> Funcionario </th>
                <th> Tipo </th>
                <th> Função </th>
                <th> Salario </th>
                <th> Comissão </th>
                <th> Vale Transporte </th>
                <th> Vale Refeição </th>
                <th> Status </th>
                <th> Editar </th>
                <th> Deletar </th>
            </tr>
        </thead>
        
        <tbody> 
            <?php 
            $exibe = new Source\Models\Read();
            $exibe->ExeRead("app_funcionarios","ORDER BY id DESC");
            $exibe->getResult();
            foreach ($exibe->getResult() as $valor) {
            ?>
            <tr> 
                <td><?= $valor["nome"] ?> </td>
                <td><?php 
                       $valor["tipo"];
                       if($valor["tipo"] == "1"){
                           echo "Autonomo";
                       }
                       if($valor["tipo"] == "2"){
                           echo "Assalariado";
                       }
                       if($valor["tipo"] == "3"){
                           echo "Comissionado";
                       }
                        ?> </td>
                <td><?= $valor["funcao"] ?> </td>
                <td>R$ <?= number_format($valor["salario"] / 100, 2, ",", ".") ?> </td>
                <td><?= $valor["comissao"] ?> </td>
                <td><?= number_format($valor["vale_transporte"] / 100, 2, ",", ".") ?> </td>
                <td><?= number_format($valor["vale_refeicao"] / 100, 2, ",", ".") ?> </td>
                <td><?php   $valor["status"];
                         if($valor["status"] == "1"){
                           echo "<p class='bg bg-success padding' > Ativo</p>";
                       }
                         if($valor["status"] == "0"){
                           echo "<p class='bg bg-danger padding' > Inativo </p>";
                       }
                        ?> </td>
                  <td> <a href="?&p=funcionarios&editar=<?= $valor["id"] ?>"><i class="fas fa-edit"></i></a></td>
                  <td> <a href="?&p=funcionarios&deletar=<?= $valor["id"] ?>" style="color:red; text-decoration: none;"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    
    </table>
    
    
</div>


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

