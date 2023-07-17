<?php
declare(strict_types=1);

namespace DTO\RouterPermissionChecker\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SelfRegistration implements ValueObjectInterface
{
    /**
     * @var ActionDefinition[]
     * @JMS\SerializedName("action_definitions")
     * @JMS\Type("array<DTO\RouterPermissionChecker\Version1\Request\ActionDefinition>")
     */
    protected $actionDefinitions;

    /**
     * @param ActionDefinition[] $actionDefinitions
     */
    public function __construct(array $actionDefinitions)
    {
        ActionDefinition::selfArrayValidator(... $actionDefinitions);
        $this->actionDefinitions = $actionDefinitions;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'action_definitions' => 'required|array',
            'action_definitions.*.route' => 'required|string',
            'action_definitions.*.permissions' => 'required|array',
            'action_definitions.*.permissions.*' => 'required|string',
        ];
    }

    /**
     * @return ActionDefinition[]
     */
    public function getActionDefinitions(): array
    {
        return $this->actionDefinitions;
    }

}
