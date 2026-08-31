<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WirelessWirelessBlocklistShape from \Telnyx\WirelessBlocklists\WirelessWirelessBlocklist
 *
 * @phpstan-type WirelessBlocklistNewResponseShape = array{
 *   data?: null|WirelessWirelessBlocklist|WirelessWirelessBlocklistShape
 * }
 */
final class WirelessBlocklistNewResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WirelessWirelessBlocklist $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WirelessWirelessBlocklist|WirelessWirelessBlocklistShape|null $data
     */
    public static function with(
        WirelessWirelessBlocklist|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WirelessWirelessBlocklist|WirelessWirelessBlocklistShape $data
     */
    public function withData(WirelessWirelessBlocklist|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
