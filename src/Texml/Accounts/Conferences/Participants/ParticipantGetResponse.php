<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse\Status;

/**
 * @phpstan-type participant_get_response = array{
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
final class ParticipantGetResponse implements BaseModel
{
    /** @use SdkModel<participant_get_response> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Api('api_version', optional: true)]
    public ?string $apiVersion;

    /**
     * The identifier of this participant's call.
     */
    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    /**
     * The identifier of this participant's call.
     */
    #[Api('call_sid_legacy', optional: true)]
    public ?string $callSidLegacy;

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
     * The identifier of the coached participant's call.
     */
    #[Api('coaching_call_sid_legacy', optional: true)]
    public ?string $coachingCallSidLegacy;

    /**
     * The timestamp of when the resource was created.
     */
    #[Api('date_created', optional: true)]
    public ?string $dateCreated;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Api('date_updated', optional: true)]
    public ?string $dateUpdated;

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
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $apiVersion && $obj->apiVersion = $apiVersion;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $callSidLegacy && $obj->callSidLegacy = $callSidLegacy;
        null !== $coaching && $obj->coaching = $coaching;
        null !== $coachingCallSid && $obj->coachingCallSid = $coachingCallSid;
        null !== $coachingCallSidLegacy && $obj->coachingCallSidLegacy = $coachingCallSidLegacy;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
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
     * The version of the API that was used to make the request.
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $obj = clone $this;
        $obj->apiVersion = $apiVersion;

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
     * The identifier of this participant's call.
     */
    public function withCallSidLegacy(string $callSidLegacy): self
    {
        $obj = clone $this;
        $obj->callSidLegacy = $callSidLegacy;

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
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSidLegacy(
        string $coachingCallSidLegacy
    ): self {
        $obj = clone $this;
        $obj->coachingCallSidLegacy = $coachingCallSidLegacy;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

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
