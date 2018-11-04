
<?php
require "./php/lista_contato.php";
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
                    <tr>
                        <td>Nome 1</td>
                        <td>M</td>
                        <td>Cargo 1</td>
                        <td>874361</td>
                        <td>Logradouro 1</td>
                        <td>Bairro 1</td>
                        <td>Cidade 1</td>
                    </tr>
                    <tr>
                        <td>Nome 2</td>
                        <td>M</td>
                        <td>Cargo 2</td>
                        <td>874362</td>
                        <td>Logradouro 2</td>
                        <td>Bairro 2</td>
                        <td>Cidade 2</td>
                    </tr>
                    <tr>
                        <td>Nome 3</td>
                        <td>M</td>
                        <td>Cargo 3</td>
                        <td>874363</td>
                        <td>Logradouro 3</td>
                        <td>Bairro 3</td>
                        <td>Cidade 3</td>
                    </tr>
                    <tr>
                        <td>Nome 4</td>
                        <td>M</td>
                        <td>Cargo 4</td>
                        <td>874364</td>
                        <td>Logradouro 4</td>
                        <td>Bairro 4</td>
                        <td>Cidade 4</td>
                    </tr>
                    <tr>
                        <td>Nome 5</td>
                        <td>M</td>
                        <td>Cargo 5</td>
                        <td>874365</td>
                        <td>Logradouro 5</td>
                        <td>Bairro 5</td>
                        <td>Cidade 5</td>
                    </tr>
                    <tr>
                        <td>Nome 6</td>
                        <td>M</td>
                        <td>Cargo 6</td>
                        <td>874366</td>
                        <td>Logradouro 6</td>
                        <td>Bairro 6</td>
                        <td>Cidade 6</td>
                    </tr>
                    <tr>
                        <td>Nome 7</td>
                        <td>M</td>
                        <td>Cargo 7</td>
                        <td>874367</td>
                        <td>Logradouro 7</td>
                        <td>Bairro 7</td>
                        <td>Cidade 7</td>
                    </tr>
                    <tr>
                        <td>Nome 8</td>
                        <td>M</td>
                        <td>Cargo 8</td>
                        <td>874368</td>
                        <td>Logradouro 8</td>
                        <td>Bairro 8</td>
                        <td>Cidade 8</td>
                    </tr>
                    <tr>
                        <td>Nome 9</td>
                        <td>M</td>
                        <td>Cargo 9</td>
                        <td>874369</td>
                        <td>Logradouro 9</td>
                        <td>Bairro 9</td>
                        <td>Cidade 9</td>
                    </tr>
                    <tr>
                        <td>Nome 10</td>
                        <td>M</td>
                        <td>Cargo 10</td>
                        <td>8743610</td>
                        <td>Logradouro 10</td>
                        <td>Bairro 10</td>
                        <td>Cidade 10</td>
                    </tr>
                    <tr>
                        <td>Nome 11</td>
                        <td>M</td>
                        <td>Cargo 11</td>
                        <td>8743611</td>
                        <td>Logradouro 11</td>
                        <td>Bairro 11</td>
                        <td>Cidade 11</td>
                    </tr>
                    <tr>
                        <td>Nome 12</td>
                        <td>M</td>
                        <td>Cargo 12</td>
                        <td>8743612</td>
                        <td>Logradouro 12</td>
                        <td>Bairro 12</td>
                        <td>Cidade 12</td>
                    </tr>
                    <tr>
                        <td>Nome 13</td>
                        <td>M</td>
                        <td>Cargo 13</td>
                        <td>8743613</td>
                        <td>Logradouro 13</td>
                        <td>Bairro 13</td>
                        <td>Cidade 13</td>
                    </tr>
                    <tr>
                        <td>Nome 14</td>
                        <td>M</td>
                        <td>Cargo 14</td>
                        <td>8743614</td>
                        <td>Logradouro 14</td>
                        <td>Bairro 14</td>
                        <td>Cidade 14</td>
                    </tr>
                    <tr>
                        <td>Nome 15</td>
                        <td>M</td>
                        <td>Cargo 15</td>
                        <td>8743615</td>
                        <td>Logradouro 15</td>
                        <td>Bairro 15</td>
                        <td>Cidade 15</td>
                    </tr>
                    <tr>
                        <td>Nome 16</td>
                        <td>M</td>
                        <td>Cargo 16</td>
                        <td>8743616</td>
                        <td>Logradouro 16</td>
                        <td>Bairro 16</td>
                        <td>Cidade 16</td>
                    </tr>
                    <tr>
                        <td>Nome 17</td>
                        <td>M</td>
                        <td>Cargo 17</td>
                        <td>8743617</td>
                        <td>Logradouro 17</td>
                        <td>Bairro 17</td>
                        <td>Cidade 17</td>
                    </tr>
                    <tr>
                        <td>Nome 18</td>
                        <td>M</td>
                        <td>Cargo 18</td>
                        <td>8743618</td>
                        <td>Logradouro 18</td>
                        <td>Bairro 18</td>
                        <td>Cidade 18</td>
                    </tr>
                    <tr>
                        <td>Nome 19</td>
                        <td>M</td>
                        <td>Cargo 19</td>
                        <td>8743619</td>
                        <td>Logradouro 19</td>
                        <td>Bairro 19</td>
                        <td>Cidade 19</td>
                    </tr>
                    <tr>
                        <td>Nome 20</td>
                        <td>M</td>
                        <td>Cargo 20</td>
                        <td>8743620</td>
                        <td>Logradouro 20</td>
                        <td>Bairro 20</td>
                        <td>Cidade 20</td>
                    </tr>
                </tbody>
            </table>
        </article>

        <!-- Listagem de Agendamentos de clientes -->
        <article class="cartao cartao_pag_list_agendamento">
            <h2 class="cartao__titulo">Listagem de agendamento</h2>
            <table class="table table__responsive">
                <thead>
                    <tr>
                        <th>Especialidade</th>
                        <th>Hora</th>
                        <th>Data</th>
                        <th>Contato</th>
                    </tr>
                </thead>
                <!-- EMMET: tbody>tr*20>td{Especialidade $}+td{$:00}+td{$/01/2018}+td{Contato $} -->
                <tbody>
                    <tr>
                        <td>Especialidade 1</td>
                        <td>1:00</td>
                        <td>1/01/2018</td>
                        <td>Contato 1</td>
                    </tr>
                    <tr>
                        <td>Especialidade 2</td>
                        <td>2:00</td>
                        <td>2/01/2018</td>
                        <td>Contato 2</td>
                    </tr>
                    <tr>
                        <td>Especialidade 3</td>
                        <td>3:00</td>
                        <td>3/01/2018</td>
                        <td>Contato 3</td>
                    </tr>
                    <tr>
                        <td>Especialidade 4</td>
                        <td>4:00</td>
                        <td>4/01/2018</td>
                        <td>Contato 4</td>
                    </tr>
                    <tr>
                        <td>Especialidade 5</td>
                        <td>5:00</td>
                        <td>5/01/2018</td>
                        <td>Contato 5</td>
                    </tr>
                    <tr>
                        <td>Especialidade 6</td>
                        <td>6:00</td>
                        <td>6/01/2018</td>
                        <td>Contato 6</td>
                    </tr>
                    <tr>
                        <td>Especialidade 7</td>
                        <td>7:00</td>
                        <td>7/01/2018</td>
                        <td>Contato 7</td>
                    </tr>
                    <tr>
                        <td>Especialidade 8</td>
                        <td>8:00</td>
                        <td>8/01/2018</td>
                        <td>Contato 8</td>
                    </tr>
                    <tr>
                        <td>Especialidade 9</td>
                        <td>9:00</td>
                        <td>9/01/2018</td>
                        <td>Contato 9</td>
                    </tr>
                    <tr>
                        <td>Especialidade 10</td>
                        <td>10:00</td>
                        <td>10/01/2018</td>
                        <td>Contato 10</td>
                    </tr>
                    <tr>
                        <td>Especialidade 11</td>
                        <td>11:00</td>
                        <td>11/01/2018</td>
                        <td>Contato 11</td>
                    </tr>
                    <tr>
                        <td>Especialidade 12</td>
                        <td>12:00</td>
                        <td>12/01/2018</td>
                        <td>Contato 12</td>
                    </tr>
                    <tr>
                        <td>Especialidade 13</td>
                        <td>13:00</td>
                        <td>13/01/2018</td>
                        <td>Contato 13</td>
                    </tr>
                    <tr>
                        <td>Especialidade 14</td>
                        <td>14:00</td>
                        <td>14/01/2018</td>
                        <td>Contato 14</td>
                    </tr>
                    <tr>
                        <td>Especialidade 15</td>
                        <td>15:00</td>
                        <td>15/01/2018</td>
                        <td>Contato 15</td>
                    </tr>
                    <tr>
                        <td>Especialidade 16</td>
                        <td>16:00</td>
                        <td>16/01/2018</td>
                        <td>Contato 16</td>
                    </tr>
                    <tr>
                        <td>Especialidade 17</td>
                        <td>17:00</td>
                        <td>17/01/2018</td>
                        <td>Contato 17</td>
                    </tr>
                    <tr>
                        <td>Especialidade 18</td>
                        <td>18:00</td>
                        <td>18/01/2018</td>
                        <td>Contato 18</td>
                    </tr>
                    <tr>
                        <td>Especialidade 19</td>
                        <td>19:00</td>
                        <td>19/01/2018</td>
                        <td>Contato 19</td>
                    </tr>
                    <tr>
                        <td>Especialidade 20</td>
                        <td>20:00</td>
                        <td>20/01/2018</td>
                        <td>Contato 20</td>
                    </tr>
                </tbody>
            </table>
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
                            <option value="médico">Médico</option>
                            <option value="enfermeiro">Enfermeiro</option>
                            <option value="secretario">Secretário</option>
                            <option value="médico">Outro</option>
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
                        <input type="text" name="form__cep" id="form__cep" class="form__text-field">
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