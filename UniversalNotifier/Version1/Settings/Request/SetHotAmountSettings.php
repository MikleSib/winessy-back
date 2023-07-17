<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\Settings\Request;

use DTO\UniversalNotifier\Version1\BaseNotifier\Request\OnlyTicker;
use DTO\UniversalNotifier\Version1\Settings\Common\HotAmountSettings;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SetHotAmountSettings extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var HotAmountSettings
     * @JMS\SerializedName("hot_amount_settings")
     * @JMS\Type("DTO\UniversalNotifier\Version1\Settings\Common\HotAmountSettings")
     */
    protected $hotAmountSettings;

    public function __construct(
        string $ticker,
        HotAmountSettings $hotAmountSettings
    ) {
        parent::__construct($ticker);
        $this->hotAmountSettings = $hotAmountSettings;
    }

    static public function getBaseValidationRules(): array
    {
        $rules = parent::getBaseValidationRules();
        foreach (HotAmountSettings::getBaseValidationRules() as $field => $rule) {
            $rules['hot_amount_settings.' . $field] = $rule;
        }
        return $rules;
    }

    public function getHotAmountSettings(): HotAmountSettings
    {
        return $this->hotAmountSettings;
    }

}
