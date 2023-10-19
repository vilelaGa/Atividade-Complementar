<?php

namespace App\Api;

class Api
{
    /**
     * Função que busca o usuario na api do rm
     * 1 Parametro key via get
     * @var string key
     */
    public static function UserAPI($key)
    {
        //INTRA
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://portal.ubm.br/FrameHTML/rm/api/TOTVSEducacional/GetSession?key=' . $key,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        global $response;
        $response = json_decode(curl_exec($curl));

        curl_close($curl);
    }
}
