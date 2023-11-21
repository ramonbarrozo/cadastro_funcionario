<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class ProdutoController extends Controller
{
    public function actionObterDadosProduto($meli_id)
    {
        $url = "https://api.mercadolibre.com/items/{$meli_id}";

        $dadosProduto = $this->getDataFromApi($url);

        if ($dadosProduto !== null) {
            return $this->asJson($dadosProduto);
        } else {
            return $this->asJson(['error' => 'Produto não encontrado']);
        }
    }

    private function getDataFromApi($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            return json_decode($response, true);
        } else {
            return null; // Retorna null em caso de erro
        }
    }
}
