<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundle;
use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\UserBundlesContract;

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
     * @param array{
     *   idempotency_key?: string,
     *   items?: list<array{billing_bundle_id: string, quantity: int}>,
     *   authorization_bearer?: string,
     * }|UserBundleCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserBundleCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): UserBundleNewResponse {
        [$parsed, $options] = UserBundleCreateParams::parseRequest(
            $params,
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
     * @param array{authorization_bearer?: string}|UserBundleRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        array|UserBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse {
        [$parsed, $options] = UserBundleRetrieveParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{country_iso?: list<string>, resource?: list<string>},
     *   page?: array{number?: int, size?: int},
     *   authorization_bearer?: string,
     * }|UserBundleListParams $params
     *
     * @return DefaultPagination<UserBundle>
     *
     * @throws APIException
     */
    public function list(
        array|UserBundleListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination {
        [$parsed, $options] = UserBundleListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/user_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UserBundle::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deactivates a user bundle by its ID.
     *
     * @param array{authorization_bearer?: string}|UserBundleDeactivateParams $params
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        array|UserBundleDeactivateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse {
        [$parsed, $options] = UserBundleDeactivateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   authorization_bearer?: string
     * }|UserBundleListResourcesParams $params
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        array|UserBundleListResourcesParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse {
        [$parsed, $options] = UserBundleListResourcesParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{country_iso?: list<string>, resource?: list<string>},
     *   authorization_bearer?: string,
     * }|UserBundleListUnusedParams $params
     *
     * @throws APIException
     */
    public function listUnused(
        array|UserBundleListUnusedParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse {
        [$parsed, $options] = UserBundleListUnusedParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['filter'];

        /** @var array<string,string> */
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
