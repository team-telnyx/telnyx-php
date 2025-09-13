<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
 *
 * @phpstan-type filter_alias = array{
 *   countryISO?: list<string>, resource?: list<string>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by country code.
     *
     * @var list<string>|null $countryISO
     */
    #[Api('country_iso', list: 'string', optional: true)]
    public ?array $countryISO;

    /**
     * Filter by resource.
     *
     * @var list<string>|null $resource
     */
    #[Api(list: 'string', optional: true)]
    public ?array $resource;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $countryISO
     * @param list<string> $resource
     */
    public static function with(
        ?array $countryISO = null,
        ?array $resource = null
    ): self {
        $obj = new self;

        null !== $countryISO && $obj->countryISO = $countryISO;
        null !== $resource && $obj->resource = $resource;

        return $obj;
    }

    /**
     * Filter by country code.
     *
     * @param list<string> $countryISO
     */
    public function withCountryISO(array $countryISO): self
    {
        $obj = clone $this;
        $obj->countryISO = $countryISO;

        return $obj;
    }

    /**
     * Filter by resource.
     *
     * @param list<string> $resource
     */
    public function withResource(array $resource): self
    {
        $obj = clone $this;
        $obj->resource = $resource;

        return $obj;
    }
}
