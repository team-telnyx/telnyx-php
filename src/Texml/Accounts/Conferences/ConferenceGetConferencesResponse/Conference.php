<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\ReasonConferenceEnded;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\Status;

/**
 * @phpstan-type ConferenceShape = array{
 *   account_sid?: string|null,
 *   api_version?: string|null,
 *   call_sid_ending_conference?: string|null,
 *   date_created?: string|null,
 *   date_updated?: string|null,
 *   friendly_name?: string|null,
 *   reason_conference_ended?: value-of<ReasonConferenceEnded>|null,
 *   region?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   subresource_uris?: array<string,mixed>|null,
 *   uri?: string|null,
 * }
 */
final class Conference implements BaseModel
{
    /** @use SdkModel<ConferenceShape> */
    use SdkModel;

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
     * Caller ID, if present.
     */
    #[Api(optional: true)]
    public ?string $call_sid_ending_conference;

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
     * A string that you assigned to describe this conference room.
     */
    #[Api(optional: true)]
    public ?string $friendly_name;

    /**
     * The reason why a conference ended. When a conference is in progress, will be null.
     *
     * @var value-of<ReasonConferenceEnded>|null $reason_conference_ended
     */
    #[Api(enum: ReasonConferenceEnded::class, optional: true)]
    public ?string $reason_conference_ended;

    /**
     * A string representing the region where the conference is hosted.
     */
    #[Api(optional: true)]
    public ?string $region;

    /**
     * The unique identifier of the conference.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The status of this conference.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * A list of related resources identified by their relative URIs.
     *
     * @var array<string,mixed>|null $subresource_uris
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $subresource_uris;

    /**
     * The relative URI for this conference.
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
     * @param ReasonConferenceEnded|value-of<ReasonConferenceEnded> $reason_conference_ended
     * @param Status|value-of<Status> $status
     * @param array<string,mixed> $subresource_uris
     */
    public static function with(
        ?string $account_sid = null,
        ?string $api_version = null,
        ?string $call_sid_ending_conference = null,
        ?string $date_created = null,
        ?string $date_updated = null,
        ?string $friendly_name = null,
        ReasonConferenceEnded|string|null $reason_conference_ended = null,
        ?string $region = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?array $subresource_uris = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $api_version && $obj['api_version'] = $api_version;
        null !== $call_sid_ending_conference && $obj['call_sid_ending_conference'] = $call_sid_ending_conference;
        null !== $date_created && $obj['date_created'] = $date_created;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $friendly_name && $obj['friendly_name'] = $friendly_name;
        null !== $reason_conference_ended && $obj['reason_conference_ended'] = $reason_conference_ended;
        null !== $region && $obj['region'] = $region;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $subresource_uris && $obj['subresource_uris'] = $subresource_uris;
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
     * The version of the API that was used to make the request.
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $obj = clone $this;
        $obj['api_version'] = $apiVersion;

        return $obj;
    }

    /**
     * Caller ID, if present.
     */
    public function withCallSidEndingConference(
        string $callSidEndingConference
    ): self {
        $obj = clone $this;
        $obj['call_sid_ending_conference'] = $callSidEndingConference;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj['date_created'] = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['date_updated'] = $dateUpdated;

        return $obj;
    }

    /**
     * A string that you assigned to describe this conference room.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendly_name'] = $friendlyName;

        return $obj;
    }

    /**
     * The reason why a conference ended. When a conference is in progress, will be null.
     *
     * @param ReasonConferenceEnded|value-of<ReasonConferenceEnded> $reasonConferenceEnded
     */
    public function withReasonConferenceEnded(
        ReasonConferenceEnded|string $reasonConferenceEnded
    ): self {
        $obj = clone $this;
        $obj['reason_conference_ended'] = $reasonConferenceEnded;

        return $obj;
    }

    /**
     * A string representing the region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * The unique identifier of the conference.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * The status of this conference.
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
     * A list of related resources identified by their relative URIs.
     *
     * @param array<string,mixed> $subresourceUris
     */
    public function withSubresourceUris(array $subresourceUris): self
    {
        $obj = clone $this;
        $obj['subresource_uris'] = $subresourceUris;

        return $obj;
    }

    /**
     * The relative URI for this conference.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
