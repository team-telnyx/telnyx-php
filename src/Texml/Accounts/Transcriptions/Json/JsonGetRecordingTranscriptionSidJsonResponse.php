<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse\Status;

/**
 * @phpstan-type JsonGetRecordingTranscriptionSidJsonResponseShape = array{
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
final class JsonGetRecordingTranscriptionSidJsonResponse implements BaseModel
{
    /** @use SdkModel<JsonGetRecordingTranscriptionSidJsonResponseShape> */
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
        $self = new self;

        null !== $accountSid && $self['accountSid'] = $accountSid;
        null !== $apiVersion && $self['apiVersion'] = $apiVersion;
        null !== $callSid && $self['callSid'] = $callSid;
        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $duration && $self['duration'] = $duration;
        null !== $recordingSid && $self['recordingSid'] = $recordingSid;
        null !== $sid && $self['sid'] = $sid;
        null !== $status && $self['status'] = $status;
        null !== $transcriptionText && $self['transcriptionText'] = $transcriptionText;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

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

    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * The duration of this recording, given in seconds.
     */
    public function withDuration(?string $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * Identifier of a resource.
     */
    public function withRecordingSid(string $recordingSid): self
    {
        $self = clone $this;
        $self['recordingSid'] = $recordingSid;

        return $self;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    /**
     * The status of the recording transcriptions. The transcription text will be available only when the status is completed.
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
     * The recording's transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $self = clone $this;
        $self['transcriptionText'] = $transcriptionText;

        return $self;
    }

    /**
     * The relative URI for the recording transcription resource.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
