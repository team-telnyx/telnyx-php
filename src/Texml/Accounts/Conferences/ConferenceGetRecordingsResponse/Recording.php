<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Source;
use Telnyx\Texml\Accounts\Conferences\ConferenceGetRecordingsResponse\Recording\Status;

/**
 * @phpstan-type RecordingShape = array{
 *   account_sid?: string|null,
 *   call_sid?: string|null,
 *   channels?: int|null,
 *   conference_sid?: string|null,
 *   date_created?: string|null,
 *   date_updated?: string|null,
 *   duration?: int|null,
 *   error_code?: string|null,
 *   media_url?: string|null,
 *   sid?: string|null,
 *   source?: value-of<Source>|null,
 *   start_time?: string|null,
 *   status?: value-of<Status>|null,
 *   subresource_uris?: array<string,mixed>|null,
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
    #[Api(optional: true)]
    public ?string $account_sid;

    /**
     * The identifier of the related participant's call.
     */
    #[Api(optional: true)]
    public ?string $call_sid;

    /**
     * The number of channels in the recording.
     */
    #[Api(optional: true)]
    public ?int $channels;

    /**
     * The identifier of the related conference.
     */
    #[Api(optional: true)]
    public ?string $conference_sid;

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
     * Duratin of the recording in seconds.
     */
    #[Api(optional: true)]
    public ?int $duration;

    /**
     * The recording error, if any.
     */
    #[Api(optional: true)]
    public ?string $error_code;

    /**
     * The URL to use to download the recording.
     */
    #[Api(optional: true)]
    public ?string $media_url;

    /**
     * The unique identifier of the recording.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * How the recording was started.
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    /**
     * The timestamp of when the recording was started.
     */
    #[Api(optional: true)]
    public ?string $start_time;

    /**
     * The status of the recording.
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
     * The relative URI for this recording.
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
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param array<string,mixed> $subresource_uris
     */
    public static function with(
        ?string $account_sid = null,
        ?string $call_sid = null,
        ?int $channels = null,
        ?string $conference_sid = null,
        ?string $date_created = null,
        ?string $date_updated = null,
        ?int $duration = null,
        ?string $error_code = null,
        ?string $media_url = null,
        ?string $sid = null,
        Source|string|null $source = null,
        ?string $start_time = null,
        Status|string|null $status = null,
        ?array $subresource_uris = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $call_sid && $obj['call_sid'] = $call_sid;
        null !== $channels && $obj['channels'] = $channels;
        null !== $conference_sid && $obj['conference_sid'] = $conference_sid;
        null !== $date_created && $obj['date_created'] = $date_created;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $duration && $obj['duration'] = $duration;
        null !== $error_code && $obj['error_code'] = $error_code;
        null !== $media_url && $obj['media_url'] = $media_url;
        null !== $sid && $obj['sid'] = $sid;
        null !== $source && $obj['source'] = $source;
        null !== $start_time && $obj['start_time'] = $start_time;
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
     * The identifier of the related participant's call.
     */
    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

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
        $obj['conference_sid'] = $conferenceSid;

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
        $obj['error_code'] = $errorCode;

        return $obj;
    }

    /**
     * The URL to use to download the recording.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['media_url'] = $mediaURL;

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
        $obj['start_time'] = $startTime;

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
        $obj['subresource_uris'] = $subresourceUris;

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
