<?php

namespace Omnipay\Coinpayments;

use Omnipay\Coinpayments\Message\FetchBalanceRequest;
use Omnipay\Coinpayments\Message\FetchCurrenciesRequest;
use Omnipay\Coinpayments\Message\CreateTransactionRequest;
use Omnipay\Coinpayments\Message\FetchAccountInfoRequest;
use Omnipay\Common\AbstractGateway;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Coinpayments';
    }

    public function getDefaultParameters()
    {
        return [
            'merchant_id'   => '',
            'public_key'    => '',
            'private_key'   => '',
            'secret_key'    => '',
        ];
    }

    public function getMerchantId()
    {
        return $this->getParameter('merchant_id');
    }

    public function setMerchantId($value)
    {
        return $this->setParameter('merchant_id', $value);
    }

    public function getPublicKey()
    {
        return $this->getParameter('public_key');
    }

    public function setPublicKey($value)
    {
        return $this->setParameter('public_key', $value);
    }

    public function getPrivateKey()
    {
        return $this->getParameter('private_key');
    }

    public function setPrivateKey($value)
    {
        return $this->setParameter('private_key', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secret_key');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secret_key', $value);
    }

    public function fetchAccountInfo(array $parameters = [])
    {
        return $this->createRequest(FetchAccountInfoRequest::class, $parameters);
    }

    public function createTransaction(array $parameters = [])
    {
        return $this->createRequest(CreateTransactionRequest::class, $parameters);
    }

    public function fetchCurrencies(array $parameters = [])
    {
        return $this->createRequest(FetchCurrenciesRequest::class, $parameters);
    }

    public function fetchBalance(array $parameters = [])
    {
        return $this->createRequest(FetchBalanceRequest::class, $parameters);
    }
}
