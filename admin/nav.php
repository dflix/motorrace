            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul id="sidebar_menu" class="sidebar-nav">
                    <li class="sidebar-nav"><a id="menu-toggle" href="<?= CONF_URL_APP ?>">Menu<i class="fa fa-bars" title="menu" style="float:right; margin-top: 10px;"></i></a></li>
                </ul>
                <ul class="sidebar-nav" id="sidebar">
                    <li> <a href="<?= CONF_URL_APP ?>/">Dashboard<i class="fas fa-home" title="dashboard" style="float:right; color: #ccc; font-size: 1.2em; margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=usuarios">Usuários<i class="fa fa-user" title="entradas" style="float:right;  font-size: 1.2em; margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=entrada">Entradas<i class="fa fa-plus-square" title="entradas" style="float:right; color: green; font-size: 1.2em; margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=saidas">Saida<i class="fa fa-minus-square" title="saidas" style="float:right; color: red; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=fixas">Fixas<i class="fa fa-star" title="fixas" style="float:right; color: #ccc; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=funcionarios">Funcionários<i class="fa fa-user-cog" title="funcionarios" style="float:right; color: #ccc; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=fornecedores">Fornecedores<i class="fa fa-box" title="fornecedores" style="float:right; color: #ccc; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=carteira">Lojas<i class="fa fa-briefcase" title="lojas" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
<!--                    <li> <a href="">Fixas<i class="fa fa-flag-checkered" title="contas fixas" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: 10px;"></i></a></li> -->
                    <li> <a href="<?= CONF_URL_APP ?>/?p=agenda" title="agenda">Agenda<i class="fa fa-table" title="agenda de eventos" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=perfil">Perfil<i class="fa fa-user-circle" title="perfil de usuario" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: 10px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/?p=estoque">Estoque<i class="fa fa-box" title="estoque" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 

                    <?php
                    if ($_SESSION["nivel"] >= 2) {
                        ?>

             <!--<li> <a href="">Caixa<i class="fa fa-comment" title="orçamento" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 
                        <li> <a href="<?= CONF_URL_APP ?>/?p=orcamento">Orçamentos<i class="fa fa-comment" title="orçamento" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                        <li> <a href="<?= CONF_URL_APP ?>/?p=cliente">OS....<i class="fa fa-heartbeat" title="clientes" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                        <!--<li> <a href="<?= CONF_URL_APP ?>/?p=contrato">Contratos<i class="fa fa-folder" title="contratos" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 
                        <!--<li> <a href="">Financeiro<i class="fa fa-cubes" title="cobranças" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 
                        <!--<li> <a href="">Caix<i class="fa fa-cubes" title="cobranc" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 


                        <!--<li> <a href="">Config<i class="fa fa-asterisk" title="config" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 
                        <!--<li> <a href="">Ponto<i class="fa fa-asterisk" title="ponto" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 

                    <?php } ?>

                    <?php
                    if ($_SESSION["nivel"] >= 2) {
                        ?>

                        <!--<li> <a href="<?= CONF_URL_APP ?>/?p=caixa">Caixa<i class="fas fa-cash-register" title="registro" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 

<!--                        <li> <a href="">Estoque<i class="fa fa-barcode" title="orçamento" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> -->
                        <!--<li> <a href="<?= CONF_URL_APP ?>/?p=produtos"">Produtos<i class="fa fa-barcode" title="produtos" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li>--> 
                        <li> <a href="<?= CONF_URL_APP ?>/?p=post">Posts<i class="fas fa-file-import" title="orçamento" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 

                    <?php } ?>
<!--                    <li> <a href="">Suporte<i class="fa fa-life-ring" title="suporte" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> -->

<!--                    <li> <a href="<?= CONF_URL_APP ?>/assinatura">Assinatura<i class="fa fa-star" title="minha assinatura" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> 
                    <li> <a href="<?= CONF_URL_APP ?>/afiliados">Afiliados<i class="fa fa-magnet" title="afiliados" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: -20px;"></i></a></li> -->
                    <li> <a href="<?= CONF_URL_APP ?>/?p=sair">Sair<i class="fa fa-times-circle" title="sair" style="float:right; color: #ccc ; font-size: 1.2em;margin-top: 10px;"></i></a></li> 


                </ul>
            </div>
