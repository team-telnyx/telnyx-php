<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse\Transcription\Status;

/**
 * @phpstan-type TranscriptionShape = array{
 *   account_sid?: string|null,
 *   api_version?: string|null,
 *   call_sid?: string|null,
 *   date_created?: \DateTimeInterface|null,
 *   date_updated?: \DateTimeInterface|null,
 *   duration?: string|null,
 *   recording_sid?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   transcription_text?: string|null,
 *   uri?: string|null,
 * }
 */
final class Transcription implements BaseModel
{
    /** @use SdkModel<TranscriptionShape> */
    use SdkModel;

    #[Optional]
    public ?string $account_sid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Optional]
    public ?string $api_version;

    #[Optional]
    public ?string $call_sid;

    #[Optional]
    public ?\DateTimeInterface $date_created;

    #[Optional]
    public ?\DateTimeInterface $date_updated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Optional(nullable: true)]
    public ?string $duration;

    /**
     * Identifier of a resource.
     */
    #[Optional]
    public ?string $recording_sid;

    /**
     * Identifier of a resource.
     */
    #[Optional]
    public ?string $sid;

    /**
     * The status of the recording transcriptions. The transcription text will be available only when the status is completed.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The recording's transcribed text.
     */
    #[Optional]
    public ?string $transcription_text;

    /**
     * The relative URI for the recording transcription resource.
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
        ?string $api_version = null,
        ?string $call_sid = null,
        ?\DateTimeInterface $date_created = null,
        ?\DateTimeInterface $date_updated = null,
        ?string $duration = null,
        ?string $recording_sid = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $transcription_text = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $account_sid && $obj['account_sid'] = $account_sid;
        null !== $api_version && $obj['api_version'] = $api_version;
        null !== $call_sid && $obj['call_sid'] = $call_sid;
        null !== $date_created && $obj['date_created'] = $date_created;
        null !== $date_updated && $obj['date_updated'] = $date_updated;
        null !== $duration && $obj['duration'] = $duration;
        null !== $recording_sid && $obj['recording_sid'] = $recording_sid;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $transcription_text && $obj['transcription_text'] = $transcription_text;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

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

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

        return $obj;
    }

    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $obj = clone $this;
        $obj['date_created'] = $dateCreated;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj['date_updated'] = $dateUpdated;

        return $obj;
    }

    /**
     * The duration of this recording, given in seconds.
     */
    public function withDuration(?string $duration): self
    {
        $obj = clone $this;
        $obj['duration'] = $duration;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withRecordingSid(string $recordingSid): self
    {
        $obj = clone $this;
        $obj['recording_sid'] = $recordingSid;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj['sid'] = $sid;

        return $obj;
    }

    /**
     * The status of the recording transcriptions. The transcription text will be available only when the status is completed.
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
     * The recording's transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $obj = clone $this;
        $obj['transcription_text'] = $transcriptionText;

        return $obj;
    }

    /**
     * The relative URI for the recording transcription resource.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
