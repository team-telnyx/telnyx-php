<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserBundleListUnusedParams); // set properties as needed
 * $client->bundlePricing.userBundles->listUnused(...$params->toArray());
 * ```
 * Returns all user bundles that aren't in use.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->bundlePricing.userBundles->listUnused(...$params->toArray());`
 *
 * @see Telnyx\BundlePricing\UserBundles->listUnused
 *
 * @phpstan-type user_bundle_list_unused_params = array{
 *   filter?: Filter, authorizationBearer?: string
 * }
 */
final class UserBundleListUnusedParams implements BaseModel
{
    /** @use SdkModel<user_bundle_list_unused_params> */
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
    public ?string $authorizationBearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Filter $filter = null,
        ?string $authorizationBearer = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $authorizationBearer && $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }
}
