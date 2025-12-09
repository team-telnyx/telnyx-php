<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{
 *   channelLimit?: int|null, outboundVoiceProfileID?: string|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    #[Optional('channel_limit', nullable: true)]
    public ?int $channelLimit;

    #[Optional('outbound_voice_profile_id', nullable: true)]
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

    public function withChannelLimit(?int $channelLimit): self
    {
        $obj = clone $this;
        $obj['channelLimit'] = $channelLimit;

        return $obj;
    }

    public function withOutboundVoiceProfileID(
        ?string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $obj;
    }
}
