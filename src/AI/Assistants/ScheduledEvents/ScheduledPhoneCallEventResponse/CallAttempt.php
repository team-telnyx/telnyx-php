<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One row in `call_attempts` — captures the terminal outcome of a single dispatch.
 *
 * @phpstan-type CallAttemptShape = array{
 *   attemptNumber: int,
 *   attemptedAt: \DateTimeInterface,
 *   callStatus: string,
 *   callDuration?: int|null,
 *   telnyxCallControlID?: string|null,
 * }
 */
final class CallAttempt implements BaseModel
{
    /** @use SdkModel<CallAttemptShape> */
    use SdkModel;

    #[Required('attempt_number')]
    public int $attemptNumber;

    #[Required('attempted_at')]
    public \DateTimeInterface $attemptedAt;

    /**
     * Values: busy, canceled, no-answer, ringing, completed, failed, in-progress.
     */
    #[Required('call_status')]
    public string $callStatus;

    /**
     * Duration of the call in seconds.
     */
    #[Optional('call_duration')]
    public ?int $callDuration;

    #[Optional('telnyx_call_control_id')]
    public ?string $telnyxCallControlID;

    /**
     * `new CallAttempt()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallAttempt::with(attemptNumber: ..., attemptedAt: ..., callStatus: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallAttempt)
     *   ->withAttemptNumber(...)
     *   ->withAttemptedAt(...)
     *   ->withCallStatus(...)
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
        int $attemptNumber,
        \DateTimeInterface $attemptedAt,
        string $callStatus,
        ?int $callDuration = null,
        ?string $telnyxCallControlID = null,
    ): self {
        $self = new self;

        $self['attemptNumber'] = $attemptNumber;
        $self['attemptedAt'] = $attemptedAt;
        $self['callStatus'] = $callStatus;

        null !== $callDuration && $self['callDuration'] = $callDuration;
        null !== $telnyxCallControlID && $self['telnyxCallControlID'] = $telnyxCallControlID;

        return $self;
    }

    public function withAttemptNumber(int $attemptNumber): self
    {
        $self = clone $this;
        $self['attemptNumber'] = $attemptNumber;

        return $self;
    }

    public function withAttemptedAt(\DateTimeInterface $attemptedAt): self
    {
        $self = clone $this;
        $self['attemptedAt'] = $attemptedAt;

        return $self;
    }

    /**
     * Values: busy, canceled, no-answer, ringing, completed, failed, in-progress.
     */
    public function withCallStatus(string $callStatus): self
    {
        $self = clone $this;
        $self['callStatus'] = $callStatus;

        return $self;
    }

    /**
     * Duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $self = clone $this;
        $self['callDuration'] = $callDuration;

        return $self;
    }

    public function withTelnyxCallControlID(string $telnyxCallControlID): self
    {
        $self = clone $this;
        $self['telnyxCallControlID'] = $telnyxCallControlID;

        return $self;
    }
}
