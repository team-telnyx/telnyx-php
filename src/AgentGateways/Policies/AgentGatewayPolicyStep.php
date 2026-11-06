<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\Policies;

use Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep\OnError;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep\OnFail;
use Telnyx\AgentGateways\Policies\AgentGatewayPolicyStep\OnPass;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * One pipeline step: a guardrail, and what happens when it passes, fails, or errors.
 *
 * @phpstan-type AgentGatewayPolicyStepShape = array{
 *   guardrail: string,
 *   message?: string|null,
 *   onError?: null|OnError|value-of<OnError>,
 *   onFail?: null|OnFail|value-of<OnFail>,
 *   onPass?: null|OnPass|value-of<OnPass>,
 *   passData?: bool|null,
 * }
 */
final class AgentGatewayPolicyStep implements BaseModel
{
    /** @use SdkModel<AgentGatewayPolicyStepShape> */
    use SdkModel;

    /**
     * A guardrail on the instance, by name.
     */
    #[Required]
    public string $guardrail;

    /**
     * The response that replaces the model's when an outcome is `respond`. Required with `respond`.
     */
    #[Optional(nullable: true)]
    public ?string $message;

    /**
     * What happens when the guardrail errors. Left out, the same as `on_fail`.
     *
     * @var value-of<OnError>|null $onError
     */
    #[Optional('on_error', enum: OnError::class, nullable: true)]
    public ?string $onError;

    /**
     * What happens when the guardrail fails.
     *
     * @var value-of<OnFail>|null $onFail
     */
    #[Optional('on_fail', enum: OnFail::class)]
    public ?string $onFail;

    /**
     * What happens when the guardrail passes. `next` goes on to the next step, `allow` allows the request, `block` blocks it, and `respond` answers with `message`.
     *
     * @var value-of<OnPass>|null $onPass
     */
    #[Optional('on_pass', enum: OnPass::class)]
    public ?string $onPass;

    /**
     * `true` hands the step's modified request, such as masked text, to the next step.
     */
    #[Optional('pass_data')]
    public ?bool $passData;

    /**
     * `new AgentGatewayPolicyStep()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayPolicyStep::with(guardrail: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayPolicyStep)->withGuardrail(...)
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
     * @param Omitted|OnError|value-of<OnError>|null $onError
     * @param OnFail|value-of<OnFail>|null $onFail
     * @param OnPass|value-of<OnPass>|null $onPass
     */
    public static function with(
        string $guardrail,
        string|Omitted|null $message = Omitted::VALUE,
        Omitted|OnError|string|null $onError = Omitted::VALUE,
        OnFail|string|null $onFail = null,
        OnPass|string|null $onPass = null,
        ?bool $passData = null,
    ): self {
        $self = new self;

        $self['guardrail'] = $guardrail;

        Omitted::VALUE !== $message && $self['message'] = $message;
        Omitted::VALUE !== $onError && $self['onError'] = $onError;
        null !== $onFail && $self['onFail'] = $onFail;
        null !== $onPass && $self['onPass'] = $onPass;
        null !== $passData && $self['passData'] = $passData;

        return $self;
    }

    /**
     * A guardrail on the instance, by name.
     */
    public function withGuardrail(string $guardrail): self
    {
        $self = clone $this;
        $self['guardrail'] = $guardrail;

        return $self;
    }

    /**
     * The response that replaces the model's when an outcome is `respond`. Required with `respond`.
     */
    public function withMessage(?string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * What happens when the guardrail errors. Left out, the same as `on_fail`.
     *
     * @param OnError|value-of<OnError>|null $onError
     */
    public function withOnError(OnError|string|null $onError): self
    {
        $self = clone $this;
        $self['onError'] = $onError;

        return $self;
    }

    /**
     * What happens when the guardrail fails.
     *
     * @param OnFail|value-of<OnFail> $onFail
     */
    public function withOnFail(OnFail|string $onFail): self
    {
        $self = clone $this;
        $self['onFail'] = $onFail;

        return $self;
    }

    /**
     * What happens when the guardrail passes. `next` goes on to the next step, `allow` allows the request, `block` blocks it, and `respond` answers with `message`.
     *
     * @param OnPass|value-of<OnPass> $onPass
     */
    public function withOnPass(OnPass|string $onPass): self
    {
        $self = clone $this;
        $self['onPass'] = $onPass;

        return $self;
    }

    /**
     * `true` hands the step's modified request, such as masked text, to the next step.
     */
    public function withPassData(bool $passData): self
    {
        $self = clone $this;
        $self['passData'] = $passData;

        return $self;
    }
}
