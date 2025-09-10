<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\Recordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse\Channels;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse\Source;
use Telnyx\Texml\Accounts\Calls\Recordings\RecordingRecordingSidJsonResponse\Track;

/**
 * @phpstan-type recording_recording_sid_json_response = array{
 *   accountSid?: string|null,
 *   callSid?: string|null,
 *   channels?: value-of<Channels>|null,
 *   conferenceSid?: string|null,
 *   dateCreated?: \DateTimeInterface|null,
 *   dateUpdated?: \DateTimeInterface|null,
 *   duration?: string|null,
 *   errorCode?: string|null,
 *   price?: string|null,
 *   priceUnit?: string|null,
 *   sid?: string|null,
 *   source?: value-of<Source>|null,
 *   startTime?: \DateTimeInterface|null,
 *   track?: value-of<Track>|null,
 *   uri?: string|null,
 * }
 */
final class RecordingRecordingSidJsonResponse implements BaseModel
{
    /** @use SdkModel<recording_recording_sid_json_response> */
    use SdkModel;

    #[Api('account_sid', optional: true)]
    public ?string $accountSid;

    #[Api('call_sid', optional: true)]
    public ?string $callSid;

    /** @var value-of<Channels>|null $channels */
    #[Api(enum: Channels::class, optional: true)]
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

    /**
     * The price of this recording, the currency is specified in the price_unit field.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $price;

    /**
     * The unit in which the price is given.
     */
    #[Api('price_unit', nullable: true, optional: true)]
    public ?string $priceUnit;

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

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<Track>|null $track
     */
    #[Api(enum: Track::class, optional: true)]
    public ?string $track;

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
     * @param Channels|value-of<Channels> $channels
     * @param Source|value-of<Source> $source
     * @param Track|value-of<Track> $track
     */
    public static function with(
        ?string $accountSid = null,
        ?string $callSid = null,
        Channels|int|null $channels = null,
        ?string $conferenceSid = null,
        ?\DateTimeInterface $dateCreated = null,
        ?\DateTimeInterface $dateUpdated = null,
        ?string $duration = null,
        ?string $errorCode = null,
        ?string $price = null,
        ?string $priceUnit = null,
        ?string $sid = null,
        Source|string|null $source = null,
        ?\DateTimeInterface $startTime = null,
        Track|string|null $track = null,
        ?string $uri = null,
    ): self {
        $obj = new self;

        null !== $accountSid && $obj->accountSid = $accountSid;
        null !== $callSid && $obj->callSid = $callSid;
        null !== $channels && $obj->channels = $channels instanceof Channels ? $channels->value : $channels;
        null !== $conferenceSid && $obj->conferenceSid = $conferenceSid;
        null !== $dateCreated && $obj->dateCreated = $dateCreated;
        null !== $dateUpdated && $obj->dateUpdated = $dateUpdated;
        null !== $duration && $obj->duration = $duration;
        null !== $errorCode && $obj->errorCode = $errorCode;
        null !== $price && $obj->price = $price;
        null !== $priceUnit && $obj->priceUnit = $priceUnit;
        null !== $sid && $obj->sid = $sid;
        null !== $source && $obj->source = $source instanceof Source ? $source->value : $source;
        null !== $startTime && $obj->startTime = $startTime;
        null !== $track && $obj->track = $track instanceof Track ? $track->value : $track;
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
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels instanceof Channels ? $channels->value : $channels;

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

    /**
     * The price of this recording, the currency is specified in the price_unit field.
     */
    public function withPrice(?string $price): self
    {
        $obj = clone $this;
        $obj->price = $price;

        return $obj;
    }

    /**
     * The unit in which the price is given.
     */
    public function withPriceUnit(?string $priceUnit): self
    {
        $obj = clone $this;
        $obj->priceUnit = $priceUnit;

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
        $obj->source = $source instanceof Source ? $source->value : $source;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $obj = clone $this;
        $obj->track = $track instanceof Track ? $track->value : $track;

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
