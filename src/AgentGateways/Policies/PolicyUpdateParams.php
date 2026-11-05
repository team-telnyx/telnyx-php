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
 * Changes a policy, which publishes a new version of it. A field left out stays as it is; `guardrails` and `pipeline` are replaced whole, and `model: null` removes the condition.
 *
 * @see Telnyx\Services\AgentGateways\PoliciesService::update()
 *
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 *
 * @phpstan-type PolicyUpdateParamsShape = array{
 *   instanceID: string,
 *   base?: string|null,
 *   description?: string|null,
 *   guardrails?: null|AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape,
 *   model?: string|null,
 *   pipeline?: null|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape,
 * }
 */
final class PolicyUpdateParams implements BaseModel
{
    /** @use SdkModel<PolicyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $instanceID;

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
     * `new PolicyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PolicyUpdateParams::with(instanceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PolicyUpdateParams)->withInstanceID(...)
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
        string $instanceID,
        string|Omitted|null $base = Omitted::VALUE,
        string|Omitted|null $description = Omitted::VALUE,
        string|Omitted|null $model = Omitted::VALUE,
        Omitted|AgentGatewayPolicyPipeline|array|null $pipeline = Omitted::VALUE,
        AgentGatewayPolicyGuardrails|array|null $guardrails = null,
    ): self {
        $self = new self;

        $self['instanceID'] = $instanceID;

        Omitted::VALUE !== $base && $self['base'] = $base;
        Omitted::VALUE !== $description && $self['description'] = $description;
        null !== $guardrails && $self['guardrails'] = $guardrails;
        Omitted::VALUE !== $model && $self['model'] = $model;
        Omitted::VALUE !== $pipeline && $self['pipeline'] = $pipeline;

        return $self;
    }

    public function withInstanceID(string $instanceID): self
    {
        $self = clone $this;
        $self['instanceID'] = $instanceID;

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
