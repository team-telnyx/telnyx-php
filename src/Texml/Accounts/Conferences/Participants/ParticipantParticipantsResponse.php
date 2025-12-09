<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse\Status;

/**
 * @phpstan-type ParticipantParticipantsResponseShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   coaching?: bool|null,
 *   coachingCallSid?: string|null,
 *   endConferenceOnExit?: bool|null,
 *   hold?: bool|null,
 *   muted?: bool|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class ParticipantParticipantsResponse implements BaseModel
{
    /** @use SdkModel<ParticipantParticipantsResponseShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The identifier of this participant's call.
     */
    #[Optional('call_sid')]
    public ?string $callSid;

    /**
     * Whether the participant is coaching another call.
     */
    #[Optional]
    public ?bool $coaching;

    /**
     * The identifier of the coached participant's call.
     */
    #[Optional('coaching_call_sid')]
    public ?string $coachingCallSid;

    /**
     * Whether the conference ends when the participant leaves.
     */
    #[Optional('end_conference_on_exit')]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant is on hold.
     */
    #[Optional]
    public ?bool $hold;

    /**
     * Whether the participant is muted.
     */
    #[Optional]
    public ?bool $muted;

    /**
     * The status of the participant's call in the conference.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The relative URI for this participant.
     */
    #[Optional]
    public ?string $uri;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?bool $coaching = null,
        ?string $coachingCallSid = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?bool $muted = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $coaching && $self['coaching'] = $coaching;
        null !== $coachingCallSid && $self['coachingCallSid'] = $coachingCallSid;
        null !== $endConferenceOnExit && $self['endConferenceOnExit'] = $endConferenceOnExit;
        null !== $hold && $self['hold'] = $hold;
        null !== $muted && $self['muted'] = $muted;
        null !== $status && $self['status'] = $status;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The identifier of this participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    /**
     * Whether the participant is coaching another call.
     */
    public function withCoaching(bool $coaching): self
    {
        $self = clone $this;
        $self['coaching'] = $coaching;

        return $self;
    }

    /**
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSid(string $coachingCallSid): self
    {
        $self = clone $this;
        $self['coachingCallSid'] = $coachingCallSid;

        return $self;
    }

    /**
     * Whether the conference ends when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $self = clone $this;
        $self['endConferenceOnExit'] = $endConferenceOnExit;

        return $self;
    }

    /**
     * Whether the participant is on hold.
     */
    public function withHold(bool $hold): self
    {
        $self = clone $this;
        $self['hold'] = $hold;

        return $self;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $self = clone $this;
        $self['muted'] = $muted;

        return $self;
    }

    /**
     * The status of the participant's call in the conference.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The relative URI for this participant.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
