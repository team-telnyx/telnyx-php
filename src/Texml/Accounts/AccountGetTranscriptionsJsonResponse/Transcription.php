<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\AccountGetTranscriptionsJsonResponse\Transcription\Status;

/**
 * @phpstan-type TranscriptionShape = array{
 *   accountSid?: string|null,
 *   apiVersion?: string|null,
 *   callSid?: string|null,
 *   dateCreated?: \DateTimeInterface|null,
 *   dateUpdated?: \DateTimeInterface|null,
 *   duration?: string|null,
 *   recordingSid?: string|null,
 *   sid?: string|null,
 *   status?: value-of<Status>|null,
 *   transcriptionText?: string|null,
 *   uri?: string|null,
 * }
 */
final class Transcription implements BaseModel
{
    /** @use SdkModel<TranscriptionShape> */
    use SdkModel;

    #[Optional('account_sid')]
    public ?string $accountSid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Optional('api_version')]
    public ?string $apiVersion;

    #[Optional('call_sid')]
    public ?string $callSid;

    #[Optional('date_created')]
    public ?\DateTimeInterface $dateCreated;

    #[Optional('date_updated')]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Optional(nullable: true)]
    public ?string $duration;

    /**
     * Identifier of a resource.
     */
    #[Optional('recording_sid')]
    public ?string $recordingSid;

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
    #[Optional('transcription_text')]
    public ?string $transcriptionText;

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
        ?string $accountSid = null,
        ?string $apiVersion = null,
        ?string $callSid = null,
        ?\DateTimeInterface $dateCreated = null,
        ?\DateTimeInterface $dateUpdated = null,
        ?string $duration = null,
        ?string $recordingSid = null,
        ?string $sid = null,
        Status|string|null $status = null,
        ?string $transcriptionText = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj['accountSid'] = $accountSid;
        null !== $apiVersion && $obj['apiVersion'] = $apiVersion;
        null !== $callSid && $obj['callSid'] = $callSid;
        null !== $dateCreated && $obj['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $obj['dateUpdated'] = $dateUpdated;
        null !== $duration && $obj['duration'] = $duration;
        null !== $recordingSid && $obj['recordingSid'] = $recordingSid;
        null !== $sid && $obj['sid'] = $sid;
        null !== $status && $obj['status'] = $status;
        null !== $transcriptionText && $obj['transcriptionText'] = $transcriptionText;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

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

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['callSid'] = $callSid;

        return $obj;
    }

    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $obj = clone $this;
        $obj['dateCreated'] = $dateCreated;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj['dateUpdated'] = $dateUpdated;

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
        $obj['recordingSid'] = $recordingSid;

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
        $obj['transcriptionText'] = $transcriptionText;

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
