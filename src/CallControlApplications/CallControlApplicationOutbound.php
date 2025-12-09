<?php

declare(strict_types=1);

namespace Telnyx\CallControlApplications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallControlApplicationOutboundShape = array{
 *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
 * }
 */
final class CallControlApplicationOutbound implements BaseModel
{
    /** @use SdkModel<CallControlApplicationOutboundShape> */
    use SdkModel;

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
    public ?int $channelLimit;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional('outbound_voice_profile_id')]
    public ?string $outboundVoiceProfileID;

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
        ?int $channelLimit = null,
        ?string $outboundVoiceProfileID = null
    ): self {
        $obj = new self;

        null !== $channelLimit && $obj['channelLimit'] = $channelLimit;
        null !== $outboundVoiceProfileID && $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channelLimit'] = $channelLimit;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $obj;
    }
}
