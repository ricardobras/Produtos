<?php

class ProdutoDetalhes{

private $codEmpresa;
private $codProduto;
private $unidCompras;
private $unidConsumo;
private $ccusto;
private $grupo;
private $ordProducao;
private $opEntrada;


function set($var,$value){
	$this->$var = $value;
}

function get($var){
	return $this->$var;
}
}
