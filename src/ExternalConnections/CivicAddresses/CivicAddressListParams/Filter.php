<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\CivicAddresses\CivicAddressListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter parameter for civic addresses (deepObject style). Supports filtering by country.
 *
 * @phpstan-type filter_alias = array{country?: list<string>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The country (or countries) to filter addresses by.
     *
     * @var list<string>|null $country
     */
    #[Api(list: 'string', optional: true)]
    public ?array $country;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $country
     */
    public static function with(?array $country = null): self
    {
        $obj = new self;

        null !== $country && $obj->country = $country;

        return $obj;
    }

    /**
     * The country (or countries) to filter addresses by.
     *
     * @param list<string> $country
     */
    public function withCountry(array $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }
}
