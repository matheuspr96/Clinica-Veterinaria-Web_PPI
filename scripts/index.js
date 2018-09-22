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
	});

	/**
	 * Carregamento da galeria
	 */
	$("[data-mostra=\"galeria\"]").click(e => {
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
	 * Botao de login
	 */
	$("#botao-login").click(e => $("#login-dialog").toggleClass("dialog_escondido"));

	/**
	 * Dialogs
	 */
	$(".dialog__fundo").click(e => $(e.target.parentNode).addClass("dialog_escondido"));

	/**
	 * Menu
	 */
    $("#abre-menu, .menu__fechar, .menu__fundo, .menu__item").click(e => $(".menu").toggleClass("menu_escondido"));

	/**
	 * Footer
	 */
	$(".footer").text(`\u00A9 ${(new Date()).getFullYear()} Zika-PET`);
});