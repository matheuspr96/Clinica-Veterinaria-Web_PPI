$(() => {
	var isGaleriaCarregada = false; // Guarda se as imagens da galeria já foram carregadas ou não (para exibir a animação)
	/**
	 * Menu navbar
	 */
	$("[data-mostra]").click(e => {
		let mostra = $(e.target).data("mostra");
		// Esconde cartoes
		$(".cartao").removeClass("cartao_visivel");
		// Desseleciona item selecionado
		$("[data-mostra]").removeClass("barra-topo__item_selecionado");
		// Seleciona novo item
		$(`.barra-topo__item[data-mostra="${mostra}"]`).addClass("barra-topo__item_selecionado");
		// Mostra cartao desejado
		$(".cartao_pag_" + mostra).addClass("cartao_visivel");
		// Seta hash
		location.hash = mostra;
	});

	// Mostrar guia do location hash
	let guia = location.hash.split("#")[1];
	$(`[data-mostra=${guia}]`).click();

	/**
	 * Carregamento da galeria
	 */
	$("[data-mostra=\"galeria\"]").click(_e => {
		// Evitando que imagens sejam adicionadas duas vezes
		if(isGaleriaCarregada) return;
		isGaleriaCarregada = true;

		let imagens = new Array(8)
				.fill()
				.map((_a, i) =>	$("<img>")                              // Criando imagens
						.attr("src", `images/galeria-img${i + 1}.jpg`)
						.attr("alt", "Foto da clínica")
						.addClass("imagem"));

		imagens.forEach(img => $("#imagens").append(img));              // Colocando imagens

		imagens.forEach((img, i) => 									// Animando a aparição delas
			((imgPassado, iPassado) =>                                  // Colocando em uma IIFE pra atemporizar isso
				setTimeout(() =>
					imgPassado.addClass("imagem_visivel"), 200*iPassado))(img, i));

		/**
		 * Borda vermelha na imagem
		 */
		document.querySelectorAll(".imagem").forEach(img =>
				img.addEventListener("mouseenter", e => {
			e.target.style.border = "2px solid red";
		}));
		document.querySelectorAll(".imagem").forEach(img =>
				img.addEventListener("mouseleave", e => {
			e.target.style.border = "2px solid transparent";
		}));
	});
	

	/**
	 * Botao de login que lança o MODAL
	 */
	$(".mostra-login").click(_e => $("#login-dialog").toggleClass("dialog_escondido"));

	// Botão de entrar
	$("#botao-login").click(_e => {
		window.location = "./funcionalidades.html";
	});

	/**
	 * Dialogs
	 */
	$(".dialog__fundo").click(e => $(e.target.parentNode).addClass("dialog_escondido"));

	/**
	 * Menu
	 */
    $("#abre-menu, .menu__fechar, .menu__fundo, .menu__item").click(_e => $(".menu").toggleClass("menu_escondido"));

	/**
	 * Footer
	 */
	$(".footer").text(`\u00A9 ${(new Date()).getFullYear()} Zika-PET`);

	// Inicializa oculto (Professor pediu)
	$(".cartao__subtitulo").click(e => $(e.target).toggleClass("cartao__subtitulo_ativo"));
});

	/* Ajax forms */
	
	function sendFormContato()
	{
		$("#divSuccessMsg").hide();
		$("#divErrorMsg").hide();
		
		document.getElementById("btnCadastraContato").disabled = true;    
		document.getElementById("btnCadastraContato").style.backgroundColor = "red";  

		var formContato = document.getElementById("formCadastroContato");
		var formData = new FormData(formContato);  // Ver datalhes em https://developer.mozilla.org/pt-BR/docs/Web/API/FormData/FormData

		$.ajax({
			url: './php/processa_form_contato.php',
			method: "POST",
			data: formData,
			
			cache: false,
			processData: false,  // Diz ao jQuery para não processar os dados do formulário (ver detalhes em http://api.jquery.com/jquery.ajax/)   
			contentType: false,  // Diz ao jQuery para não definir cabeçalho de contentType (ver detalhes em http://api.jquery.com/jquery.ajax/)   

			success: function (result) {

				if (result.substring(0, 2) == "OK")
				{
					document.getElementById('divSuccessMsg').innerHTML = "Dados salvos com sucesso";    
					$("#divSuccessMsg").stop().fadeIn(200).delay(2500).fadeOut(200);
					document.getElementById("btnCadastraContato").disabled = false;
					document.getElementById("formCadastroContato").reset(); 
				}
				else
					showMessageError(result);
			},

			error: function (xhr, _status, _error) {

				var errorMsg = xhr.responseText;
				document.getElementById("errorMsg").innerText = errorMsg;
				$("#divErrorMsg").fadeIn(200);
				document.getElementById("btnCadastraContato").disabled = false;
			}
		});
	}

	function sendFormAgendamento()
	{
		$("#divSuccessMsgAg").hide();
		$("#divErrorMsgAg").hide();
		
		document.getElementById("btnCadastraAgendamento").disabled = true;    
		var formAgendamento = document.getElementById("formCadastroAgendamento");
		var formData = new FormData(formAgendamento);  // Ver datalhes em https://developer.mozilla.org/pt-BR/docs/Web/API/FormData/FormData

		$.ajax({
			url: './php/processa_form_agendamento.php',
			method: "POST",
			data: formData,
			
			cache: false,
			processData: false,  // Diz ao jQuery para não processar os dados do formulário (ver detalhes em http://api.jquery.com/jquery.ajax/)   
			contentType: false,  // Diz ao jQuery para não definir cabeçalho de contentType (ver detalhes em http://api.jquery.com/jquery.ajax/)   

			success: function (result) {

				if (result.substring(0, 2) == "OK")
				{
					document.getElementById('divSuccessMsgAg').innerHTML = "Dados salvos com sucesso";    
					$("#divSuccessMsgAg").stop().fadeIn(200).delay(2500).fadeOut(200);
					document.getElementById("btnCadastraAgendamento").disabled = false;
					document.getElementById("formCadastroAgendamento").reset(); 
				}
				else {
					console.error(result);
					showMessageErrorAg(result);
				}
			},

			error: function (xhr, _status, _error) {
				var errorMsg = xhr.responseText;
				if(errorMsg.includes('Duplicate entry'))
					errorMsg = ": Horário indisponível, selecione outro";
				document.getElementById("errorMsgAg").innerText = errorMsg;
				$("#divErrorMsgAg").fadeIn(200);
				document.getElementById("btnCadastraAgendamento").disabled = false;
			}
		});
	}
	
	function showMessageError(message)
	{
		document.getElementById("errorMsg").innerHTML = message;
		$("#divErrorMsg").fadeIn(200);
	}	

	function showMessageErrorAg(message)
	{
		document.getElementById("errorMsgAg").innerHTML = message;
		$("#divErrorMsgAg").fadeIn(200);
	}	

	function buscaMedico(el)
	{
	  let agendamento__especialidade = el.value;
	  el.firstElementChild.disabled = true;
	  $.ajax({
  
		url: './php/processa_medico_agendamento.php',
		type: 'POST',
		async: true,
		dataType: 'json',
		data: {'agendamento__especialidade':agendamento__especialidade},         
  
		success: function(result) {
     
		if (result != "")
		{         

			$("#agendamento__medico").empty();
			let vet = [{idvet: "null", nomevet: "Selecione uma opção"}, ...result];
			console.log(vet);
			for(let x of vet){		 
				var campoSelect = document.getElementById("agendamento__medico");
				var option = document.createElement("option");
				option.value = x.idvet;
				option.text = x.nomevet;
				campoSelect.add(option);
			}	
		}
		else{
			$("#agendamento__medico").empty();
			alert("Não existe médico para a especialidade selecionada")
		}
		},
		
			error: function(xhr, status, error) {
		   alert(status + error + xhr.responseText);
		}
  
	  });  
  
	}

	function buscaHorario()
	{
	  $.ajax({
		url: './php/processa_horario_agendamento.php',
		type: 'POST',
		async: true,
		dataType: 'json',
		data: {
			agendamento__medico: $("#agendamento__medico")[0].value,
			agendamento__consulta: $("#agendamento__consulta")[0].value
		},

		success: result => {
			if(!result) return alert("Sem horários disponíveis pra essa data");

			const INICIO = 7,
				  FINAL  = 18;
			
			$("#agendamento__horario").empty();

			new Array(FINAL - INICIO + 1)
					.fill()
					.map((_a, i) => INICIO + i)
					.filter(h => !result.includes(h))
					.forEach(h => {
						let op = document.createElement("option");
						op.innerText = (h < 10 ? "0" + h : h) + ":00";
						op.value = h;
						$("#agendamento__horario").append(op);
					});
		},

		error: error => {
			alert("Algo deu errado!");
			console.error(error);
		}
  
	  });  
  
	}


