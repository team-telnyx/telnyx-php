<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse\Data\UsageExportInferenceRequest;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TimingsShape = array{
 *   admittedAt: \DateTimeInterface,
 *   completedAt: \DateTimeInterface|null,
 *   firstAttemptAt: \DateTimeInterface|null,
 *   gatewayDurationMs: int|null,
 *   settledAt: \DateTimeInterface,
 * }
 */
final class Timings implements BaseModel
{
    /** @use SdkModel<TimingsShape> */
    use SdkModel;

    #[Required('admitted_at')]
    public \DateTimeInterface $admittedAt;

    #[Required('completed_at')]
    public ?\DateTimeInterface $completedAt;

    #[Required('first_attempt_at')]
    public ?\DateTimeInterface $firstAttemptAt;

    /**
     * completed_at - admitted_at as recorded by the ledger; not time to first token.
     */
    #[Required('gateway_duration_ms')]
    public ?int $gatewayDurationMs;

    #[Required('settled_at')]
    public \DateTimeInterface $settledAt;

    /**
     * `new Timings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Timings::with(
     *   admittedAt: ...,
     *   completedAt: ...,
     *   firstAttemptAt: ...,
     *   gatewayDurationMs: ...,
     *   settledAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Timings)
     *   ->withAdmittedAt(...)
     *   ->withCompletedAt(...)
     *   ->withFirstAttemptAt(...)
     *   ->withGatewayDurationMs(...)
     *   ->withSettledAt(...)
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
     */
    public static function with(
        \DateTimeInterface $admittedAt,
        ?\DateTimeInterface $completedAt,
        ?\DateTimeInterface $firstAttemptAt,
        ?int $gatewayDurationMs,
        \DateTimeInterface $settledAt,
    ): self {
        $self = new self;

        $self['admittedAt'] = $admittedAt;
        $self['completedAt'] = $completedAt;
        $self['firstAttemptAt'] = $firstAttemptAt;
        $self['gatewayDurationMs'] = $gatewayDurationMs;
        $self['settledAt'] = $settledAt;

        return $self;
    }

    public function withAdmittedAt(\DateTimeInterface $admittedAt): self
    {
        $self = clone $this;
        $self['admittedAt'] = $admittedAt;

        return $self;
    }

    public function withCompletedAt(?\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    public function withFirstAttemptAt(
        ?\DateTimeInterface $firstAttemptAt
    ): self {
        $self = clone $this;
        $self['firstAttemptAt'] = $firstAttemptAt;

        return $self;
    }

    /**
     * completed_at - admitted_at as recorded by the ledger; not time to first token.
     */
    public function withGatewayDurationMs(?int $gatewayDurationMs): self
    {
        $self = clone $this;
        $self['gatewayDurationMs'] = $gatewayDurationMs;

        return $self;
    }

    public function withSettledAt(\DateTimeInterface $settledAt): self
    {
        $self = clone $this;
        $self['settledAt'] = $settledAt;

        return $self;
    }
}
