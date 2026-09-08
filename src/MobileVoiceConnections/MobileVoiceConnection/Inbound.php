<?php

declare(strict_types=1);

namespace Telnyx\MobileVoiceConnections\MobileVoiceConnection;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type InboundShape = array{channelLimit?: int|null}
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    #[Optional('channel_limit', nullable: true)]
    public ?int $channelLimit;

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
        int|Omitted|null $channelLimit = Omitted::VALUE
    ): self {
        $self = new self;

        Omitted::VALUE !== $channelLimit && $self['channelLimit'] = $channelLimit;

        return $self;
    }

    public function withChannelLimit(?int $channelLimit): self
    {
        $self = clone $this;
        $self['channelLimit'] = $channelLimit;

        return $self;
    }
}
