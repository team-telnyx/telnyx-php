<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;

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

    #[Optional('channel_limit')]
    public ?int $channelLimit;

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
        $self = new self;

        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }

    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }
}
