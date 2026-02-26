<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CivicAddressShape from \Telnyx\ExternalConnections\CivicAddresses\CivicAddress
 *
 * @phpstan-type CivicAddressGetResponseShape = array{
 *   data?: null|CivicAddress|CivicAddressShape
 * }
 */
final class CivicAddressGetResponse implements BaseModel
{
    /** @use SdkModel<CivicAddressGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CivicAddress $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CivicAddress|CivicAddressShape|null $data
     */
    public static function with(CivicAddress|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CivicAddress|CivicAddressShape $data
     */
    public function withData(CivicAddress|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
