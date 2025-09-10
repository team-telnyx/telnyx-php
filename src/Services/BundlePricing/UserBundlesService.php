<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter as Filter1;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\UserBundlesContract;

use const Telnyx\Core\OMIT as omit;

final class UserBundlesService implements UserBundlesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates multiple user bundles for the user.
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
    ): UserBundleNewResponse {
        [$parsed, $options] = UserBundleCreateParams::parseRequest(
            [
                'idempotencyKey' => $idempotencyKey,
                'items' => $items,
                'authorizationBearer' => $authorizationBearer,
            ],
            $requestOptions,
        );
        $header_params = ['authorization_bearer' => 'authorization_bearer'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'bundle_pricing/user_bundles/bulk',
            headers: array_intersect_key($parsed, array_keys($header_params)),
            body: (object) array_diff_key($parsed, array_keys($header_params)),
            options: $options,
            convert: UserBundleNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a user bundle by its ID.
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function retrieve(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse {
        [$parsed, $options] = UserBundleRetrieveParams::parseRequest(
            ['authorizationBearer' => $authorizationBearer],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/user_bundles/%1$s', $userBundleID],
            headers: $parsed,
            options: $options,
            convert: UserBundleGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of user bundles.
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
    ): UserBundleListResponse {
        [$parsed, $options] = UserBundleListParams::parseRequest(
            [
                'filter' => $filter,
                'page' => $page,
                'authorizationBearer' => $authorizationBearer,
            ],
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string, string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/user_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UserBundleListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deactivates a user bundle by its ID.
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function deactivate(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse {
        [$parsed, $options] = UserBundleDeactivateParams::parseRequest(
            ['authorizationBearer' => $authorizationBearer],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['bundle_pricing/user_bundles/%1$s', $userBundleID],
            headers: $parsed,
            options: $options,
            convert: UserBundleDeactivateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the resources of a user bundle by its ID.
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function listResources(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse {
        [$parsed, $options] = UserBundleListResourcesParams::parseRequest(
            ['authorizationBearer' => $authorizationBearer],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/user_bundles/%1$s/resources', $userBundleID],
            headers: $parsed,
            options: $options,
            convert: UserBundleListResourcesResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns all user bundles that aren't in use.
     *
     * @param Filter1 $filter Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     */
    public function listUnused(
        $filter = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse {
        [$parsed, $options] = UserBundleListUnusedParams::parseRequest(
            ['filter' => $filter, 'authorizationBearer' => $authorizationBearer],
            $requestOptions,
        );
        $query_params = array_flip(['filter']);

        /** @var array<string, string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/user_bundles/unused',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UserBundleListUnusedResponse::class,
        );
    }
}
