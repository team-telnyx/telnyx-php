<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse\Status;

/**
 * @phpstan-type participant_participants_response = array{
 *   accountSid?: string,
 *   callSid?: string,
 *   coaching?: bool,
 *   coachingCallSid?: string,
 *   endConferenceOnExit?: bool,
 *   hold?: bool,
 *   muted?: bool,
 *   status?: value-of<Status>,
 *   uri?: string,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ParticipantParticipantsResponse implements BaseModel
{
    /** @use SdkModel<participant_participants_response> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    /**
     * The identifier of this participant's call.
     */
    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    /**
     * Whether the participant is coaching another call.
     */
    #[Api(optional: true)]
    public ?bool $coaching;

    /**
     * The identifier of the coached participant's call.
     */
    #[Api('coaching_call_sid', optional: true)]
    public ?string $coachingCallSid;

    /**
     * Whether the conference ends when the participant leaves.
     */
    #[Api('end_conference_on_exit', optional: true)]
    public ?bool $endConferenceOnExit;

    /**
     * Whether the participant is on hold.
     */
    #[Api(optional: true)]
    public ?bool $hold;

    /**
     * Whether the participant is muted.
     */
    #[Api(optional: true)]
    public ?bool $muted;

    /**
     * The status of the participant's call in the conference.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The relative URI for this participant.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $coaching && $obj->coaching = $coaching;
        null !== $coachingCallSid && $obj->coachingCallSid = $coachingCallSid;
        null !== $endConferenceOnExit && $obj->endConferenceOnExit = $endConferenceOnExit;
        null !== $hold && $obj->hold = $hold;
        null !== $muted && $obj->muted = $muted;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * The identifier of this participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->callSid = $callSid;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj->coaching = $coaching;

        return $obj;
    }

    /**
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSid(string $coachingCallSid): self
    {
        $obj = clone $this;
        $obj->coachingCallSid = $coachingCallSid;

        return $obj;
    }

    /**
     * Whether the conference ends when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->endConferenceOnExit = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant is on hold.
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj->hold = $hold;

        return $obj;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj->muted = $muted;

        return $obj;
    }

    /**
     * The status of the participant's call in the conference.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The relative URI for this participant.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
