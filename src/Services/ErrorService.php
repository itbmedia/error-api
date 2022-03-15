<?php

namespace ITBMedia\ErrorApiBundle\Services;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpClient\HttpClient;

class ErrorService
{
    private $container;
    private $client;
    public function __construct($container)
    {
        $this->container = $container;
        $this->client = HttpClient::create();
    }
    public function onError(GetResponseForExceptionEvent $error)
    {
        $host = $this->container->getParameter('host');
        $endpoint = $this->container->getParameter('endpoint');
        $api_key = $this->container->getParameter('api_key');
        $server = $this->container->getParameter('server_name');

        $error = [
            "file" => $error->getException()->getFile(),
            "line" => $error->getException()->getLine(),
            "stacktrace" => $error->getException()->getTrace(),
            "message" => $error->getException()->getMessage(),
            "code" => $error->getException()->getCode(),
            "server" => $server,
        ];

        $this->client->request('POST', $host . $endpoint, [
            'headers' => [
                'X-API-KEY' => $api_key,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',

            ],
            'body' => json_encode($error),
        ]);
    }
}
