<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The guardrails a policy adds to its base's, and the ones it removes from them, by name.
 *
 * @phpstan-type AgentGatewayPolicyGuardrailsShape = array{
 *   add?: list<string>|null, remove?: list<string>|null
 * }
 */
final class AgentGatewayPolicyGuardrails implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyGuardrailsShape> */
    use SdkModel;

    /**
     * Guardrails the policy runs in addition to its base's.
     *
     * @var list<string>|null $add
     */
    #[Optional(list: 'string')]
    public ?array $add;

    /**
     * Guardrails from its base that the policy does not run.
     *
     * @var list<string>|null $remove
     */
    #[Optional(list: 'string')]
    public ?array $remove;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $add
     * @param list<string>|null $remove
     */
    public static function with(?array $add = null, ?array $remove = null): self
    {
        $self = new self;

        null !== $add && $self['add'] = $add;
        null !== $remove && $self['remove'] = $remove;

        return $self;
    }

    /**
     * Guardrails the policy runs in addition to its base's.
     *
     * @param list<string> $add
     */
    public function withAdd(array $add): self
    {
        $self = clone $this;
        $self['add'] = $add;

        return $self;
    }

    /**
     * Guardrails from its base that the policy does not run.
     *
     * @param list<string> $remove
     */
    public function withRemove(array $remove): self
    {
        $self = clone $this;
        $self['remove'] = $remove;

        return $self;
    }
}
