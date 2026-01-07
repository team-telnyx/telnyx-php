<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundle;
use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ItemShape from \Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item
 * @phpstan-import-type FilterShape from \Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserBundlesContract
{
    /**
     * @api
     *
     * @param string $idempotencyKey Body param: Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     * @param list<Item|ItemShape> $items Body param:
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserBundleNewResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserBundleGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param Page|PageShape $page Query param: Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<UserBundle>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserBundleDeactivateResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserBundleListResourcesResponse;

    /**
     * @api
     *
     * @param \Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter|FilterShape1 $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listUnused(
        \Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter|array|null $filter = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserBundleListUnusedResponse;
}
