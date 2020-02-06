<?php

namespace Omnipay\Coinpayments;

use Omnipay\Coinpayments\Message\CurrenciesRequest;
use Omnipay\Coinpayments\Message\TransactionRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Coinpayments\Message\AccountInfoRequest;

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
        return $this->createRequest(AccountInfoRequest::class, $parameters);
    }

    public function createTransaction(array $parameters = [])
    {
        return $this->createRequest(TransactionRequest::class, $parameters);
    }

    public function fetchCurrencies(array $parameters = [])
    {
        return $this->createRequest(CurrenciesRequest::class, $parameters);
    }
}
