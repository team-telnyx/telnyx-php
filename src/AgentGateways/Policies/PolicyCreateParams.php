<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Creates a named set of guardrails. It applies from the next request on, to the requests that name it in `policies` and to those its [attachments](https://developers.telnyx.com/api-reference/agent-gateway-policy-attachments/attach-a-policy) match.
 *
 * @see Telnyx\Services\AgentGateways\PoliciesService::create()
 *
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 *
 * @phpstan-type PolicyCreateParamsShape = array{
 *   name: string,
 *   base?: string|null,
 *   description?: string|null,
 *   guardrails?: null|AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape,
 *   model?: string|null,
 *   pipeline?: null|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape,
 * }
 */
final class PolicyCreateParams implements BaseModel
{
    /** @use SdkModel<PolicyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A name, unique on the instance. A request names the policy in its `policies` field.
     */
    #[Required]
    public string $name;

    /**
     * A policy this one builds on, by name. The policy starts with the base's guardrails.
     */
    #[Optional(nullable: true)]
    public ?string $base;

    /**
     * What the policy is for.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * The guardrails a policy adds to its base's, and the ones it removes from them, by name.
     */
    #[Optional]
    public ?AgentGatewayPolicyGuardrails $guardrails;

    /**
     * A condition on the model, by name or regular expression. The policy's guardrails run only on requests for a matching model. `null` matches every model.
     */
    #[Optional(nullable: true)]
    public ?string $model;

    /**
     * Ordered steps that run in place of the policy's guardrails running independently.
     */
    #[Optional(nullable: true)]
    public ?AgentGatewayPolicyPipeline $pipeline;

    /**
     * `new PolicyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyCreateParams)->withName(...)
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
     * @param Omitted|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null $pipeline
     * @param AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape|null $guardrails
     */
    public static function with(
        string $name,
        string|Omitted|null $base = Omitted::VALUE,
        string|Omitted|null $description = Omitted::VALUE,
        string|Omitted|null $model = Omitted::VALUE,
        Omitted|AgentGatewayPolicyPipeline|array|null $pipeline = Omitted::VALUE,
        AgentGatewayPolicyGuardrails|array|null $guardrails = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        Omitted::VALUE !== $base && $self['base'] = $base;
        Omitted::VALUE !== $description && $self['description'] = $description;
        null !== $guardrails && $self['guardrails'] = $guardrails;
        Omitted::VALUE !== $model && $self['model'] = $model;
        Omitted::VALUE !== $pipeline && $self['pipeline'] = $pipeline;

        return $self;
    }

    /**
     * A name, unique on the instance. A request names the policy in its `policies` field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A policy this one builds on, by name. The policy starts with the base's guardrails.
     */
    public function withBase(?string $base): self
    {
        $self = clone $this;
        $self['base'] = $base;

        return $self;
    }

    /**
     * What the policy is for.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The guardrails a policy adds to its base's, and the ones it removes from them, by name.
     *
     * @param AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape $guardrails
     */
    public function withGuardrails(
        AgentGatewayPolicyGuardrails|array $guardrails
    ): self {
        $self = clone $this;
        $self['guardrails'] = $guardrails;

        return $self;
    }

    /**
     * A condition on the model, by name or regular expression. The policy's guardrails run only on requests for a matching model. `null` matches every model.
     */
    public function withModel(?string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Ordered steps that run in place of the policy's guardrails running independently.
     *
     * @param AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null $pipeline
     */
    public function withPipeline(
        AgentGatewayPolicyPipeline|array|null $pipeline
    ): self {
        $self = clone $this;
        $self['pipeline'] = $pipeline;

        return $self;
    }
}
