<?php

namespace Omnipay\Coinpayments\Message;

use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Omnipay\Common\Exception\InvalidRequestException;

abstract class AbstractRequest extends OmnipayAbstractRequest
{
    private $version = 1;
    private $endpoint = 'https://www.coinpayments.net/api.php';

    abstract protected function getCommand(): string;

    public function getVersion()
    {
        return $this->version;
    }
    
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getPublicKey()
    {
        return $this->getParameter('public_key');
    }

    public function getPrivateKey()
    {
        return $this->getParameter('private_key');
    }

    public function getData()
    {
        $data = parent::getData();

        $data['version'] = $this->getCommand();
        $data['cmd'] = $this->getCommand();
        $data['key'] = $this->getPublicKey();
        $data['format'] = 'json';

        return $data;
    }

    public function sendData($data)
    {
        $body = http_build_query($data, '', '&');
        $hmac = hash_hmac('sha512', $body, $this->getPrivateKey());
        $headers = ['HMAC' => $hmac];
        
        dd($this->getPrivateKey());

        $httpResponse = $this->httpClient->request('POST', $this->getEndpoint(), $headers, $body);

        return $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
    }

    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
