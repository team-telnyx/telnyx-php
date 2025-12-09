<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod;
use Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track;

/**
 * Starts streaming media from a call to a specific WebSocket address.
 *
 * @see Telnyx\Services\Texml\Accounts\CallsService::streamsJson()
 *
 * @phpstan-type CallStreamsJsonParamsShape = array{
 *   accountSid: string,
 *   bidirectionalCodec?: BidirectionalCodec|value-of<BidirectionalCodec>,
 *   bidirectionalMode?: BidirectionalMode|value-of<BidirectionalMode>,
 *   name?: string,
 *   statusCallback?: string,
 *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
 *   track?: Track|value-of<Track>,
 *   url?: string,
 * }
 */
final class CallStreamsJsonParams implements BaseModel
{
    /** @use SdkModel<CallStreamsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<BidirectionalCodec>|null $bidirectionalCodec
     */
    #[Optional('BidirectionalCodec', enum: BidirectionalCodec::class)]
    public ?string $bidirectionalCodec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<BidirectionalMode>|null $bidirectionalMode
     */
    #[Optional('BidirectionalMode', enum: BidirectionalMode::class)]
    public ?string $bidirectionalMode;

    /**
     * The user specified name of Stream.
     */
    #[Optional('Name')]
    public ?string $name;

    /**
     * Url where status callbacks will be sent.
     */
    #[Optional('StatusCallback')]
    public ?string $statusCallback;

    /**
     * HTTP method used to send status callbacks.
     *
     * @var value-of<StatusCallbackMethod>|null $statusCallbackMethod
     */
    #[Optional('StatusCallbackMethod', enum: StatusCallbackMethod::class)]
    public ?string $statusCallbackMethod;

    /**
     * Tracks to be included in the stream.
     *
     * @var value-of<Track>|null $track
     */
    #[Optional('Track', enum: Track::class)]
    public ?string $track;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Optional('Url')]
    public ?string $url;

    /**
     * `new CallStreamsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallStreamsJsonParams::with(accountSid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallStreamsJsonParams)->withAccountSid(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     * @param Track|value-of<Track> $track
     */
    public static function with(
        string $accountSid,
        BidirectionalCodec|string|null $bidirectionalCodec = null,
        BidirectionalMode|string|null $bidirectionalMode = null,
        ?string $name = null,
        ?string $statusCallback = null,
        StatusCallbackMethod|string|null $statusCallbackMethod = null,
        Track|string|null $track = null,
        ?string $url = null,
    ): self {
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $bidirectionalCodec && $self['bidirectionalCodec'] = $bidirectionalCodec;
        null !== $bidirectionalMode && $self['bidirectionalMode'] = $bidirectionalMode;
        null !== $name && $self['name'] = $name;
        null !== $statusCallback && $self['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $self['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $track && $self['track'] = $track;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec
     */
    public function withBidirectionalCodec(
        BidirectionalCodec|string $bidirectionalCodec
    ): self {
        $self = clone $this;
        $self['bidirectionalCodec'] = $bidirectionalCodec;

        return $self;
    }

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode
     */
    public function withBidirectionalMode(
        BidirectionalMode|string $bidirectionalMode
    ): self {
        $self = clone $this;
        $self['bidirectionalMode'] = $bidirectionalMode;

        return $self;
    }

    /**
     * The user specified name of Stream.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $self = clone $this;
        $self['statusCallback'] = $statusCallback;

        return $self;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $self = clone $this;
        $self['statusCallbackMethod'] = $statusCallbackMethod;

        return $self;
    }

    /**
     * Tracks to be included in the stream.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(Track|string $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
