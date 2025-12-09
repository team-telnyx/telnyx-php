<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InboundShape = array{
 *   outboundVoiceProfileID: string, channelLimit?: int|null
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    /**
     * The ID of the outbound voice profile to use for inbound calls.
     */
    #[Required('outbound_voice_profile_id')]
    public string $outboundVoiceProfileID;

    /**
     * When set, this will limit the number of concurrent inbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * `new Inbound()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Inbound::with(outboundVoiceProfileID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Inbound)->withOutboundVoiceProfileID(...)
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
     */
    public static function with(
        string $outboundVoiceProfileID,
        ?int $channelLimit = null
    ): self {
        $obj = new self;

        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        null !== $channelLimit && $obj['channelLimit'] = $channelLimit;

        return $obj;
    }

    /**
     * The ID of the outbound voice profile to use for inbound calls.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * When set, this will limit the number of concurrent inbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channelLimit'] = $channelLimit;

        return $obj;
    }
}
