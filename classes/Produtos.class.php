<?php
/**
* Classe de controle de produtos
*
* Esta classe permite que sejam gerenciados os produtos da loja
*
* @package Livraria412
*/

class Produtos {
	
	/**
	* propriedades da classe
	*/
	private $db;
	
	/**
	* A função __construct é um método mágico. Este método será executado toda vez que o objeto for instanciado.
	*/	
	public function __construct() {
		$this->db = new Database;
	}
	
	/**
	* Neste método, simplificamos a maneira de criar novos produtos
	*
	* @param array $dados Dados a serem inseridos no banco, vindos de um POST
	*/
	public function criarProduto($dados) {
		$this->db->inserirDados("produtos", $dados);
	}
	
	/**
	* Neste método, simplificamos a maneira de alterar dados de produtos
	*
	* @param string $id ID do produto a ser alterado
	* @param array $dados Dados a serem alterados no banco, vindos de um POST
	*/
	public function alterarProduto($id, $dados) {
		$this->db->alterarDados("produtos", "id = $id", $dados);
	}
	
	/**
	* Neste método, simplificamos a maneira de remover produtos
	*
	* @param string $id ID do produto a ser removido
	*/
	public function removerProduto($id) {
		$this->db->removerDados("produtos", "id = $id");
	}
	
	/**
	* Neste método, listamos todos os produtos em nosso banco, com algumas regras
	* 
	* @param string $id Filtrar produtos por id
	* @param string $titulo Filtrar produtos por titulo
	* @param string $busca Buscar algo nos produtos
	* @param string $ordem Ordem de exibição dos produtos
	* @param string $limite Limitar a exibição de produtos
     * * @param string $grupo exibir por grupos
	* @return array Resultados da consulta ao banco de dados por produtos
	*/
	public function listarProdutos($id = null, $titulo = null, $ordem = null, $busca = null, $limite = null, $grupo = null) {
	
		if(!empty($id)) {
            $onde = "id = '$id'";
        }
			else if(!empty($grupo)) {
                $onde = "grupo = '$grupo'";
            }
		 else {
			$onde = null;
		}
		
		if(!empty($busca)) {
			if(!empty($onde)) {
				$onde .= " AND titulo";
			} else {
				$onde = 'titulo';
			}
			$like = "'%". $busca ."%'";
		} else {
			$like = null;
		}
	
		$resultados = $this->db->pegarDados('produtos', '*', $onde, $like, $ordem, $limite);
		
		return $resultados;
	}
	
	/**
	* Neste método, mostraremos apenas um produto
	* 
	* @param string $id Produto a ser exibido
	* @return array Resultados da consulta ao banco de dados por um produto
	*/
	public function verProduto($id) {	
		$resultado = $this->db->pegarDado('produtos', '*', 'id = $id');
		
		return $resultado;
	}
}