<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\RecordingsJson;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse\Channels;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse\Source;
use Telnyx\Texml\Accounts\Calls\RecordingsJson\RecordingsJsonRecordingsJsonResponse\Track;

/**
 * @phpstan-type RecordingsJsonRecordingsJsonResponseShape = array{
 *   account_sid?: string|null,
 *   call_sid?: string|null,
 *   channels?: null|1|2,
 *   conference_sid?: string|null,
 *   date_created?: \DateTimeInterface|null,
 *   date_updated?: \DateTimeInterface|null,
 *   duration?: string|null,
 *   error_code?: string|null,
 *   price?: string|null,
 *   price_unit?: string|null,
 *   sid?: string|null,
 *   source?: value-of<Source>|null,
 *   start_time?: \DateTimeInterface|null,
 *   track?: value-of<Track>|null,
 *   uri?: string|null,
 * }
 */
final class RecordingsJsonRecordingsJsonResponse implements BaseModel
{
    /** @use SdkModel<RecordingsJsonRecordingsJsonResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $account_sid;

    #[Optional]
    public ?string $call_sid;

    /** @var 1|2|null $channels */
    #[Optional(enum: Channels::class)]
    public ?int $channels;

    #[Optional(nullable: true)]
    public ?string $conference_sid;

    #[Optional]
    public ?\DateTimeInterface $date_created;

    #[Optional]
    public ?\DateTimeInterface $date_updated;

    /**
     * The duration of this recording, given in seconds.
     */
    #[Optional(nullable: true)]
    public ?string $duration;

    #[Optional(nullable: true)]
    public ?string $error_code;

    /**
     * The price of this recording, the currency is specified in the price_unit field.
     */
    #[Optional(nullable: true)]
    public ?string $price;

    /**
     * The unit in which the price is given.
     */
    #[Optional(nullable: true)]
    public ?string $price_unit;

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

    #[Optional]
    public ?\DateTimeInterface $start_time;

    /**
     * The audio track to record for the call. The default is `both`.
     *
     * @var value-of<Track>|null $track
     */
    #[Optional(enum: Track::class)]
    public ?string $track;

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
     * @param Track|value-of<Track> $track
     */
    public static function with(
        ?string $account_sid = null,
        ?string $call_sid = null,
        ?int $channels = null,
        ?string $conference_sid = null,
        ?\DateTimeInterface $date_created = null,
        ?\DateTimeInterface $date_updated = null,
        ?string $duration = null,
        ?string $error_code = null,
        ?string $price = null,
        ?string $price_unit = null,
        ?string $sid = null,
        Source|string|null $source = null,
        ?\DateTimeInterface $start_time = null,
        Track|string|null $track = null,
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
        null !== $price && $obj['price'] = $price;
        null !== $price_unit && $obj['price_unit'] = $price_unit;
        null !== $sid && $obj['sid'] = $sid;
        null !== $source && $obj['source'] = $source;
        null !== $start_time && $obj['start_time'] = $start_time;
        null !== $track && $obj['track'] = $track;
        null !== $uri && $obj['uri'] = $uri;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    public function withCallSid(string $callSid): self
    {
        $obj = clone $this;
        $obj['call_sid'] = $callSid;

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
        $obj['conference_sid'] = $conferenceSid;

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

    public function withErrorCode(?string $errorCode): self
    {
        $obj = clone $this;
        $obj['error_code'] = $errorCode;

        return $obj;
    }

    /**
     * The price of this recording, the currency is specified in the price_unit field.
     */
    public function withPrice(?string $price): self
    {
        $obj = clone $this;
        $obj['price'] = $price;

        return $obj;
    }

    /**
     * The unit in which the price is given.
     */
    public function withPriceUnit(?string $priceUnit): self
    {
        $obj = clone $this;
        $obj['price_unit'] = $priceUnit;

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
        $obj['start_time'] = $startTime;

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
        $obj['track'] = $track;

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
