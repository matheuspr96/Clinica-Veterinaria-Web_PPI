$(() => {

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
    });
	
	$(".redir-home").click(e => {
		window.location = "/";
	});

	/**
	 * Menu
	 */
    $("#abre-menu, .menu__fechar, .menu__fundo, .menu__item").click(e => $(".menu").toggleClass("menu_escondido"));

	/**
	 * Footer
	 */
	$(".footer").text(`\u00A9 ${(new Date()).getFullYear()} Zika-PET`);
});

function sendFormfuncionario()
{
	//$("#divSuccessMsgAg").hide();
	//$("#divErrorMsgAg").hide();
	
	document.getElementById("btnCadastraFuncionario").disabled = true;    
	var formAgendamento = document.getElementById("formCadastroAgendamento");
	var formData = new FormData(formAgendamento);  // Ver datalhes em https://developer.mozilla.org/pt-BR/docs/Web/API/FormData/FormData

	$.ajax({
		url: './php/processa_form_funcionario.php',
		method: "POST",
		data: formData,
		
		cache: false,
		processData: false,  // Diz ao jQuery para não processar os dados do formulário (ver detalhes em http://api.jquery.com/jquery.ajax/)   
		contentType: false,  // Diz ao jQuery para não definir cabeçalho de contentType (ver detalhes em http://api.jquery.com/jquery.ajax/)   

		success: function (result) {

			if (result.substring(0, 2) == "OK")
			{
				//document.getElementById('divSuccessMsgAg').innerHTML = "Dados salvos com sucesso";    
				//$("#divSuccessMsgAg").stop().fadeIn(200).delay(2500).fadeOut(200);
				//document.getElementById("btnCadastraAgendamento").disabled = false;
				//document.getElementById("formCadastroAgendamento").reset(); 
			}
			else
			showMessageErrorAg(result);
		},

		error: function (xhr, status, error) {
			//var errorMsg = xhr.responseText;
			//document.getElementById("errorMsgAg").innerText = errorMsg;
			//$("#divErrorMsgAg").fadeIn(200);
			//document.getElementById("btnCadastraAgendamento").disabled = false;
		}
	});
}