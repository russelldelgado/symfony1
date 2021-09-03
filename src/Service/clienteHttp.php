<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpClient\HttpClient;

class clienteHttp{
//podemos usar inyección de dependencia aqui al igual que lo hacemos en los controladores , pero en este caso solo en el constructor

    private  $clienteHttp;

    public function __construct()
    {
//no hace falta que hagamos inyección de dependencia ya que symfony nos provee un cliente http para conectarnos a url externas
        $this->clienteHttp = HttpClient::create();

    }

    public function obtenerCodigoUrl(string $url){
         $codigoEstado = null;
         try {
            $respuesta = $this->clienteHttp->request('GET' , $url);
            $codigoEstado = $respuesta ->getStatusCode();
        } catch (Exception $e) {
            $codigoEstado = null;
        }

        return $codigoEstado;

    }

    
}

