<?php

namespace ZF\OAuth2\Factory;

use Zend\ServiceManager\DelegatorFactoryInterface;

class OAuth2ValidateDelegatorFactory implements DelegatorFactoryInterface
{
    public function createDelegatorWithName(
        ServiceLocatorInterface $serviceLocator,
        $name,
        $requestedName,
        $callback
    ) 
    {
        $oAuth2ServerCallback = $serviceLocator->get(
            'ZF\OAuth2\Service\OAuth2Server'
        ));

        $class = $callback();
        $class->setOAuth2Server($oAuth2ServerCallback());

        return $class;
    }
}
