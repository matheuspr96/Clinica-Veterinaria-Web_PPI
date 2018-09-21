$(() => {
	$("[data-mostra]").click(e => {
		// Esconde cartoes
		$(".cartao").removeClass("cartao_visivel");
		// Desseleciona item selecionado
		$("[data-mostra]").removeClass("barra-topo__item_selecionado");
		// Seleciona novo item
		$(e.target).addClass("barra-topo__item_selecionado");
		// Mostra cartao desejado
		$(".cartao_pag_" + $(e.target).data("mostra")).addClass("cartao_visivel");
	});
});