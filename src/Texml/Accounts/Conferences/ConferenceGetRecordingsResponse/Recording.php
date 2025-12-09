<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Source;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Status;

/**
 * @phpstan-type RecordingShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   channels?: int|null,
 *   conferenceSid?: string|null,
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   duration?: int|null,
 *   errorCode?: string|null,
 *   mediaURL?: string|null,
 *   sid?: string|null,
 *   source?: value-of<Source>|null,
 *   startTime?: string|null,
 *   status?: value-of<Status>|null,
 *   subresourceUris?: array<string,mixed>|null,
 *   uri?: string|null,
 * }
 */
final class Recording implements BaseModel
{
    /** @use SdkModel<RecordingShape> */
    use SdkModel;

    /**
     * The id of the account the resource belongs to.
     */
    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The identifier of the related participant's call.
     */
    #[Optional('call_sid')]
    public ?string $callSid;

    /**
     * The number of channels in the recording.
     */
    #[Optional]
    public ?int $channels;

    /**
     * The identifier of the related conference.
     */
    #[Optional('conference_sid')]
    public ?string $conferenceSid;

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
     * Duratin of the recording in seconds.
     */
    #[Optional]
    public ?int $duration;

    /**
     * The recording error, if any.
     */
    #[Optional('error_code')]
    public ?string $errorCode;

    /**
     * The URL to use to download the recording.
     */
    #[Optional('media_url')]
    public ?string $mediaURL;

    /**
     * The unique identifier of the recording.
     */
    #[Optional]
    public ?string $sid;

    /**
     * How the recording was started.
     *
     * @var value-of<Source>|null $source
     */
    #[Optional(enum: Source::class)]
    public ?string $source;

    /**
     * The timestamp of when the recording was started.
     */
    #[Optional('start_time')]
    public ?string $startTime;

    /**
     * The status of the recording.
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
     * The relative URI for this recording.
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
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param array<string,mixed> $subresourceUris
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?int $channels = null,
        ?string $conferenceSid = null,
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?int $duration = null,
        ?string $errorCode = null,
        ?string $mediaURL = null,
        ?string $sid = null,
        Source|string|null $source = null,
        ?string $startTime = null,
        Status|string|null $status = null,
        ?array $subresourceUris = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj['accountSid'] = $accountSid;
        null !== $callSid && $obj['callSid'] = $callSid;
        null !== $channels && $obj['channels'] = $channels;
        null !== $conferenceSid && $obj['conferenceSid'] = $conferenceSid;
        null !== $dateCreated && $obj['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $duration && $obj['duration'] = $duration;
        null !== $errorCode && $obj['errorCode'] = $errorCode;
        null !== $mediaURL && $obj['mediaURL'] = $mediaURL;
        null !== $sid && $obj['sid'] = $sid;
        null !== $source && $obj['source'] = $source;
        null !== $startTime && $obj['startTime'] = $startTime;
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
     * The identifier of the related participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['callSid'] = $callSid;

        return $obj;
    }

    /**
     * The number of channels in the recording.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }

    /**
     * The identifier of the related conference.
     */
    public function withConferenceSid(string $conferenceSid): self
    {
        $obj = clone $this;
        $obj['conferenceSid'] = $conferenceSid;

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
     * Duratin of the recording in seconds.
     */
    public function withDuration(int $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * The recording error, if any.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj['errorCode'] = $errorCode;

        return $obj;
    }

    /**
     * The URL to use to download the recording.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaURL'] = $mediaURL;

        return $obj;
    }

    /**
     * The unique identifier of the recording.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * How the recording was started.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    /**
     * The timestamp of when the recording was started.
     */
    public function withStartTime(string $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }

    /**
     * The status of the recording.
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
     * The relative URI for this recording.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
