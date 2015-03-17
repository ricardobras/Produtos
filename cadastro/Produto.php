<?php

class Produto {
 
private $codigo=0; 
private $dv=0;
private $descricao="";
private $compl1="";
private $compl2=""; 
private $princ_ativo=0;
private $tp_prod=0;
private $bloqueado="N";
private $citricidade="0";
private $user_cadastro="0";
private $dt_cadastro;
private $user_val="";
private $dt_val;

private $user_int="";
private $dt_int;

private $ncm_codigo=0;
private $marca_codigo=0;
private $idsolicitacaoweb=0;
private $status=0;

//METODOS SETS
function setCodigo($val){
	$this->codigo = $val;
}
function setDv($val){
	$this->dv = $val;
}
function setDescricao($val){
	$this->descricao = $val;
}

function setCompl1($val){
	$this->compl1 = $val;
}

function setCompl2($val){
	$this->compl2 = $val;
}

function setPrinc_ativo($val){
	$this->princ_ativo = $val;
}

function setTp_prod($val){
	$this->tp_prod = $val;
}

function setBloqueado($val){
	$this->bloqueado = $val;
}

function setCitricidade($val){
	$this->citricidade = $val;
}

function setUserCadastro($val){
	$this->user_cadastro = $val;
}

function setDtCadastro($val){
	$this->dt_cadastro = $val;
}

function setUserVal($val){
	$this->user_val = $val;
}

function setDtVal($val){
	$this->dt_val = $val;
}

function setUserInt($val){
	$this->user_int = $val;
}

function setDtInt($val){
	$this->dt_int = $val;
}

function setCodNcm($val){
	$this->ncm_codigo = $val;
}

function setCodMarca($val){
	$this->marca_codigo = $val;
}

function setIdSolicitacaoWeb($val){
	$this->idsolicitacaoweb = $val;
}

function setStatus($val){
	$this->status = $val;
}


//METODOS GETS 
function getCodigo(){
	return $this->codigo;
}

function getDv(){
	return $this->dv;
}

function getDescricao(){
	return $this->descricao;
}

function getCompl1(){
	return $this->compl1;
}

function getCompl2(){
	return $this->compl2;
}

function getPrinc_ativo(){
	return $this->princ_ativo;
}

function getTp_prod(){
	return $this->tp_prod;
}

function getBloqueado(){
	return $this->bloqueado;
}

function getCitricidade(){
	return $this->citricidade;
}

function getUserCadastro(){
	return $this->user_cadastro;
}

function getDtCadastro(){
	return $this->dt_cadastro;
}

function getUserVal(){
	return $this->user_val;
}

function getDtVal(){
	return $this->dt_val;
}

function getUserInt(){
	return $this->user_int;
}

function getDtInt(){
	return $this->dt_int;
}

function getCodNcm(){
	return $this->ncm_codigo;
}

function getCodMarca(){
	return $this->marca_codigo;
}

function getIdSolicitacaoWeb(){
	return $this->idsolicitacaoweb;
}

function getStatus(){
	return $this->status;
}

}