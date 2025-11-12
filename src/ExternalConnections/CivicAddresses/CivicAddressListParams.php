<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;

/**
 * Returns the civic addresses and locations from Microsoft Teams.
 *
 * @see Telnyx\Services\ExternalConnections\CivicAddressesService::list()
 *
 * @phpstan-type CivicAddressListParamsShape = array{filter?: Filter}
 */
final class CivicAddressListParams implements BaseModel
{
    /** @use SdkModel<CivicAddressListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
