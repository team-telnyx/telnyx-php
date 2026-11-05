<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayPolicyShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicy
 *
 * @phpstan-type AgentGatewayPolicyResponseShape = array{
 *   data: AgentGatewayPolicy|AgentGatewayPolicyShape
 * }
 */
final class AgentGatewayPolicyResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyResponseShape> */
    use SdkModel;

    /**
     * A named set of guardrails.
     */
    #[Required]
    public AgentGatewayPolicy $data;

    /**
     * `new AgentGatewayPolicyResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicyResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicyResponse)->withData(...)
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
     * @param AgentGatewayPolicy|AgentGatewayPolicyShape $data
     */
    public static function with(AgentGatewayPolicy|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A named set of guardrails.
     *
     * @param AgentGatewayPolicy|AgentGatewayPolicyShape $data
     */
    public function withData(AgentGatewayPolicy|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
