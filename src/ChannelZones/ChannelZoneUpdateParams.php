<?php

declare(strict_types=1);

namespace Telnyx\ChannelZones;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ChannelZoneUpdateParams); // set properties as needed
 * $client->channelZones->update(...$params->toArray());
 * ```
 * Update the number of Voice Channels for the Non-US Zones. This allows your account to handle multiple simultaneous inbound calls to Non-US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->channelZones->update(...$params->toArray());`
 *
 * @see Telnyx\ChannelZones->update
 *
 * @phpstan-type channel_zone_update_params = array{channels: int}
 */
final class ChannelZoneUpdateParams implements BaseModel
{
    /** @use SdkModel<channel_zone_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of reserved channels.
     */
    #[Api]
    public int $channels;

    /**
     * `new ChannelZoneUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelZoneUpdateParams::with(channels: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelZoneUpdateParams)->withChannels(...)
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
    public static function with(int $channels): self
    {
        $obj = new self;

        $obj->channels = $channels;

        return $obj;
    }

    /**
     * The number of reserved channels.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }
}
