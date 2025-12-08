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
 *   account_sid: string,
 *   BidirectionalCodec?: \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalCodec>,
 *   BidirectionalMode?: \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\BidirectionalMode>,
 *   Name?: string,
 *   StatusCallback?: string,
 *   StatusCallbackMethod?: \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\StatusCallbackMethod>,
 *   Track?: \Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track|value-of<\Telnyx\Texml\Accounts\Calls\CallStreamsJsonParams\Track>,
 *   Url?: string,
 * }
 */
final class CallStreamsJsonParams implements BaseModel
{
    /** @use SdkModel<CallStreamsJsonParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @var value-of<BidirectionalCodec>|null $BidirectionalCodec
     */
    #[Optional(
        enum: BidirectionalCodec::class,
    )]
    public ?string $BidirectionalCodec;

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @var value-of<BidirectionalMode>|null $BidirectionalMode
     */
    #[Optional(
        enum: BidirectionalMode::class,
    )]
    public ?string $BidirectionalMode;

    /**
     * The user specified name of Stream.
     */
    #[Optional]
    public ?string $Name;

    /**
     * Url where status callbacks will be sent.
     */
    #[Optional]
    public ?string $StatusCallback;

    /**
     * HTTP method used to send status callbacks.
     *
     * @var value-of<StatusCallbackMethod>|null $StatusCallbackMethod
     */
    #[Optional(
        enum: StatusCallbackMethod::class,
    )]
    public ?string $StatusCallbackMethod;

    /**
     * Tracks to be included in the stream.
     *
     * @var value-of<Track>|null $Track
     */
    #[Optional(
        enum: Track::class
    )]
    public ?string $Track;

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    #[Optional]
    public ?string $Url;

    /**
     * `new CallStreamsJsonParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallStreamsJsonParams::with(account_sid: ...)
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
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $BidirectionalCodec
     * @param BidirectionalMode|value-of<BidirectionalMode> $BidirectionalMode
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $StatusCallbackMethod
     * @param Track|value-of<Track> $Track
     */
    public static function with(
        string $account_sid,
        BidirectionalCodec|string|null $BidirectionalCodec = null,
        BidirectionalMode|string|null $BidirectionalMode = null,
        ?string $Name = null,
        ?string $StatusCallback = null,
        StatusCallbackMethod|string|null $StatusCallbackMethod = null,
        Track|string|null $Track = null,
        ?string $Url = null,
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        null !== $BidirectionalCodec && $obj['BidirectionalCodec'] = $BidirectionalCodec;
        null !== $BidirectionalMode && $obj['BidirectionalMode'] = $BidirectionalMode;
        null !== $Name && $obj['Name'] = $Name;
        null !== $StatusCallback && $obj['StatusCallback'] = $StatusCallback;
        null !== $StatusCallbackMethod && $obj['StatusCallbackMethod'] = $StatusCallbackMethod;
        null !== $Track && $obj['Track'] = $Track;
        null !== $Url && $obj['Url'] = $Url;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * Indicates codec for bidirectional streaming RTP payloads. Used only with stream_bidirectional_mode=rtp. Case sensitive.
     *
     * @param BidirectionalCodec|value-of<BidirectionalCodec> $bidirectionalCodec
     */
    public function withBidirectionalCodec(
        BidirectionalCodec|string $bidirectionalCodec,
    ): self {
        $obj = clone $this;
        $obj['BidirectionalCodec'] = $bidirectionalCodec;

        return $obj;
    }

    /**
     * Configures method of bidirectional streaming (mp3, rtp).
     *
     * @param BidirectionalMode|value-of<BidirectionalMode> $bidirectionalMode
     */
    public function withBidirectionalMode(
        BidirectionalMode|string $bidirectionalMode,
    ): self {
        $obj = clone $this;
        $obj['BidirectionalMode'] = $bidirectionalMode;

        return $obj;
    }

    /**
     * The user specified name of Stream.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['Name'] = $name;

        return $obj;
    }

    /**
     * Url where status callbacks will be sent.
     */
    public function withStatusCallback(string $statusCallback): self
    {
        $obj = clone $this;
        $obj['StatusCallback'] = $statusCallback;

        return $obj;
    }

    /**
     * HTTP method used to send status callbacks.
     *
     * @param StatusCallbackMethod|value-of<StatusCallbackMethod> $statusCallbackMethod
     */
    public function withStatusCallbackMethod(
        StatusCallbackMethod|string $statusCallbackMethod,
    ): self {
        $obj = clone $this;
        $obj['StatusCallbackMethod'] = $statusCallbackMethod;

        return $obj;
    }

    /**
     * Tracks to be included in the stream.
     *
     * @param Track|value-of<Track> $track
     */
    public function withTrack(
        Track|string $track
    ): self {
        $obj = clone $this;
        $obj['Track'] = $track;

        return $obj;
    }

    /**
     * The destination WebSocket address where the stream is going to be delivered.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['Url'] = $url;

        return $obj;
    }
}
