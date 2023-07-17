<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierRegistration\Request;

use JMS\Serializer\Annotation as JMS;

class SecuritySettings
{
    /**
     * @var string
     * @JMS\SerializedName("send_transaction_request_credentials_token")
     * @JMS\Type("string")
     */
    protected $sendTransactionRequestCredentialsToken;
    /**
     * @var string
     * @JMS\SerializedName("send_transaction_request_credentials_method")
     * @JMS\Type("string")
     */
    protected $sendTransactionRequestCredentialsMethod;
    /**
     * @var string
     * @JMS\SerializedName("deposit_create_credentials_token")
     * @JMS\Type("string")
     */
    protected $depositCreateCredentialsToken;
    /**
     * @var string
     * @JMS\SerializedName("deposit_create_credentials_method")
     * @JMS\Type("string")
     */
    protected $depositCreateCredentialsMethod;
    /**
     * @var string
     * @JMS\SerializedName("transaction_update_confirmations_credentials_token")
     * @JMS\Type("string")
     */
    protected $transactionUpdateConfirmationsCredentialsToken;
    /**
     * @var string
     * @JMS\SerializedName("transaction_update_confirmations_credentials_method")
     * @JMS\Type("string")
     */
    protected $transactionUpdateConfirmationsCredentialsMethod;

    public function __construct(
        string $sendTransactionRequestCredentialsToken,
        string $sendTransactionRequestCredentialsMethod,
        string $depositCreateCredentialsToken,
        string $depositCreateCredentialsMethod,
        string $transactionUpdateConfirmationsCredentialsToken,
        string $transactionUpdateConfirmationsCredentialsMethod
    ) {
        $this->sendTransactionRequestCredentialsToken = $sendTransactionRequestCredentialsToken;
        $this->sendTransactionRequestCredentialsMethod = $sendTransactionRequestCredentialsMethod;
        $this->depositCreateCredentialsToken = $depositCreateCredentialsToken;
        $this->depositCreateCredentialsMethod = $depositCreateCredentialsMethod;
        $this->transactionUpdateConfirmationsCredentialsToken = $transactionUpdateConfirmationsCredentialsToken;
        $this->transactionUpdateConfirmationsCredentialsMethod = $transactionUpdateConfirmationsCredentialsMethod;
    }

    public function getSendTransactionRequestCredentialsToken(): string
    {
        return $this->sendTransactionRequestCredentialsToken;
    }

    public function getSendTransactionRequestCredentialsMethod(): string
    {
        return $this->sendTransactionRequestCredentialsMethod;
    }

    public function getDepositCreateCredentialsToken(): string
    {
        return $this->depositCreateCredentialsToken;
    }

    public function getDepositCreateCredentialsMethod(): string
    {
        return $this->depositCreateCredentialsMethod;
    }

    public function getTransactionUpdateConfirmationsCredentialsToken(): string
    {
        return $this->transactionUpdateConfirmationsCredentialsToken;
    }

    public function getTransactionUpdateConfirmationsCredentialsMethod(): string
    {
        return $this->transactionUpdateConfirmationsCredentialsMethod;
    }

}
