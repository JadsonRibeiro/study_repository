jQuery('#slider').slider({
			max: 1000,
			orientation: "horizontal",
			animate: "fast",
			value: 20
		});

jQuery('#slider').on('slidechange', function(event, ui) {
	jQuery('.conta_saldo_inicial').val(ui.value);
});