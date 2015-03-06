$(function(){
	$(".ordproducao").inputmask("mask",{"mask":"9.9.99.99"});
	$("#ordproducao").inputmask("mask",{"mask":"9.9.99.99"});

	$(".grupo").inputmask("mask",{"mask":"99.99","mask":"999.99"});
	$("#grupo").inputmask("mask",{"mask":"99.99"});

	//DEFINIR SOMENTE NUMERICO
	$(".ncm").inputmask({"mask": "9", "repeat": 10, "greedy": false});
	$("#ncm").inputmask({"mask": "9", "repeat": 10, "greedy": false});
	
 	$(".ccusto").inputmask({"mask": "9", "repeat": 10, "greedy": false});
	$("#ccusto").inputmask({"mask": "9", "repeat": 10, "greedy": false});
 	
 	$("#opEntrada").inputmask({"mask": "9", "repeat": 10, "greedy": false});

});