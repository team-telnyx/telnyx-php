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
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return UserBundleNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $idempotencyKey = omit,
        $items = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleNewResponse {
        $params = [
            'idempotencyKey' => $idempotencyKey,
            'items' => $items,
            'authorizationBearer' => $authorizationBearer,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleNewResponse {
        [$parsed, $options] = UserBundleCreateParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @return UserBundleGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse {
        $params = ['authorizationBearer' => $authorizationBearer];

        return $this->retrieveRaw($userBundleID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $userBundleID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleGetResponse {
        [$parsed, $options] = UserBundleRetrieveParams::parseRequest(
            $params,
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
     *
     * @return UserBundleListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResponse {
        $params = [
            'filter' => $filter,
            'page' => $page,
            'authorizationBearer' => $authorizationBearer,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleListResponse {
        [$parsed, $options] = UserBundleListParams::parseRequest(
            $params,
            $requestOptions
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
     *
     * @return UserBundleDeactivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse {
        $params = ['authorizationBearer' => $authorizationBearer];

        return $this->deactivateRaw($userBundleID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleDeactivateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deactivateRaw(
        string $userBundleID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleDeactivateResponse {
        [$parsed, $options] = UserBundleDeactivateParams::parseRequest(
            $params,
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
     *
     * @return UserBundleListResourcesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse {
        $params = ['authorizationBearer' => $authorizationBearer];

        return $this->listResourcesRaw($userBundleID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleListResourcesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listResourcesRaw(
        string $userBundleID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleListResourcesResponse {
        [$parsed, $options] = UserBundleListResourcesParams::parseRequest(
            $params,
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
     * @param Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter $filter Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return UserBundleListUnusedResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listUnused(
        $filter = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse {
        $params = [
            'filter' => $filter, 'authorizationBearer' => $authorizationBearer,
        ];

        return $this->listUnusedRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return UserBundleListUnusedResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listUnusedRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleListUnusedResponse {
        [$parsed, $options] = UserBundleListUnusedParams::parseRequest(
            $params,
            $requestOptions
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
