<?php

/*
 * Configura��es do sistema de destaques
 */
$destaques = array(
	// Dados de conex�o ao MySQL
	'mysql' => array(
		//'servidor' => '127.0.0.1',
		//'usuario' => 'root',
		//'senha' => 'admin',
		'servidor' => '186.202.152.149',
		'usuario' => 'valmir',
		'senha' => 'pras4102',
		'banco' => 'valmir'),

	// Nome da tabela com os destaques
	'tabela' => 'destaques',

	// Limite m�ximo de destaques que ser�o exibidos
	'limite' => 5
);

/**
 * Conex�o com o MySQL
 *
 * Aten��o: Comente as pr�ximas linhas se o seu site j� se
 *  conectar com o MySQL fora desse script
 */
mysql_connect($destaques['mysql']['servidor'], $destaques['mysql']['usuario'], $destaques['mysql']['senha']) OR trigger_error('ERRO: ' . mysql_error());
mysql_select_db($destaques['mysql']['banco']) OR trigger_error('ERRO: ' . mysql_error());

/*
 * Busca os dados na tabela de destaques
 */
$sql = "SELECT `titulo`, `link`, `imagem`
		FROM `{$destaques['tabela']}`
		WHERE `ativo` = 1
		ORDER BY `id` DESC
		LIMIT {$destaques['limite']}";
$query = mysql_query($sql) OR trigger_error('ERRO: ' . mysql_error());

/**
 * Loop que traz os dados do MySQL e armazena-os em um array $lista_destaques
 */
$lista_destaques = array();
while ($registro = mysql_fetch_object($query)) {
	$lista_destaques[] = $registro;
}

?>