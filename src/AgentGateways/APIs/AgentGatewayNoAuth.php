<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The gateway sends no credential.
 *
 * @phpstan-type AgentGatewayNoAuthShape = array{type?: null|Type|value-of<Type>}
 */
final class AgentGatewayNoAuth implements BaseModel
{
    /** @use SdkModel<AgentGatewayNoAuthShape> */
    use SdkModel;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(Type|string|null $type = null): self
    {
        $self = new self;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
