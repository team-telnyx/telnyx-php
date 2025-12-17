<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
 *
 * @phpstan-type FilterShape = array{
 *   countryISO?: list<string>|null, resource?: list<string>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by country code.
     *
     * @var list<string>|null $countryISO
     */
    #[Optional('country_iso', list: 'string')]
    public ?array $countryISO;

    /**
     * Filter by resource.
     *
     * @var list<string>|null $resource
     */
    #[Optional(list: 'string')]
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
     * @param list<string>|null $countryISO
     * @param list<string>|null $resource
     */
    public static function with(
        ?array $countryISO = null,
        ?array $resource = null
    ): self {
        $self = new self;

        null !== $countryISO && $self['countryISO'] = $countryISO;
        null !== $resource && $self['resource'] = $resource;

        return $self;
    }

    /**
     * Filter by country code.
     *
     * @param list<string> $countryISO
     */
    public function withCountryISO(array $countryISO): self
    {
        $self = clone $this;
        $self['countryISO'] = $countryISO;

        return $self;
    }

    /**
     * Filter by resource.
     *
     * @param list<string> $resource
     */
    public function withResource(array $resource): self
    {
        $self = clone $this;
        $self['resource'] = $resource;

        return $self;
    }
}
