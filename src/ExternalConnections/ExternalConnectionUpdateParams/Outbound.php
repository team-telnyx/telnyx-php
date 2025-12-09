<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OutboundShape = array{
 *   outboundVoiceProfileID: string, channelLimit?: int|null
 * }
 */
final class Outbound implements BaseModel
{
    /** @use SdkModel<OutboundShape> */
    use SdkModel;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Required('outbound_voice_profile_id')]
    public string $outboundVoiceProfileID;

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    #[Optional('channel_limit')]
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
        $self = new self;

        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        null !== $channelLimit && $self['channelLimit'] = $channelLimit;

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

    /**
     * When set, this will limit the number of concurrent outbound calls to phone numbers associated with this connection.
     */
    public function withChannelLimit(int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }
}
