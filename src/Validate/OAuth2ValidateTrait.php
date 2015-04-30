<?php

namespace ZF\OAuth2\Validate;

use OAuth2\Request as OAuth2Request;
use OAuth2\Server as OAuth2Server;

trait OAuth2ValidateTrait 
{
    /** 
     * OAuth2\Server
     */
    protected $oAuth2Server;

    /**
     * Get the OAuth2 server
     *
     * @return OAuth2\Server
     */
    public function getOAuth2Server()
    {
        return $this->oAuth2Server;
    }

    /**
     * Set the OAuth2 server
     *
     * @param OAuth2\Server
     */
    public function setOAuth2Server(OAuth2Server $server)
    {
        $this->oAuth2Server = $server;
        return $this;
    }

    public function validateOAuth2($scope = null)
    {
        if ( ! $this->getOAuth2Server()->verifyResourceRequest(
            OAuth2Request::createFromGlobals(),
            $response = null,
            $scope
        )) {
            $error = $this->getOAuth2Server()->getResponse();
            $parameters = $error->getParameters();
            $detail = isset($parameters['error_description'])
                ? $parameters['error_description']: $error->getStatusText();

            return new ApiProblem($error->getStatusCode(), $detail);
        }

        return true;
    }
}

