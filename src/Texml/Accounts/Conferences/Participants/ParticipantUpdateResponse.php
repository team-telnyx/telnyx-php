<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse\Status;

/**
 * @phpstan-type ParticipantUpdateResponseShape = array{
 *   account_sid?: string|null,
 *   api_version?: string|null,
 *   call_sid?: string|null,
 *   call_sid_legacy?: string|null,
 *   coaching?: bool|null,
 *   coaching_call_sid?: string|null,
 *   coaching_call_sid_legacy?: string|null,
 *   date_created?: string|null,
 *   date_updated?: string|null,
 *   end_conference_on_exit?: bool|null,
 *   hold?: bool|null,
 *   muted?: bool|null,
 *   status?: value-of<Status>|null,
 *   uri?: string|null,
 * }
 */
final class ParticipantUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ParticipantUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The id of the account the resource belongs to.
     */
    #[Api(optional: true)]
    public ?string $account_sid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Api(optional: true)]
    public ?string $api_version;

    /**
     * The identifier of this participant's call.
     */
    #[Api(optional: true)]
    public ?string $call_sid;

    /**
     * The identifier of this participant's call.
     */
    #[Api(optional: true)]
    public ?string $call_sid_legacy;

    /**
     * Whether the participant is coaching another call.
     */
    #[Api(optional: true)]
    public ?bool $coaching;

    /**
     * The identifier of the coached participant's call.
     */
    #[Api(optional: true)]
    public ?string $coaching_call_sid;

    /**
     * The identifier of the coached participant's call.
     */
    #[Api(optional: true)]
    public ?string $coaching_call_sid_legacy;

    /**
     * The timestamp of when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $date_created;

    /**
     * The timestamp of when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $date_updated;

    /**
     * Whether the conference ends when the participant leaves.
     */
    #[Api(optional: true)]
    public ?bool $end_conference_on_exit;

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
        ?string $account_sid = null,
        ?string $api_version = null,
        ?string $call_sid = null,
        ?string $call_sid_legacy = null,
        ?bool $coaching = null,
        ?string $coaching_call_sid = null,
        ?string $coaching_call_sid_legacy = null,
        ?string $date_created = null,
        ?string $date_updated = null,
        ?bool $end_conference_on_exit = null,
        ?bool $hold = null,
        ?bool $muted = null,
        Status|string|null $status = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj->account_sid = $account_sid;
        null !== $api_version && $obj->api_version = $api_version;
        null !== $call_sid && $obj->call_sid = $call_sid;
        null !== $call_sid_legacy && $obj->call_sid_legacy = $call_sid_legacy;
        null !== $coaching && $obj->coaching = $coaching;
        null !== $coaching_call_sid && $obj->coaching_call_sid = $coaching_call_sid;
        null !== $coaching_call_sid_legacy && $obj->coaching_call_sid_legacy = $coaching_call_sid_legacy;
        null !== $date_created && $obj->date_created = $date_created;
        null !== $date_updated && $obj->date_updated = $date_updated;
        null !== $end_conference_on_exit && $obj->end_conference_on_exit = $end_conference_on_exit;
        null !== $hold && $obj->hold = $hold;
        null !== $muted && $obj->muted = $muted;
        null !== $status && $obj['status'] = $status;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->account_sid = $accountSid;

        return $obj;
    }

    /**
     * The version of the API that was used to make the request.
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $obj = clone $this;
        $obj->api_version = $apiVersion;

        return $obj;
    }

    /**
     * The identifier of this participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->call_sid = $callSid;

        return $obj;
    }

    /**
     * The identifier of this participant's call.
     */
    public function withCallSidLegacy(string $callSidLegacy): self
    {
        $obj = clone $this;
        $obj->call_sid_legacy = $callSidLegacy;

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
        $obj->coaching_call_sid = $coachingCallSid;

        return $obj;
    }

    /**
     * The identifier of the coached participant's call.
     */
    public function withCoachingCallSidLegacy(
        string $coachingCallSidLegacy
    ): self {
        $obj = clone $this;
        $obj->coaching_call_sid_legacy = $coachingCallSidLegacy;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj->date_created = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj->date_updated = $dateUpdated;

        return $obj;
    }

    /**
     * Whether the conference ends when the participant leaves.
     */
    public function withEndConferenceOnExit(bool $endConferenceOnExit): self
    {
        $obj = clone $this;
        $obj->end_conference_on_exit = $endConferenceOnExit;

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
        $obj['status'] = $status;

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
