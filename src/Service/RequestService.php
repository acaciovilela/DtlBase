<?php

namespace DtlBase\Service;

use Laminas\Http\Client;

class RequestService {

    /**
     * 
     * @param string $uri
     * @param string $method
     * @param array $params
     * @param string $token
     * @return \Laminas\Http\Response
     */
    public function request(string $uri, string $method = 'GET', array $params) {
        $client = new Client();
        $client->setUri($uri);
        $client->setMethod($method);
        if ('GET' === $method) {
            $client->setParameterGet($params);
        } else {
            $client->setParameterPost($params);
        }
        $client->send();

        return $client->getResponse();
    }

}
