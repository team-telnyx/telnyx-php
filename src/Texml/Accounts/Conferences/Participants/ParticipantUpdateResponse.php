<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse\Status;

/**
 * @phpstan-type ParticipantUpdateResponseShape = array{
 *   accountSid?: string|null,
 *   apiVersion?: string|null,
 *   callSid?: string|null,
 *   callSidLegacy?: string|null,
 *   coaching?: bool|null,
 *   coachingCallSid?: string|null,
 *   coachingCallSidLegacy?: string|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   endConferenceOnExit?: bool|null,
 *   hold?: bool|null,
 *   muted?: bool|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class ParticipantUpdateResponse implements BaseModel
{
    /** @use SdkModel<ParticipantUpdateResponseShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Optional('api_version')]
    public ?string $apiVersion;

    /**
     * The identifier of this participant's call.
     */
    #[Optional('call_sid')]
    public ?string $callSid;

    /**
     * The identifier of this participant's call.
     */
    #[Optional('call_sid_legacy')]
    public ?string $callSidLegacy;

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
     * The identifier of the coached participant's call.
     */
    #[Optional('coaching_call_sid_legacy')]
    public ?string $coachingCallSidLegacy;

    /**
     * The timestamp of when the resource was created.
     */
    #[Optional('date_created')]
    public ?string $dateCreated;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Optional('date_updated')]
    public ?string $dateUpdated;

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
        ?string $apiVersion = null,
        ?string $callSid = null,
        ?string $callSidLegacy = null,
        ?bool $coaching = null,
        ?string $coachingCallSid = null,
        ?string $coachingCallSidLegacy = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?bool $endConferenceOnExit = null,
        ?bool $hold = null,
        ?bool $muted = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $apiVersion && $self['apiVersion'] = $apiVersion;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $callSidLegacy && $self['callSidLegacy'] = $callSidLegacy;
        null !== $coaching && $self['coaching'] = $coaching;
        null !== $coachingCallSid && $self['coachingCallSid'] = $coachingCallSid;
        null !== $coachingCallSidLegacy && $self['coachingCallSidLegacy'] = $coachingCallSidLegacy;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
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
     * The version of the API that was used to make the request.
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $self = clone $this;
        $self['apiVersion'] = $apiVersion;

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
     * The identifier of this participant's call.
     */
    public function withCallSidLegacy(string $callSidLegacy): self
    {
        $self = clone $this;
        $self['callSidLegacy'] = $callSidLegacy;

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
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSidLegacy(
        string $coachingCallSidLegacy
    ): self {
        $self = clone $this;
        $self['coachingCallSidLegacy'] = $coachingCallSidLegacy;

        return $self;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

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
