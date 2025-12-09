<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse\ReasonConferenceEnded;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse\Status;

/**
 * @phpstan-type ConferenceGetResponseShape = array{
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
final class ConferenceGetResponse implements BaseModel
{
    /** @use SdkModel<ConferenceGetResponseShape> */
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
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $apiVersion && $self['apiVersion'] = $apiVersion;
        null !== $callSidEndingConference && $self['callSidEndingConference'] = $callSidEndingConference;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $reasonConferenceEnded && $self['reasonConferenceEnded'] = $reasonConferenceEnded;
        null !== $region && $self['region'] = $region;
        null !== $sid && $self['sid'] = $sid;
        null !== $status && $self['status'] = $status;
        null !== $subresourceUris && $self['subresourceUris'] = $subresourceUris;
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
     * Caller ID, if present.
     */
    public function withCallSidEndingConference(
        string $callSidEndingConference
    ): self {
        $self = clone $this;
        $self['callSidEndingConference'] = $callSidEndingConference;

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
     * A string that you assigned to describe this conference room.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * The reason why a conference ended. When a conference is in progress, will be null.
     *
     * @param ReasonConferenceEnded|value-of<ReasonConferenceEnded> $reasonConferenceEnded
     */
    public function withReasonConferenceEnded(
        ReasonConferenceEnded|string $reasonConferenceEnded
    ): self {
        $self = clone $this;
        $self['reasonConferenceEnded'] = $reasonConferenceEnded;

        return $self;
    }

    /**
     * A string representing the region where the conference is hosted.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * The unique identifier of the conference.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * The status of this conference.
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
     * A list of related resources identified by their relative URIs.
     *
     * @param array<string,mixed> $subresourceUris
     */
    public function withSubresourceUris(array $subresourceUris): self
    {
        $self = clone $this;
        $self['subresourceUris'] = $subresourceUris;

        return $self;
    }

    /**
     * The relative URI for this conference.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
