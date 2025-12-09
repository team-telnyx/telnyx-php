<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns all user bundles that aren't in use.
 *
 * @see Telnyx\Services\BundlePricing\UserBundlesService::listUnused()
 *
 * @phpstan-type UserBundleListUnusedParamsShape = array{
 *   filter?: Filter|array{
 *     countryISO?: list<string>|null, resource?: list<string>|null
 *   },
 *   authorizationBearer?: string,
 * }
 */
final class UserBundleListUnusedParams implements BaseModel
{
    /** @use SdkModel<UserBundleListUnusedParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Optional]
    public ?string $authorizationBearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   countryISO?: list<string>|null, resource?: list<string>|null
     * } $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $authorizationBearer = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $authorizationBearer && $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
     *
     * @param Filter|array{
     *   countryISO?: list<string>|null, resource?: list<string>|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $self = clone $this;
        $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }
}
