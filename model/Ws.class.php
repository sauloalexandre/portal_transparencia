<?php
class Ws
{
	/*	Atributos */	
	protected $id;
	protected $dataReferencia;
	protected $codigoIBGE;
	protected $nomeIBGE;
	protected $codigoRegiao;
	protected $nomeRegiao;
	protected $pais;
	protected $uf_sigla;
	protected $uf_nome;
	protected $tipo_id;
	protected $tipo_descricao;
	protected $tipo_descricao_detalhada;
	protected $valor;
	protected $quantidade_beneficiados;


	/*	Set */
	function set($atr, $val)
	{
		$this->$atr = $val;
	}

	
	/*	Get */
	function get($atr)
	{
		return $this->$atr;
	}		


	/***********************************************************************/
	//
	//								GET
	//
	/***********************************************************************/
	/*	
		FUNÇÃO: 		get_ae_municipio
						Faz a listagem dos registros
		PARÂMETROS:     param
		RETORNO: 	    array de objetos
	*/
	function get_ae_municipio($param)
	{
		$mySQL = New MySQL();
		$sql =	"SELECT
					*
				FROM
					ae_municipio
				WHERE
					id > 0";
		
		$sql .=	(isset($param["id"]) ) ? " AND id=".$param["id"] : "";
        $sql .= (isset($param["id"]) ) ? " AND MONTH(dataReferencia) =".$param["month"] : "";
		$rs = $mySQL->runQuery($sql);
		$lista= array();
		
		while ($row = mysqli_fetch_assoc($rs) ) {
		
			$Obj = new $this();
			$atribs = get_class_vars(get_class($this) );
			
			foreach ($atribs as $atrib=>$val) {
				$Obj->set($atrib, $row[$atrib]);
			}
			
			array_push($lista, $Obj);
		
		}
		
		return $lista;
	}


    /*  
        FUNÇÃO:         get_bpc_municipio
                        Faz a listagem dos registros
        PARÂMETROS:     param
        RETORNO:        array de objetos
    */
    function get_bpc_municipio($param)
    {
        $mySQL = New MySQL();
        $sql =  "SELECT
                    *
                FROM
                    bpc_municipio
                WHERE
                    id > 0";
        
        $sql .= (isset($param["id"]) ) ? " AND id=".$param["id"] : "";
        $sql .= (isset($param["id"]) ) ? " AND MONTH(dataReferencia) =".$param["month"] : "";
        $rs = $mySQL->runQuery($sql);
        $lista= array();
        
        while ($row = mysqli_fetch_assoc($rs) ) {
        
            $Obj = new $this();
            $atribs = get_class_vars(get_class($this) );
            
            foreach ($atribs as $atrib=>$val) {
                $Obj->set($atrib, $row[$atrib]);
            }
            
            array_push($lista, $Obj);
        
        }
        
        return $lista;
    }



	/***********************************************************************/
	//
	//								DO
	//
	/***********************************************************************/
	/*	
		FUNÇÃO:		add_bpc_municipio
		PARÂMETROS:	void
		RETORNO:	void
		DESCRIÇÃO:	Cadastra
	*/
	function add_ae_municipio()
	{
		$mySQL = New MySQL();
		$sql = "INSERT INTO ae_municipio
        (
            id
            , dataReferencia
            , codigoIBGE
            , nomeIBGE
            , codigoRegiao
            , nomeRegiao
            , pais
            , uf_sigla
            , uf_nome
            , tipo_id
            , tipo_descricao
            , tipo_descricao_detalhada
            , valor
            , quantidade_beneficiados
        ) VALUES (
            ".$this->get('id')."
            , '".$this->get('dataReferencia')."'
            , '".$this->get('codigoIBGE')."'
            , '".$this->get('nomeIBGE')."'
            , ".$this->get('codigoRegiao')."
            , '".$this->get('nomeRegiao')."'
            , '".$this->get('pais')."'
            , '".$this->get('uf_sigla')."'
            , '".$this->get('uf_nome')."'
            , ".$this->get('tipo_id')."
            , '".$this->get('tipo_descricao')."'
            , '".$this->get('tipo_descricao_detalhada')."'
            , ".$this->get('valor')."
            , ".$this->get('quantidade_beneficiados')."
        )";
		$mySQL->runQuery($sql);
	}


    /*  
        FUNÇÃO:     add_bpc_municipio
        PARÂMETROS: void
        RETORNO:    void
        DESCRIÇÃO:  Cadastra
    */
    function add_bpc_municipio()
    {
        $mySQL = New MySQL();
        $sql = "INSERT INTO bpc_municipio
        (
            id
            , dataReferencia
            , codigoIBGE
            , nomeIBGE
            , codigoRegiao
            , nomeRegiao
            , pais
            , uf_sigla
            , uf_nome
            , tipo_id
            , tipo_descricao
            , tipo_descricao_detalhada
            , valor
            , quantidade_beneficiados
        ) VALUES (
            ".$this->get('id')."
            , '".$this->get('dataReferencia')."'
            , '".$this->get('codigoIBGE')."'
            , '".$this->get('nomeIBGE')."'
            , ".$this->get('codigoRegiao')."
            , '".$this->get('nomeRegiao')."'
            , '".$this->get('pais')."'
            , '".$this->get('uf_sigla')."'
            , '".$this->get('uf_nome')."'
            , ".$this->get('tipo_id')."
            , '".$this->get('tipo_descricao')."'
            , '".$this->get('tipo_descricao_detalhada')."'
            , ".$this->get('valor')."
            , ".$this->get('quantidade_beneficiados')."
        )";
        $mySQL->runQuery($sql);
    }


}	//fim da classe
?>