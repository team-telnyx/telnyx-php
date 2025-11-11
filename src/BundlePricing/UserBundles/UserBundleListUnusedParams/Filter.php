<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
 *
 * @phpstan-type FilterShape = array{
 *   country_iso?: list<string>|null, resource?: list<string>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by country code.
     *
     * @var list<string>|null $country_iso
     */
    #[Api(list: 'string', optional: true)]
    public ?array $country_iso;

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
     * @param list<string> $country_iso
     * @param list<string> $resource
     */
    public static function with(
        ?array $country_iso = null,
        ?array $resource = null
    ): self {
        $obj = new self;

        null !== $country_iso && $obj->country_iso = $country_iso;
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
        $obj->country_iso = $countryISO;

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
