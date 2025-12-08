<?php

declare(strict_types=1);

namespace Telnyx\InboundChannels;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update the number of Voice Channels for the US Zone. This allows your account to handle multiple simultaneous inbound calls to US numbers. Use this endpoint to increase or decrease your capacity based on expected call volume.
 *
 * @see Telnyx\Services\InboundChannelsService::update()
 *
 * @phpstan-type InboundChannelUpdateParamsShape = array{channels: int}
 */
final class InboundChannelUpdateParams implements BaseModel
{
    /** @use SdkModel<InboundChannelUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new number of concurrent channels for the account.
     */
    #[Required]
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

        $obj['channels'] = $channels;

        return $obj;
    }

    /**
     * The new number of concurrent channels for the account.
     */
    public function withChannels(int $channels): self
    {
        $obj = clone $this;
        $obj['channels'] = $channels;

        return $obj;
    }
}
