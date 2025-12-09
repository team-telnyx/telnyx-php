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
        $obj = new self;

        $obj['accountSid'] = $accountSid;

        null !== $bidirectionalCodec && $obj['bidirectionalCodec'] = $bidirectionalCodec;
        null !== $bidirectionalMode && $obj['bidirectionalMode'] = $bidirectionalMode;
        null !== $name && $obj['name'] = $name;
        null !== $statusCallback && $obj['statusCallback'] = $statusCallback;
        null !== $statusCallbackMethod && $obj['statusCallbackMethod'] = $statusCallbackMethod;
        null !== $track && $obj['track'] = $track;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['accountSid'] = $accountSid;

        return $obj;
    }

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec
     */
    public function withBidirectionalCodec(
        BidirectionalCodec|string $bidirectionalCodec
    ): self {
        $obj = clone $this;
        $obj['bidirectionalCodec'] = $bidirectionalCodec;

        return $obj;
    }

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode
     */
    public function withBidirectionalMode(
        BidirectionalMode|string $bidirectionalMode
    ): self {
        $obj = clone $this;
        $obj['bidirectionalMode'] = $bidirectionalMode;

        return $obj;
    }

    /**
     * The user specified name of Stream.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['statusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod
    ): self {
        $obj = clone $this;
        $obj['statusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * Tracks to be included in the stream.
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
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
