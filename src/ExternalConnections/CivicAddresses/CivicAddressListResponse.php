<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CivicAddressShape from \Telnyx\ExternalConnections\CivicAddresses\CivicAddress
 *
 * @phpstan-type CivicAddressListResponseShape = array{
 *   data?: list<CivicAddress|CivicAddressShape>|null
 * }
 */
final class CivicAddressListResponse implements BaseModel
{
    /** @use SdkModel<CivicAddressListResponseShape> */
    use SdkModel;

    /** @var list<CivicAddress>|null $data */
    #[Optional(list: CivicAddress::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CivicAddress|CivicAddressShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CivicAddress|CivicAddressShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
