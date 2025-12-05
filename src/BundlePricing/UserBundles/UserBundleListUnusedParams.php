<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter;
use Telnyx\Core\Attributes\Api;
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
 *     country_iso?: list<string>|null, resource?: list<string>|null
 *   },
 *   authorization_bearer?: string,
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
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Api(optional: true)]
    public ?string $authorization_bearer;

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
     *   country_iso?: list<string>|null, resource?: list<string>|null
     * } $filter
     */
    public static function with(
        Filter|array|null $filter = null,
        ?string $authorization_bearer = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $authorization_bearer && $obj['authorization_bearer'] = $authorization_bearer;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
     *
     * @param Filter|array{
     *   country_iso?: list<string>|null, resource?: list<string>|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorization_bearer'] = $authorizationBearer;

        return $obj;
    }
}
