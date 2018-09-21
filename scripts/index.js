$(() => {
	$("[data-mostra]").click(e => {
		// Esconde cartoes
		$(".cartao").removeClass("cartao_visivel");

		// Mostra cartao desejado
		$(".cartao_pag_" + $(e.target).data("mostra")).addClass("cartao_visivel");
	});
});