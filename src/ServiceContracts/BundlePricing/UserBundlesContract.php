<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter as Filter1;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface UserBundlesContract
{
    /**
     * @api
     *
     * @param string $idempotencyKey Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     * @param list<Item> $items
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function create(
        $idempotencyKey = omit,
        $items = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleNewResponse;

    /**
     * @api
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function retrieve(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function list(
        $filter = omit,
        $page = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResponse;

    /**
     * @api
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function deactivate(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse;

    /**
     * @api
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function listResources(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse;

    /**
     * @api
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function listUnused(
        $filter = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse;
}
