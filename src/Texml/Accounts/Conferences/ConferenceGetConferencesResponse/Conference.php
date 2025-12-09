<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\ReasonConferenceEnded;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetConferencesResponse\Conference\Status;

/**
 * @phpstan-type ConferenceShape = array{
 *   accountSid?: string|null,
 *   apiVersion?: string|null,
 *   callSidEndingConference?: string|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   friendlyName?: string|null,
 *   reasonConferenceEnded?: value-of<ReasonConferenceEnded>|null,
 *   region?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   subresourceUris?: array<string,mixed>|null,
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
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Optional('api_version')]
    public ?string $apiVersion;

    /**
     * Caller ID, if present.
     */
    #[Optional('call_sid_ending_conference')]
    public ?string $callSidEndingConference;

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
     * A string that you assigned to describe this conference room.
     */
    #[Optional('friendly_name')]
    public ?string $friendlyName;

    /**
     * The reason why a conference ended. When a conference is in progress, will be null.
     *
     * @var value-of<ReasonConferenceEnded>|null $reasonConferenceEnded
     */
    #[Optional('reason_conference_ended', enum: ReasonConferenceEnded::class)]
    public ?string $reasonConferenceEnded;

    /**
     * A string representing the region where the conference is hosted.
     */
    #[Optional]
    public ?string $region;

    /**
     * The unique identifier of the conference.
     */
    #[Optional]
    public ?string $sid;

    /**
     * The status of this conference.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * A list of related resources identified by their relative URIs.
     *
     * @var array<string,mixed>|null $subresourceUris
     */
    #[Optional('subresource_uris', map: 'mixed')]
    public ?array $subresourceUris;

    /**
     * The relative URI for this conference.
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
     * @param ReasonConferenceEnded|value-of<ReasonConferenceEnded> $reasonConferenceEnded
     * @param Status|value-of<Status> $status
     * @param array<string,mixed> $subresourceUris
     */
    public static function with(
        ?string $accountSid = null,
        ?string $apiVersion = null,
        ?string $callSidEndingConference = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?string $friendlyName = null,
        ReasonConferenceEnded|string|null $reasonConferenceEnded = null,
        ?string $region = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?array $subresourceUris = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj['accountSid'] = $accountSid;
        null !== $apiVersion && $obj['apiVersion'] = $apiVersion;
        null !== $callSidEndingConference && $obj['callSidEndingConference'] = $callSidEndingConference;
        null !== $dateCreated && $obj['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $friendlyName && $obj['friendlyName'] = $friendlyName;
        null !== $reasonConferenceEnded && $obj['reasonConferenceEnded'] = $reasonConferenceEnded;
        null !== $region && $obj['region'] = $region;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $subresourceUris && $obj['subresourceUris'] = $subresourceUris;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    /**
     * The id of the account the resource belongs to.
     */
    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    /**
     * The version of the API that was used to make the request.
     */
    public function withAPIVersion(string $apiVersion): self
    {
        $obj = clone $this;
        $obj['apiVersion'] = $apiVersion;

        return $obj;
    }

    /**
     * Caller ID, if present.
     */
    public function withCallSidEndingConference(
        string $callSidEndingConference
    ): self {
        $obj = clone $this;
        $obj['callSidEndingConference'] = $callSidEndingConference;

        return $obj;
    }

    /**
     * The timestamp of when the resource was created.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $obj = clone $this;
        $obj['dateCreated'] = $dateCreated;

        return $obj;
    }

    /**
     * The timestamp of when the resource was last updated.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $obj = clone $this;
        $obj['dateUpdated'] = $dateUpdated;

        return $obj;
    }

    /**
     * A string that you assigned to describe this conference room.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendlyName'] = $friendlyName;

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
        $obj['reasonConferenceEnded'] = $reasonConferenceEnded;

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
        $obj['subresourceUris'] = $subresourceUris;

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
