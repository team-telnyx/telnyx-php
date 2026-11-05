<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyPipeline\Hook;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Ordered steps that run in place of the policy's guardrails running independently.
 *
 * @phpstan-import-type AgentGatewayPolicyStepShape from \Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep
 *
 * @phpstan-type AgentGatewayPolicyPipelineShape = array{
 *   hook: Hook|value-of<Hook>,
 *   steps: list<AgentGatewayPolicyStep|AgentGatewayPolicyStepShape>,
 * }
 */
final class AgentGatewayPolicyPipeline implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyPipelineShape> */
    use SdkModel;

    /**
     * `before_request` runs the steps on the request, and `after_request` on the model's response.
     *
     * @var value-of<Hook> $hook
     */
    #[Required(enum: Hook::class)]
    public string $hook;

    /** @var list<AgentGatewayPolicyStep> $steps */
    #[Required(list: AgentGatewayPolicyStep::class)]
    public array $steps;

    /**
     * `new AgentGatewayPolicyPipeline()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicyPipeline::with(hook: ..., steps: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicyPipeline)->withHook(...)->withSteps(...)
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
     * @param Hook|value-of<Hook> $hook
     * @param list<AgentGatewayPolicyStep|AgentGatewayPolicyStepShape> $steps
     */
    public static function with(Hook|string $hook, array $steps): self
    {
        $self = new self;

        $self['hook'] = $hook;
        $self['steps'] = $steps;

        return $self;
    }

    /**
     * `before_request` runs the steps on the request, and `after_request` on the model's response.
     *
     * @param Hook|value-of<Hook> $hook
     */
    public function withHook(Hook|string $hook): self
    {
        $self = clone $this;
        $self['hook'] = $hook;

        return $self;
    }

    /**
     * @param list<AgentGatewayPolicyStep|AgentGatewayPolicyStepShape> $steps
     */
    public function withSteps(array $steps): self
    {
        $self = clone $this;
        $self['steps'] = $steps;

        return $self;
    }
}
