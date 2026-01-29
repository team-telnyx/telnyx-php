<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationCreateParams;

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
        $self = new self;

        null !== $channelLimit && $self['channelLimit'] = $channelLimit;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * When set, this will limit the total number of outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }
}
