<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface UserBundlesContract
{
    /**
     * @api
     *
     * @param string $idempotencyKey Body param: Idempotency key for the request. Can be any UUID, but should always be unique for each request.
     * @param list<array{billingBundleID: string, quantity: int}> $items Body param:
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function create(
        ?string $idempotencyKey = null,
        ?array $items = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleNewResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse;

    /**
     * @api
     *
     * @param array{
     *   countryISO?: list<string>, resource?: list<string>
     * } $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param array{
     *   number?: int, size?: int
     * } $page Query param: Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse;

    /**
     * @api
     *
     * @param array{
     *   countryISO?: list<string>, resource?: list<string>
     * } $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function listUnused(
        ?array $filter = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse;
}
