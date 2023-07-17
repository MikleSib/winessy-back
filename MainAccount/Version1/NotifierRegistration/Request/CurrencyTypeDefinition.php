<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierRegistration\Request;

use Common\Traits\TraitArrayValidator;
use DTO\UniversalNotifier\Version1\AssetsList\Common\AssetDTO;
use JMS\Serializer\Annotation as JMS;

class CurrencyTypeDefinition
{
    use TraitArrayValidator;
    /**
     * @var string
     * @JMS\SerializedName("currency_type")
     * @JMS\Type("string")
     */
    protected $currencyType;
    /**
     * @var boolean
     * @JMS\SerializedName("is_asset")
     * @JMS\Type("boolean")
     */
    protected $isAsset;
    /**
     * @var string|null
     * @JMS\SerializedName("asset_dto")
     * @JMS\Type("string")
     */
    protected $assetDTO;
    /**
     * @var boolean
     * @JMS\SerializedName("is_memoable")
     * @JMS\Type("boolean")
     */
    protected $isMemoable;
    /**
     * @var boolean
     * @JMS\SerializedName("has_hot_wallet_address")
     * @JMS\Type("boolean")
     */
    protected $hasHotWalletAddress;
    /**
     * @var boolean
     * @JMS\SerializedName("has_user_deposit_balances")
     * @JMS\Type("boolean")
     */
    protected $hasUserDepositBalances;
    /**
     * @var int
     * @JMS\SerializedName("confirmations_need")
     * @JMS\Type("integer")
     */
    protected $confirmationsNeed;

    /**
     * @var AssetDTO[]
     * @JMS\SerializedName("assets")
     * @JMS\Type("array<DTO\UniversalNotifier\Version1\AssetsList\Common\AssetDTO>")
     */
    protected $assets;

    public function __construct(
        string $currencyType,
        bool $isAsset,
        ?string $assetDTO,
        bool $isMemoable,
        bool $hasHotWalletAddress,
        bool $hasUserDepositBalances,
        int $confirmationsNeed,
        array $assets
    ) {
        $this->currencyType = $currencyType;
        $this->isAsset = $isAsset;
        $this->assetDTO = $assetDTO;
        $this->isMemoable = $isMemoable;
        $this->hasHotWalletAddress = $hasHotWalletAddress;
        $this->hasUserDepositBalances = $hasUserDepositBalances;
        $this->confirmationsNeed = $confirmationsNeed;

        AssetDTO::selfArrayValidator(... $assets);
        $this->assets = $assets;
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

    public function getIsAsset(): bool
    {
        return $this->isAsset;
    }

    public function getAssetDTO(): ?string
    {
        return $this->assetDTO;
    }

    public function getIsMemoable(): bool
    {
        return $this->isMemoable;
    }

    public function getHasHotWalletAddress(): bool
    {
        return $this->hasHotWalletAddress;
    }

    public function getHasUserDepositBalances(): bool
    {
        return $this->hasUserDepositBalances;
    }

    public function getConfirmationsNeed(): int
    {
        return $this->confirmationsNeed;
    }

    /**
     * @return AssetDTO[]
     */
    public function getAssets(): array
    {
        return $this->assets;
    }
}
