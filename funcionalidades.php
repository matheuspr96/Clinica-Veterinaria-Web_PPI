<?php
include "./php/conexaoBanco.php";
require "./php/lista_contato.php";
require "./php/lista_funcionario.php";
require "./php/lista_agendamento.php";
//require "./php/busca_endereco.php";


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#4CAF50">
    <title>Funcionalidades PET</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:400,700" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Código da página -->
    <link rel="stylesheet" href="styles/funcionalidades.css">
</head>


<body>
    <!-- Barra do topo -->
    <nav class="barra-topo">
        <ul class="barra-topo__lista">
            <li class="barra-topo__item barra-topo__item_nome">Zika-PET </li>
            
            <li class="barra-topo__item barra-topo__item_botao">
                <button class="barra-topo__botao botao redir-home">Voltar</button>
            </li>
            <li data-mostra="list_funcionarios" class="barra-topo__item barra-topo__item_clicavel barra-topo__item_selecionado">
                Funcionários
            </li>
            <li data-mostra="cadast_funcionarios" class="barra-topo__item barra-topo__item_clicavel">
                Novo funcionário
            </li>
            <li data-mostra="list_contatos" class="barra-topo__item barra-topo__item_clicavel">
                Contatos
            </li>
            <li data-mostra="list_agendamento" class="barra-topo__item barra-topo__item_clicavel">
                Agendamentos
            </li>
            <li id="abre-menu" class="barra-topo__item barra-topo__item_clicavel barra-topo__item_mobile">
                <span class="fa fa-bars"></span>
            </li>
        </ul>
    </nav>

    <main class="pagina">
        <!-- Header -->
        <header class="header">
            <h1 class="header__titulo">Zika-PET System</h1>
        </header>

        <!-- Paginas -->
        <!-- Listagem de funcionários cadastrados -->
        <article class="cartao cartao_pag_list_funcionarios cartao_visivel">
            <h2 class="cartao__titulo">Funcionarios cadastrados</h2>
            <table class="table table__responsive">
                <thead>
                    <tr>
                        <th>Nome </th>
                        <th>Sexo </th>
                        <th>Cargo </th>
                        <th>RG </th>
                        <th>Logradouro </th>
                        <th>Bairro </th>
                        <th>Cidade </th>
                    </tr>
                </thead>
                <!-- EMMET: tbody>tr*20>td{Nome $}+td{M}+td{Cargo $}+td{87436$}+td{Logradouro $}+td{Bairro $}+td{Cidade $} -->
                <tbody>
                <?php

                if ($arrayFuncionarios != "")
                {

                    foreach ($arrayFuncionarios as $funcionario)
                    {       
                    echo "
                    <tr>
                        <td>$funcionario->nome</td>
                        <td>$funcionario->sexo</td>
                        <td>$funcionario->cargo</td>
                        <td>$funcionario->rg</td>
                        <td>$funcionario->lougradoro</td>
                        <td>$funcionario->bairro</td>
                        <td>$funcionario->cidade</td>
                    </tr>      
                    ";
                    }
                }
                ?>    
                </tbody>
            </table>
            <?php

            if ($msgErro != "")
            echo "<p class='r'>A operação não pode ser realizada: $msgErro</p>";
            ?>
 

        </article>

        <!-- Listagem de Agendamentos de clientes -->
        <article class="cartao cartao_pag_list_agendamento">
            <h2 class="cartao__titulo">Listagem de agendamento</h2>
            <table class="table table__responsive">
                <thead>
                    <tr>
                        <th>Nome Médico</th>
                        <th>Especialidade</th>
                        <th>Hora</th>
                        <th>Data</th>
                        <th>Nome Paciente</th>
                        <th>Contato</th>
                    </tr>
                </thead>

                <tbody>
                <?php

                        if ($arrayAgenda != "")
                        {
                            foreach ($arrayAgenda as $agenda)
                            {       
                            echo "
                            <tr>
                                <td>$agenda->nome</td>
                                <td>$agenda->especialidade</td>
                                <td>$agenda->hora</td>
                                <td>$agenda->data</td>
                                <td>$agenda->nomePac</td>
                                <td>$agenda->contato</td>
                            </tr>      
                            ";
                            }
                        }
                    ?>
                </tbody>
            </table>
                <?php

                if ($msgErro != "")
                    echo "<p class='r'>A operação não pode ser realizada: $msgErro</p>";
                ?>
        </article>

        <article class="cartao cartao_pag_cadast_funcionarios">
            <h2 class="cartao__titulo">Cadastro de funcionarios</h2><br><br>
            <form id="formCadastroFuncionario" class="form"  false;">
                <h3 class="cartao__subtitulo">Dados Pessoais</h3>

                <div class="row">
                    <div class="col-8">
                        <label for="funcionario__nome" class="form__label">Nome</label><br>
                        <input type="text" name="funcionario__nome" id="funcionario__nome" class="form__text-field">
                    </div>

                    <div class="col-4">
                        <label for="funcionario__data" class="form__label">Data de Nascimento</label><br>
                        <input type="date" name="funcionario__data" id="funcionario__data" class="form__text-field">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label class="form__label">Sexo</label><br>
                        <input type="radio" name="funcionario__sexo" value="m" class="form__checkbox" id="funcionario__sexo_m">
                        <label for="funcionario__sexo_m" class="form__cb-label">Masculino</label><br>
                        <input type="radio" name="funcionario__sexo" value="f" class="form__checkbox" id="funcionario__sexo_f">
                        <label for="funcionario__sexo_f" class="form__cb-label">Feminino</label>
                    </div>

                    <div class="col-4">
                        <label class="form__label">Estado Civil</label><br>
                        <input type="radio" name="estado__civil" id="m_solteiro" class="form__checkbox">
                        <label for="m_solteiro" class="form__cb-label">Solteiro</label><br>
                        <input type="radio" name="estado__civil" id="m_casado" class="form__checkbox">
                        <label for="m_casado" class="form__cb-label">Casado</label>
                    </div>

                    <div class="col-4">
                        <label for="esp__medica">Especialidade Medica</label><br>
                        <select name="esp__medica" id="esp__medica" class="form__select">
                            <option value="Neurologista">Neurologista</option>
                            <option value="Oftamologista">Oftamologista</option>
                            <option value="Cirurgiao">Cirurgião</option>
                            <option value="Veterinariogeral">Veterinário geral</option>
                            <option value="Enfermeiro">Enfermeiro</option>
                        </select>
                    </div>
                </div>

                <h3 class="cartao__subtitulo">Documentos</h3>
                <div class="row">
                    <div class="col-4">
                        <label class="form__cpf">CPF</label><br>
                        <input type="text" name="form__cpf" id="form__cpf" class="form__text-field">
                    </div>
                    <div class="col-4">
                        <label class="form__rg">RG</label><br>
                        <input type="text" name="form__rg" id="form__rg" class="form__text-field">
                    </div>
                    <div class="col-4">
                        <label class="form__titulo-eleitor">Titulo Eleitor</label><br>
                        <input type="text" name="form__titulo-eleitor" id="form__titulo-eleitor" class="form__text-field">
                    </div>
                </div>

                <h2 class="cartao__titulo">Endereço</h2>
                <div class="row">
                    <div class="col-4">
                        <label for="form__cep">CEP</label><br>
                        <input type="text" name="form__cep" id="form__cep" class="form__text-field" placeholder="xxxxx-xx" onkeyup="buscaEndereco(this.value);">
                    </div>
                    <div class="col-8"></div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <label for="tipo__logradouro">Tipo do Logradouro</label><br>
                        <select name="tipo__logradouro" id="tipo__logradouro" class="form__select">
                            <option value="rua">Rua</option>
                            <option value="avenida">Avenida</option>
                            <option value="praca">Praça</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="logradouro">Logradouro</label><br>
                        <input type="text" name="logradouro" id="logradouro" class="form__text-field">
                    </div>
                    <div class="col-3">
                        <label for="numero">Numero</label><br>
                        <input type="text" name="numero" id="numero" class="form__text-field">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="complemento">Complemento</label><br>
                        <input type="text" name="complemento" id="complemento" class="form__text-field">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <label for="logradouro">Bairro</label><br>
                        <input type="text" name="bairro" id="bairro" class="form__text-field">
                    </div>
                    <div class="col-6">
                        <label for="cidade">Cidade</label><br>
                        <input type="text" name="cidade" id="cidade" class="form__text-field">
                    </div>
                    <div class="col-2">
                        <label for="estado">Estado</label><br>
                        <input type="text" name="estado" id="estado" class="form__text-field">
                    </div>
                </div>
                <br>
                <button id="btnCadastraFuncionario" type="button" onclick="sendFormfuncionario();" class="form__botao botao" >Enviar</button>
            </form>
            
            <div class="mensagemSucesso" id="divSuccessMsg">
                <strong>Cadastro realizado com sucesso: </strong><span id="successMsg"></span>
            </div>
    
            <div class="mensagemErro" id="divErrorMsg">
                <strong>A operação não pode ser realizada: </strong><span id="errorMsg"></span>
            </div>
        </article>


        <article class="cartao cartao_pag_list_contatos ">
            <h2 class="cartao__titulo">Listar contatos</h2>
            <table class="table table__responsive">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Motivo</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>
                <!-- EMMET: tbody>tr*20>td{Nome $}+td{email@domain.tld}+td{Motivo $}+td>lorem5 -->
                <tbody>
	            <?php
	
                if ($arrayContato != "")
                {
                    foreach ($arrayContato as $contato)
                    {       
                    echo "
                    <tr>
                        <td>$contato->nome</td>
                        <td>$contato->email</td>
                        <td>$contato->motivo</td>
                        <td>$contato->mensagem</td>
                    </tr>      
                    ";
                    }
                }
		
		?>    
		
        </tbody>
    </table>
  
    <?php
        if ($msgErro != "")
        echo "<p class=''>A operação não pode ser realizada: $msgErro</p>";
 
    ?>
        </article>

        <footer class="footer"></footer>
    </main>

    <aside class="menu menu_escondido">
		<div class="menu__fundo"></div>
		<div class="menu__superficie">
			<ul class="menu__lista">
				<li data-mostra="list_funcionarios" class="menu__item">Listar Funcionarios</li>
				<li data-mostra="cadast_funcionarios" class="menu__item">Cadastrar Funcionarios</li>
				<li data-mostra="list_contatos" class="menu__item">Listar Contatos</li>
				<li data-mostra="list_agendamento" class="menu__item">Listar Agendamentos</li>
				<li class="menu__item redir-home">Home</li>
			</ul>
			<span class="menu__fechar fa fa-close"></span>
		</div>s
	</aside>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="scripts/funcionalidades.js"></script>
</body>