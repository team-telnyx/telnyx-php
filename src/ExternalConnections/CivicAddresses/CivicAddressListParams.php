<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter;

/**
 * Returns the civic addresses and locations from Microsoft Teams.
 *
 * @see Telnyx\Services\ExternalConnections\CivicAddressesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams\Filter
 *
 * @phpstan-type CivicAddressListParamsShape = array{
 *   filter?: null|Filter|FilterShape
 * }
 */
final class CivicAddressListParams implements BaseModel
{
    /** @use SdkModel<CivicAddressListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Filter parameter for civic addresses (deepObject style). Supports filtering by country.
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
