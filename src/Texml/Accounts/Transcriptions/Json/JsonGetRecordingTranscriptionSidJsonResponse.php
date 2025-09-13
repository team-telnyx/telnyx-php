<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Transcriptions\Json;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse\Status;

/**
 * @phpstan-type json_get_recording_transcription_sid_json_response = array{
 *   accountSid?: string,
 *   apiVersion?: string,
 *   callSid?: string,
 *   dateCreated?: \DateTimeInterface,
 *   dateUpdated?: \DateTimeInterface,
 *   duration?: string|null,
 *   recordingSid?: string,
 *   sid?: string,
 *   status?: value-of<Status>,
 *   transcriptionText?: string,
 *   uri?: string,
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class JsonGetRecordingTranscriptionSidJsonResponse implements BaseModel
{
    /** @use SdkModel<json_get_recording_transcription_sid_json_response> */
    use SdkModel;

    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    /**
     * The version of the API that was used to make the request.
     */
    #[Api('api_version', optional: true)]
    public ?string $apiVersion;

    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    #[Api('date_created', optional: true)]
    public ?\DateTimeInterface $dateCreated;

    #[Api('date_updated', optional: true)]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $duration;

    /**
     * Identifier of a resource.
     */
    #[Api('recording_sid', optional: true)]
    public ?string $recordingSid;

    /**
     * Identifier of a resource.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * The status of the recording transcriptions. The transcription text will be available only when the status is completed.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The recording's transcribed text.
     */
    #[Api('transcription_text', optional: true)]
    public ?string $transcriptionText;

    /**
     * The relative URI for the recording transcription resource.
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

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $apiVersion && $obj->apiVersion = $apiVersion;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $duration && $obj->duration = $duration;
        null !== $recordingSid && $obj->recordingSid = $recordingSid;
        null !== $sid && $obj->sid = $sid;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $transcriptionText && $obj->transcriptionText = $transcriptionText;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

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

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->callSid = $callSid;

        return $obj;
    }

    public function withDateCreated(\DateTimeInterface $dateCreated): self
    {
        $obj = clone $this;
        $obj->dateCreated = $dateCreated;

        return $obj;
    }

    public function withDateUpdated(\DateTimeInterface $dateUpdated): self
    {
        $obj = clone $this;
        $obj->dateUpdated = $dateUpdated;

        return $obj;
    }

    /**
     * The duration of this recording, given in seconds.
     */
    public function withDuration(?string $duration): self
    {
        $obj = clone $this;
        $obj->duration = $duration;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withRecordingSid(string $recordingSid): self
    {
        $obj = clone $this;
        $obj->recordingSid = $recordingSid;

        return $obj;
    }

    /**
     * Identifier of a resource.
     */
    public function withSid(string $sid): self
    {
        $obj = clone $this;
        $obj->sid = $sid;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The recording's transcribed text.
     */
    public function withTranscriptionText(string $transcriptionText): self
    {
        $obj = clone $this;
        $obj->transcriptionText = $transcriptionText;

        return $obj;
    }

    /**
     * The relative URI for the recording transcription resource.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
