<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayGuardrailShape from \Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrail
 *
 * @phpstan-type AgentGatewayGuardrailResponseShape = array{
 *   data: AgentGatewayGuardrail|AgentGatewayGuardrailShape
 * }
 */
final class AgentGatewayGuardrailResponse implements BaseModel
{
    /** @use SdkModel<AgentGatewayGuardrailResponseShape> */
    use SdkModel;

    #[Required]
    public AgentGatewayGuardrail $data;

    /**
     * `new AgentGatewayGuardrailResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayGuardrailResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayGuardrailResponse)->withData(...)
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
     * @param AgentGatewayGuardrail|AgentGatewayGuardrailShape $data
     */
    public static function with(AgentGatewayGuardrail|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AgentGatewayGuardrail|AgentGatewayGuardrailShape $data
     */
    public function withData(AgentGatewayGuardrail|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
