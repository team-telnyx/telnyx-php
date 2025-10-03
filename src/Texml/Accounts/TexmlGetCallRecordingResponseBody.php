<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Source;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Status;

/**
 * @phpstan-type texml_get_call_recording_response_body = array{
 *   accountSid?: string,
 *   callSid?: string,
 *   channels?: 1|2,
 *   conferenceSid?: string|null,
 *   dateCreated?: \DateTimeInterface,
 *   dateUpdated?: \DateTimeInterface,
 *   duration?: string|null,
 *   errorCode?: string|null,
 *   mediaURL?: string,
 *   sid?: string,
 *   source?: value-of<Source>,
 *   startTime?: \DateTimeInterface,
 *   status?: value-of<Status>,
 *   subresourcesUris?: TexmlRecordingSubresourcesUris,
 *   uri?: string,
 * }
 */
final class TexmlGetCallRecordingResponseBody implements BaseModel
{
    /** @use SdkModel<texml_get_call_recording_response_body> */
    use SdkModel;

    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    /** @var 1|2|null $channels */
    #[Api(optional: true)]
    public ?int $channels;

    #[Api('conference_sid', nullable: true, optional: true)]
    public ?string $conferenceSid;

    #[Api('date_created', optional: true)]
    public ?\DateTimeInterface $dateCreated;

    #[Api('date_updated', optional: true)]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $duration;

    #[Api('error_code', nullable: true, optional: true)]
    public ?string $errorCode;

    #[Api('media_url', optional: true)]
    public ?string $mediaURL;

    /**
     * Identifier of a resource.
     */
    #[Api(optional: true)]
    public ?string $sid;

    /**
     * Defines how the recording was created.
     *
     * @var value-of<Source>|null $source
     */
    #[Api(enum: Source::class, optional: true)]
    public ?string $source;

    #[Api('start_time', optional: true)]
    public ?\DateTimeInterface $startTime;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Subresources details for a recording if available.
     */
    #[Api('subresources_uris', optional: true)]
    public ?TexmlRecordingSubresourcesUris $subresourcesUris;

    /**
     * The relative URI for this recording resource.
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
     * @param 1|2 $channels
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        ?int $channels = null,
        ?string $conferenceSid = null,
        ?\DateTimeInterface $dateCreated = null,
        ?\DateTimeInterface $dateUpdated = null,
        ?string $duration = null,
        ?string $errorCode = null,
        ?string $mediaURL = null,
        ?string $sid = null,
        Source|string|null $source = null,
        ?\DateTimeInterface $startTime = null,
        Status|string|null $status = null,
        ?TexmlRecordingSubresourcesUris $subresourcesUris = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $channels && $obj->channels = $channels;
        null !== $conferenceSid && $obj->conferenceSid = $conferenceSid;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $duration && $obj->duration = $duration;
        null !== $errorCode && $obj->errorCode = $errorCode;
        null !== $mediaURL && $obj->mediaURL = $mediaURL;
        null !== $sid && $obj->sid = $sid;
        null !== $source && $obj['source'] = $source;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $status && $obj['status'] = $status;
        null !== $subresourcesUris && $obj->subresourcesUris = $subresourcesUris;
        null !== $uri && $obj->uri = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj->callSid = $callSid;

        return $obj;
    }

    /**
     * @param 1|2 $channels
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }

    public function withConferenceSid(?string $conferenceSid): self
    {
        $obj = clone $this;
        $obj->conferenceSid = $conferenceSid;

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

    public function withErrorCode(?string $errorCode): self
    {
        $obj = clone $this;
        $obj->errorCode = $errorCode;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->mediaURL = $mediaURL;

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
     * Defines how the recording was created.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $obj = clone $this;
        $obj['source'] = $source;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Subresources details for a recording if available.
     */
    public function withSubresourcesUris(
        TexmlRecordingSubresourcesUris $subresourcesUris
    ): self {
        $obj = clone $this;
        $obj->subresourcesUris = $subresourcesUris;

        return $obj;
    }

    /**
     * The relative URI for this recording resource.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj->uri = $uri;

        return $obj;
    }
}
