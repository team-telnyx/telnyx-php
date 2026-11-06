<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Keys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayKeyShape from \Telnyx\AgentGateways\Keys\AgentGatewayKey
 *
 * @phpstan-type AgentGatewayKeyResponseShape = array{
 *   data: AgentGatewayKey|AgentGatewayKeyShape
 * }
 */
final class AgentGatewayKeyResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayKeyResponseShape> */
    use SdkModel;

    /**
     * A key on an instance, without its value.
     */
    #[Required]
    public AgentGatewayKey $data;

    /**
     * `new AgentGatewayKeyResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayKeyResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayKeyResponse)->withData(...)
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
     *
     * @param AgentGatewayKey|AgentGatewayKeyShape $data
     */
    public static function with(AgentGatewayKey|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A key on an instance, without its value.
     *
     * @param AgentGatewayKey|AgentGatewayKeyShape $data
     */
    public function withData(AgentGatewayKey|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
