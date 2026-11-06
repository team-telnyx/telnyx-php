<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A named set of guardrails.
 *
 * @phpstan-import-type AgentGatewayPolicyGuardrailsShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyGuardrails
 * @phpstan-import-type AgentGatewayPolicyPipelineShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline
 *
 * @phpstan-type AgentGatewayPolicyShape = array{
 *   base: string|null,
 *   createdAt: \DateTimeInterface|null,
 *   description: string|null,
 *   guardrails: AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape,
 *   model: string|null,
 *   name: string,
 *   pipeline: null|AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape,
 *   updatedAt: \DateTimeInterface|null,
 * }
 */
final class AgentGatewayPolicy implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyShape> */
    use SdkModel;

    /**
     * A policy this one builds on, by name. The policy starts with the base's guardrails.
     */
    #[Required]
    public ?string $base;

    /**
     * When the policy's current version was created. An update creates a new version.
     */
    #[Required('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * What the policy is for.
     */
    #[Required]
    public ?string $description;

    /**
     * The guardrails a policy adds to its base's, and the ones it removes from them, by name.
     */
    #[Required]
    public AgentGatewayPolicyGuardrails $guardrails;

    /**
     * A condition on the model, by name or regular expression. The policy's guardrails run only on requests for a matching model. `null` matches every model.
     */
    #[Required]
    public ?string $model;

    /**
     * A name, unique on the instance. A request names the policy in its `policies` field.
     */
    #[Required]
    public string $name;

    /**
     * Ordered steps that run in place of the policy's guardrails running independently.
     */
    #[Required]
    public ?AgentGatewayPolicyPipeline $pipeline;

    /**
     * When the policy last changed.
     */
    #[Required('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new AgentGatewayPolicy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicy::with(
     *   base: ...,
     *   createdAt: ...,
     *   description: ...,
     *   guardrails: ...,
     *   model: ...,
     *   name: ...,
     *   pipeline: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicy)
     *   ->withBase(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withGuardrails(...)
     *   ->withModel(...)
     *   ->withName(...)
     *   ->withPipeline(...)
     *   ->withUpdatedAt(...)
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
     * @param AgentGatewayPolicyGuardrails|AgentGatewayPolicyGuardrailsShape $guardrails
     * @param AgentGatewayPolicyPipeline|AgentGatewayPolicyPipelineShape|null $pipeline
     */
    public static function with(
        ?string $base,
        ?\DateTimeInterface $createdAt,
        ?string $description,
        AgentGatewayPolicyGuardrails|array $guardrails,
        ?string $model,
        string $name,
        AgentGatewayPolicyPipeline|array|null $pipeline,
        ?\DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['base'] = $base;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['guardrails'] = $guardrails;
        $self['model'] = $model;
        $self['name'] = $name;
        $self['pipeline'] = $pipeline;
        $self['updatedAt'] = $updatedAt;

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
     * When the policy's current version was created. An update creates a new version.
     */
    public function withCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * A name, unique on the instance. A request names the policy in its `policies` field.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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

    /**
     * When the policy last changed.
     */
    public function withUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
