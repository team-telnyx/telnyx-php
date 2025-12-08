<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse\Status;

/**
 * @phpstan-type ParticipantParticipantsResponseShape = array{
 *   account_sid?: string|null,
 *   call_sid?: string|null,
 *   coaching?: bool|null,
 *   coaching_call_sid?: string|null,
 *   end_conference_on_exit?: bool|null,
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
    #[Optional]
    public ?string $account_sid;

    /**
     * The identifier of this participant's call.
     */
    #[Optional]
    public ?string $call_sid;

    /**
     * Whether the participant is coaching another call.
     */
    #[Optional]
    public ?bool $coaching;

    /**
     * The identifier of the coached participant's call.
     */
    #[Optional]
    public ?string $coaching_call_sid;

    /**
     * Whether the conference ends when the participant leaves.
     */
    #[Optional]
    public ?bool $end_conference_on_exit;

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
        ?string $account_sid = null,
        ?string $call_sid = null,
        ?bool $coaching = null,
        ?string $coaching_call_sid = null,
        ?bool $end_conference_on_exit = null,
        ?bool $hold = null,
        ?bool $muted = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $call_sid && $obj['call_sid'] = $call_sid;
        null !== $coaching && $obj['coaching'] = $coaching;
        null !== $coaching_call_sid && $obj['coaching_call_sid'] = $coaching_call_sid;
        null !== $end_conference_on_exit && $obj['end_conference_on_exit'] = $end_conference_on_exit;
        null !== $hold && $obj['hold'] = $hold;
        null !== $muted && $obj['muted'] = $muted;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * The identifier of this participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

        return $obj;
    }

    /**
     * Whether the participant is coaching another call.
     */
    public function withCoaching(bool $coaching): self
    {
        $obj = clone $this;
        $obj['coaching'] = $coaching;

        return $obj;
    }

    /**
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSid(string $coachingCallSid): self
    {
        $obj = clone $this;
        $obj['coaching_call_sid'] = $coachingCallSid;

        return $obj;
    }

    /**
     * Whether the conference ends when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj['end_conference_on_exit'] = $endConferenceOnExit;

        return $obj;
    }

    /**
     * Whether the participant is on hold.
     */
    public function withHold(bool $hold): self
    {
        $obj = clone $this;
        $obj['hold'] = $hold;

        return $obj;
    }

    /**
     * Whether the participant is muted.
     */
    public function withMuted(bool $muted): self
    {
        $obj = clone $this;
        $obj['muted'] = $muted;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The relative URI for this participant.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
