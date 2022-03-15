<?php

namespace ITBMedia\ErrorApiBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    private $error_service;
    public function __construct($error_service)
    {
        $this->error_service = $error_service;
    }
    public function onKernalException(GetResponseForExceptionEvent $error)
    {
        $this->error_service->onError($error);
    }
}
