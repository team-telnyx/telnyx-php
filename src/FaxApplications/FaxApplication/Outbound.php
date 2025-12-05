<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications\FaxApplication;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{
 *   channel_limit?: int|null, outbound_voice_profile_id?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    #[Api(optional: true)]
    public ?int $channel_limit;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api(optional: true)]
    public ?string $outbound_voice_profile_id;

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
        ?int $channel_limit = null,
        ?string $outbound_voice_profile_id = null
    ): self {
        $obj = new self;

        null !== $channel_limit && $obj['channel_limit'] = $channel_limit;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;

        return $obj;
    }

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channel_limit'] = $channelLimit;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outbound_voice_profile_id'] = $outboundVoiceProfileID;

        return $obj;
    }
}
