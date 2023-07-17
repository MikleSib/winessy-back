<?php
declare(strict_types=1);


namespace DTO\UniversalNotifier\Version1\AssetsList\Response;

use DTO\UniversalNotifier\Version1\AssetsList\Common\AssetDTO;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetsListResponse implements ValueObjectInterface
{
    /**
     * @var AssetDTO[]
     * @JMS\SerializedName("assets")
     * @JMS\Type("array<DTO\UniversalNotifier\Version1\AssetsList\Common\AssetDTO>")
     */
    protected $assets;

    public function __construct(array $assets)
    {
        AssetDTO::selfArrayValidator(... $assets);
        $this->assets = $assets;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'assets' => 'required|array',
        ];
    }
    /**
     * @return AssetDTO[]
     */
    public function getAssets(): array
    {
        return $this->assets;
    }

}