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