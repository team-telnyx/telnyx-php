<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UserBundleListParams); // set properties as needed
 * $client->bundlePricing.userBundles->list(...$params->toArray());
 * ```
 * Get a paginated list of user bundles.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->bundlePricing.userBundles->list(...$params->toArray());`
 *
 * @see Telnyx\BundlePricing\UserBundles->list
 *
 * @phpstan-type user_bundle_list_params = array{
 *   filter?: Filter, page?: Page, authorizationBearer?: string
 * }
 */
final class UserBundleListParams implements BaseModel
{
    /** @use SdkModel<user_bundle_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942.
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

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
        ?Page $page = null,
        ?string $authorizationBearer = null
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
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
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

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
