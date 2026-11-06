<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AgentGatewayPolicyShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicy
 *
 * @phpstan-type PolicyListResponseShape = array{
 *   data: list<AgentGatewayPolicy|AgentGatewayPolicyShape>
 * }
 */
final class PolicyListResponse implements BaseModel
{
    /** @use SdkModel<PolicyListResponseShape> */
    use SdkModel;

    /** @var list<AgentGatewayPolicy> $data */
    #[Required(list: AgentGatewayPolicy::class)]
    public array $data;

    /**
     * `new PolicyListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyListResponse)->withData(...)
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
     * @param list<AgentGatewayPolicy|AgentGatewayPolicyShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<AgentGatewayPolicy|AgentGatewayPolicyShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
