<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Channels;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Source;
use Telnyx\Texml\Accounts\TexmlGetCallRecordingResponseBody\Status;

/**
 * @phpstan-type TexmlGetCallRecordingResponseBodyShape = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   channels?: null|1|2,
 *   conferenceSid?: string|null,
 *   dateCreated?: \DateTimeInterface|null,
 *   dateUpdated?: \DateTimeInterface|null,
 *   duration?: string|null,
 *   errorCode?: string|null,
 *   mediaURL?: string|null,
 *   sid?: string|null,
 *   source?: value-of<Source>|null,
 *   startTime?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   subresourcesUris?: TexmlRecordingSubresourcesUris|null,
 *   uri?: string|null,
 * }
 */
final class TexmlGetCallRecordingResponseBody implements BaseModel
{
    /** @use SdkModel<TexmlGetCallRecordingResponseBodyShape> */
    use SdkModel;

    #[Optional('account_sid')]
    public ?string $accountSid;

    #[Optional('call_sid')]
    public ?string $callSid;

    /** @var 1|2|null $channels */
    #[Optional(enum: Channels::class)]
    public ?int $channels;

    #[Optional('conference_sid', nullable: true)]
    public ?string $conferenceSid;

    #[Optional('date_created')]
    public ?\DateTimeInterface $dateCreated;

    #[Optional('date_updated')]
    public ?\DateTimeInterface $dateUpdated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Optional(nullable: true)]
    public ?string $duration;

    #[Optional('error_code', nullable: true)]
    public ?string $errorCode;

    #[Optional('media_url')]
    public ?string $mediaURL;

    /**
     * Identifier of a resource.
     */
    #[Optional]
    public ?string $sid;

    /**
     * Defines how the recording was created.
     *
     * @var value-of<Source>|null $source
     */
    #[Optional(enum: Source::class)]
    public ?string $source;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Subresources details for a recording if available.
     */
    #[Optional('subresources_uris')]
    public ?TexmlRecordingSubresourcesUris $subresourcesUris;

    /**
     * The relative URI for this recording resource.
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
     * @param 1|2 $channels
     * @param Source|value-of<Source> $source
     * @param Status|value-of<Status> $status
     * @param TexmlRecordingSubresourcesUris|array{
     *   transcriptions?: string|null
     * } $subresourcesUris
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
        TexmlRecordingSubresourcesUris|array|null $subresourcesUris = null,
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
        null !== $subresourcesUris && $obj['subresourcesUris'] = $subresourcesUris;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['callSid'] = $callSid;

        return $obj;
    }

    /**
     * @param 1|2 $channels
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }

    public function withConferenceSid(?string $conferenceSid): self
    {
        $obj = clone $this;
        $obj['conferenceSid'] = $conferenceSid;

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

    public function withErrorCode(?string $errorCode): self
    {
        $obj = clone $this;
        $obj['errorCode'] = $errorCode;

        return $obj;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj['mediaURL'] = $mediaURL;

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
        $obj['startTime'] = $startTime;

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
     *
     * @param TexmlRecordingSubresourcesUris|array{
     *   transcriptions?: string|null
     * } $subresourcesUris
     */
    public function withSubresourcesUris(
        TexmlRecordingSubresourcesUris|array $subresourcesUris
    ): self {
        $obj = clone $this;
        $obj['subresourcesUris'] = $subresourcesUris;

        return $obj;
    }

    /**
     * The relative URI for this recording resource.
     */
    public function withUri(string $uri): self
    {
        $obj = clone $this;
        $obj['uri'] = $uri;

        return $obj;
    }
}
