<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Guardrails;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayGuardrailShape from \Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrail
 *
 * @phpstan-type GuardrailListResponseShape = array{
 *   data: list<AgentGatewayGuardrail|AgentGatewayGuardrailShape>
 * }
 */
final class GuardrailListResponse implements BaseModel
{
    /** @use SdkModel<GuardrailListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayGuardrail> $data */
    #[Required(list: AgentGatewayGuardrail::class)]
    public array $data;

    /**
     * `new GuardrailListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GuardrailListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GuardrailListResponse)->withData(...)
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
     * @param list<AgentGatewayGuardrail|AgentGatewayGuardrailShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayGuardrail|AgentGatewayGuardrailShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
