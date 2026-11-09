<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The server's outbound authentication method. Credentials are never returned.
 *
 * @phpstan-type AgentGatewayShownAuthShape = array{type: string}
 */
final class AgentGatewayShownAuth implements BaseModel
{
    /** @use SdkModel<AgentGatewayShownAuthShape> */
    use SdkModel;

    /**
     * The method's `type`.
     */
    #[Required]
    public string $type;

    /**
     * `new AgentGatewayShownAuth()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayShownAuth::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayShownAuth)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $type): self
    {
        $self = new self;

        $self['type'] = $type;

        return $self;
    }

    /**
     * The method's `type`.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
