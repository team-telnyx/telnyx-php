<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayAPIShape from \Telnyx\AgentGateways\APIs\AgentGatewayAPI
 *
 * @phpstan-type AgentGatewayAPIResponseShape = array{
 *   data: AgentGatewayAPI|AgentGatewayAPIShape
 * }
 */
final class AgentGatewayAPIResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayAPIResponseShape> */
    use SdkModel;

    #[Required]
    public AgentGatewayAPI $data;

    /**
     * `new AgentGatewayAPIResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayAPIResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayAPIResponse)->withData(...)
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
     * @param AgentGatewayAPI|AgentGatewayAPIShape $data
     */
    public static function with(AgentGatewayAPI|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AgentGatewayAPI|AgentGatewayAPIShape $data
     */
    public function withData(AgentGatewayAPI|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
