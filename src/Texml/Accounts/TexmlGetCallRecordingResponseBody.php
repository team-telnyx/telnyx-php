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
 * @phpstan-import-type TexmlRecordingSubresourcesUrisShape from \Telnyx\Texml\Accounts\TexmlRecordingSubresourcesUris
 *
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
 *   source?: null|Source|value-of<Source>,
 *   startTime?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   subresourcesUris?: null|TexmlRecordingSubresourcesUris|TexmlRecordingSubresourcesUrisShape,
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
     * @param 1|2|null $channels
     * @param Source|value-of<Source>|null $source
     * @param Status|value-of<Status>|null $status
     * @param TexmlRecordingSubresourcesUris|TexmlRecordingSubresourcesUrisShape|null $subresourcesUris
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
        null !== $subresourcesUris && $self['subresourcesUris'] = $subresourcesUris;
        null !== $uri && $self['uri'] = $uri;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    public function withCallSid(string $callSid): self
    {
        $self = clone $this;
        $self['callSid'] = $callSid;

        return $self;
    }

    /**
     * @param 1|2 $channels
     */
    public function withChannels(int $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    public function withConferenceSid(?string $conferenceSid): self
    {
        $self = clone $this;
        $self['conferenceSid'] = $conferenceSid;

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

    public function withErrorCode(?string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    public function withMediaURL(string $mediaURL): self
    {
        $self = clone $this;
        $self['mediaURL'] = $mediaURL;

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
     * Defines how the recording was created.
     *
     * @param Source|value-of<Source> $source
     */
    public function withSource(Source|string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Subresources details for a recording if available.
     *
     * @param TexmlRecordingSubresourcesUris|TexmlRecordingSubresourcesUrisShape $subresourcesUris
     */
    public function withSubresourcesUris(
        TexmlRecordingSubresourcesUris|array $subresourcesUris
    ): self {
        $self = clone $this;
        $self['subresourcesUris'] = $subresourcesUris;

        return $self;
    }

    /**
     * The relative URI for this recording resource.
     */
    public function withUri(string $uri): self
    {
        $self = clone $this;
        $self['uri'] = $uri;

        return $self;
    }
}
