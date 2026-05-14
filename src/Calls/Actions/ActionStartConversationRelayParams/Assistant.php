<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Custom parameters for the Conversation Relay session. Pass key-value data as `assistant.dynamic_variables` to make it available to the relay session.
 *
 * @phpstan-type AssistantShape = array{
 *   dynamicVariables?: array<string,string>|null
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * Custom key-value parameters forwarded to the Conversation Relay session.
     *
     * @var array<string,string>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: 'string')]
    public ?array $dynamicVariables;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,string>|null $dynamicVariables
     */
    public static function with(?array $dynamicVariables = null): self
    {
        $self = new self;

        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }

    /**
     * Custom key-value parameters forwarded to the Conversation Relay session.
     *
     * @param array<string,string> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

        return $self;
    }
}
