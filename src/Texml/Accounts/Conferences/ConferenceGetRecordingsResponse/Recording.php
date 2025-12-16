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
 *   source?: null|Source|value-of<Source>,
 *   startTime?: string|null,
 *   status?: null|Status|value-of<Status>,
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
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $channels && $self['channels'] = $channels;
        null !== $conferenceSid && $self['conferenceSid'] = $conferenceSid;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $duration && $self['duration'] = $duration;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $mediaURL && $self['mediaURL'] = $mediaURL;
        null !== $sid && $self['sid'] = $sid;
        null !== $source && $self['source'] = $source;
        null !== $startTime && $self['startTime'] = $startTime;
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
     * The identifier of the related participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    /**
     * The number of channels in the recording.
     */
    public function withChannels(int $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * The identifier of the related conference.
     */
    public function withConferenceSid(string $conferenceSid): self
    {
        $self = clone $this;
        $self['conferenceSid'] = $conferenceSid;

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
     * Duratin of the recording in seconds.
     */
    public function withDuration(int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The recording error, if any.
     */
    public function withErrorCode(string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * The URL to use to download the recording.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

        return $self;
    }

    /**
     * The unique identifier of the recording.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * How the recording was started.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    /**
     * The timestamp of when the recording was started.
     */
    public function withStartTime(string $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * The status of the recording.
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
     * The relative URI for this recording.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
