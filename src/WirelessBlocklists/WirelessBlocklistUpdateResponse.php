<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type WirelessBlocklistShape from \Telnyx\WirelessBlocklists\WirelessBlocklist
 *
 * @phpstan-type WirelessBlocklistUpdateResponseShape = array{
 *   data?: null|WirelessBlocklist|WirelessBlocklistShape
 * }
 */
final class WirelessBlocklistUpdateResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?WirelessBlocklist $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param WirelessBlocklistShape $data
     */
    public static function with(WirelessBlocklist|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param WirelessBlocklistShape $data
     */
    public function withData(WirelessBlocklist|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
