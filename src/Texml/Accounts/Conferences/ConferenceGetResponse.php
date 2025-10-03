<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse\ReasonConferenceEnded;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetResponse\Status;

/**
 * @phpstan-type conference_get_response = array{
 *   accountSid?: string,
 *   apiVersion?: string,
 *   callSidEndingConference?: string,
 *   dateCreated?: string,
 *   dateUpdated?: string,
 *   friendlyName?: string,
 *   reasonConferenceEnded?: value-of<ReasonConferenceEnded>,
 *   region?: string,
 *   sid?: string,
 *   status?: value-of<Status>,
 *   subresourceUris?: array<string, mixed>,
 *   uri?: string,
 * }
 */
final class ConferenceGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<conference_get_response> */
    use SdkModel;

    use SdkResponse;

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
     * Caller ID, if present.
     */
    #[Api('call_sid_ending_conference', optional: true)]
    public ?string $callSidEndingConference;

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
     * A string that you assigned to describe this conference room.
     */
    #[Api('friendly_name', optional: true)]
    public ?string $friendlyName;

    /**
     * The reason why a conference ended. When a conference is in progress, will be null.
     *
     * @var value-of<ReasonConferenceEnded>|null $reasonConferenceEnded
     */
    #[Api(
        'reason_conference_ended',
        enum: ReasonConferenceEnded::class,
        optional: true,
    )]
    public ?string $reasonConferenceEnded;

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
     * @var array<string, mixed>|null $subresourceUris
     */
    #[Api('subresource_uris', map: 'mixed', optional: true)]
    public ?array $subresourceUris;

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
     * @param ReasonConferenceEnded|value-of<ReasonConferenceEnded> $reasonConferenceEnded
     * @param Status|value-of<Status> $status
     * @param array<string, mixed> $subresourceUris
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

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $apiVersion && $obj->apiVersion = $apiVersion;
        null !== $callSidEndingConference && $obj->callSidEndingConference = $callSidEndingConference;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $friendlyName && $obj->friendlyName = $friendlyName;
        null !== $reasonConferenceEnded && $obj['reasonConferenceEnded'] = $reasonConferenceEnded;
        null !== $region && $obj->region = $region;
        null !== $sid && $obj->sid = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $subresourceUris && $obj->subresourceUris = $subresourceUris;
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
     * Caller ID, if present.
     */
    public function withCallSidEndingConference(
        string $callSidEndingConference
    ): self {
        $obj = clone $this;
        $obj->callSidEndingConference = $callSidEndingConference;

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
     * A string that you assigned to describe this conference room.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->friendlyName = $friendlyName;

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
        $obj->region = $region;

        return $obj;
    }

    /**
     * The unique identifier of the conference.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

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
     * @param array<string, mixed> $subresourceUris
     */
    public function withSubresourceUris(array $subresourceUris): self
    {
        $obj = clone $this;
        $obj->subresourceUris = $subresourceUris;

        return $obj;
    }

    /**
     * The relative URI for this conference.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
