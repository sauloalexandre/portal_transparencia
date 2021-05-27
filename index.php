<?php
#   Mostrar erros
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('arg_separator.output', '&amp;');
date_default_timezone_set('Brazil/East');
set_time_limit(0);
ini_set('memory_limit','-1');
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes

#   Autoload classes
function __autoload($class)
{require_once "model/".$class.".class.php";}



for($data=202001; $data<=202012; $data++) {

    $url = "http://api.portaldatransparencia.gov.br/api-de-dados/auxilio-emergencial-por-municipio?pagina=1";
    $url .= "&codigoIbge=4202404";
    echo "<br><br>".$url .= "&mesAno={$data}";
    $client  = curl_init($url);
    $headers = ['chave-api-dados: 76be80439a96948a7f82fafcb6065d3c'];

    curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);
    $obj      = json_decode($response);

    curl_close($client);

    if(!empty($obj[0])) {
        $param["id"]    = $obj[0]->id;
        $param["month"] = substr($data, -2);
        $Ws             = new Ws();
        if (count($Ws->get_ae_municipio($param)) == 0) {
            $Ws->set("id", $obj[0]->id);
            $Ws->set("dataReferencia", $obj[0]->dataReferencia);
            $Ws->set("codigoIBGE", $obj[0]->municipio->codigoIBGE);
            $Ws->set("nomeIBGE", $obj[0]->municipio->nomeIBGE);
            $Ws->set("codigoRegiao", $obj[0]->municipio->codigoRegiao);
            $Ws->set("nomeRegiao", $obj[0]->municipio->nomeRegiao);
            $Ws->set("pais", $obj[0]->municipio->pais);
            $Ws->set("uf_sigla", $obj[0]->municipio->uf->sigla);
            $Ws->set("uf_nome", $obj[0]->municipio->uf->nome);
            $Ws->set("tipo_id", $obj[0]->tipo->id);
            $Ws->set("tipo_descricao", $obj[0]->tipo->descricao);
            $Ws->set("tipo_descricao_detalhada", $obj[0]->tipo->descricaoDetalhada);
            $Ws->set("valor", $obj[0]->valor);
            $Ws->set("quantidade_beneficiados", $obj[0]->quantidadeBeneficiados);
            $Ws->add_ae_municipio();
            echo "<br><br>ADD ae_municipio -> {$data}";
        }
    }
    


    $url = "http://api.portaldatransparencia.gov.br/api-de-dados/bpc-por-municipio?pagina=1";
    $url .= "&codigoIbge=4202404";
    echo "<br><br>".$url .= "&mesAno={$data}";
    $client  = curl_init($url);
    $headers = ['chave-api-dados: 76be80439a96948a7f82fafcb6065d3c'];

    curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($client);
    $obj      = json_decode($response);

    curl_close($client);

    if(!empty($obj[0])) {

        $param["id"]    = $obj[0]->id;
        $param["month"] = substr($data, -2);
        $Ws             = new Ws();
        if (count($Ws->get_bpc_municipio($param)) == 0) {
            $Ws->set("id", $obj[0]->id);
            $Ws->set("dataReferencia", $obj[0]->dataReferencia);
            $Ws->set("codigoIBGE", $obj[0]->municipio->codigoIBGE);
            $Ws->set("nomeIBGE", $obj[0]->municipio->nomeIBGE);
            $Ws->set("codigoRegiao", $obj[0]->municipio->codigoRegiao);
            $Ws->set("nomeRegiao", $obj[0]->municipio->nomeRegiao);
            $Ws->set("pais", $obj[0]->municipio->pais);
            $Ws->set("uf_sigla", $obj[0]->municipio->uf->sigla);
            $Ws->set("uf_nome", $obj[0]->municipio->uf->nome);
            $Ws->set("tipo_id", $obj[0]->tipo->id);
            $Ws->set("tipo_descricao", $obj[0]->tipo->descricao);
            $Ws->set("tipo_descricao_detalhada", $obj[0]->tipo->descricaoDetalhada);
            $Ws->set("valor", $obj[0]->valor);
            $Ws->set("quantidade_beneficiados", $obj[0]->quantidadeBeneficiados);
            $Ws->add_bpc_municipio();
            echo "<br><br>ADD bpc_municipio -> {$data}";
        }

    }
    
}