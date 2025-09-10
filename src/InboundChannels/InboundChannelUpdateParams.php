<?php

declare(strict_types=1);

namespace Telnyx\InboundChannels;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InboundChannelUpdateParams); // set properties as needed
 * $client->inboundChannels->update(...$params->toArray());
 * ```
 * Update the number of Voice Channels for the US Zone. This allows your account to handle multiple simultaneous inbound calls to US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->inboundChannels->update(...$params->toArray());`
 *
 * @see Telnyx\InboundChannels->update
 *
 * @phpstan-type inbound_channel_update_params = array{channels: int}
 */
final class InboundChannelUpdateParams implements BaseModel
{
    /** @use SdkModel<inbound_channel_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The new number of concurrent channels for the account.
     */
    #[Api]
    public int $channels;

    /**
     * `new InboundChannelUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundChannelUpdateParams::with(channels: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundChannelUpdateParams)->withChannels(...)
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
     * The new number of concurrent channels for the account.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj->channels = $channels;

        return $obj;
    }
}
