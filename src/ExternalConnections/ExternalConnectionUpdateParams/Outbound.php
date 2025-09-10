<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type outbound_alias = array{
 *   outboundVoiceProfileID: string, channelLimit?: int|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<outbound_alias> */
    use SdkModel;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api('outbound_voice_profile_id')]
    public string $outboundVoiceProfileID;

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    #[Api('channel_limit', optional: true)]
    public ?int $channelLimit;

    /**
     * `new Outbound()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Outbound::with(outboundVoiceProfileID: ...)
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
        string $outboundVoiceProfileID,
        ?int $channelLimit = null
    ): self {
        $obj = new self;

        $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        null !== $channelLimit && $obj->channelLimit = $channelLimit;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj->channelLimit = $channelLimit;

        return $obj;
    }
}
