<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{
 *   outbound_voice_profile_id: string, channel_limit?: int|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api]
    public string $outbound_voice_profile_id;

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * `new Outbound()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Outbound::with(outbound_voice_profile_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Outbound)->withOutboundVoiceProfileID(...)
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
        string $outbound_voice_profile_id,
        ?int $channel_limit = null
    ): self {
        $obj = new self;

        $obj->outbound_voice_profile_id = $outbound_voice_profile_id;

        null !== $channel_limit && $obj->channel_limit = $channel_limit;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj->outbound_voice_profile_id = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channel_limit = $channelLimit;

        return $obj;
    }
}
