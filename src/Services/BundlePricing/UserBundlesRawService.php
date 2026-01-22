<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundle;
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
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\UserBundlesRawContract;

/**
 * @phpstan-import-type ItemShape from \Telnyx\BundlePricing\UserBundles\UserBundleCreateParams\Item
 * @phpstan-import-type FilterShape from \Telnyx\BundlePricing\UserBundles\UserBundleListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\BundlePricing\UserBundles\UserBundleListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams\Filter as FilterShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UserBundlesRawService implements UserBundlesRawContract
{
    // @phpstan-ignore-next-line
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
     *   idempotencyKey?: string,
     *   items?: list<Item|ItemShape>,
     *   authorizationBearer?: string,
     * }|UserBundleCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserBundleCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['authorizationBearer' => 'authorization_bearer'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'bundle_pricing/user_bundles/bulk',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: UserBundleNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a user bundle by its ID.
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array{authorizationBearer?: string}|UserBundleRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        array|UserBundleRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/user_bundles/%1$s', $userBundleID],
            headers: Util::array_transform_keys(
                $parsed,
                ['authorizationBearer' => 'authorization_bearer']
            ),
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
     *   filter?: Filter|FilterShape,
     *   page?: Page|PageShape,
     *   authorizationBearer?: string,
     * }|UserBundleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<UserBundle>>
     *
     * @throws APIException
     */
    public function list(
        array|UserBundleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/user_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: Util::array_transform_keys(
                $header_params,
                ['authorizationBearer' => 'authorization_bearer']
            ),
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
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array{authorizationBearer?: string}|UserBundleDeactivateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleDeactivateResponse>
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        array|UserBundleDeactivateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleDeactivateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['bundle_pricing/user_bundles/%1$s', $userBundleID],
            headers: Util::array_transform_keys(
                $parsed,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: UserBundleDeactivateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the resources of a user bundle by its ID.
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array{authorizationBearer?: string}|UserBundleListResourcesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleListResourcesResponse>
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        array|UserBundleListResourcesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleListResourcesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/user_bundles/%1$s/resources', $userBundleID],
            headers: Util::array_transform_keys(
                $parsed,
                ['authorizationBearer' => 'authorization_bearer']
            ),
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
     *   filter?: UserBundleListUnusedParams\Filter|FilterShape1,
     *   authorizationBearer?: string,
     * }|UserBundleListUnusedParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleListUnusedResponse>
     *
     * @throws APIException
     */
    public function listUnused(
        array|UserBundleListUnusedParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserBundleListUnusedParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/user_bundles/unused',
            query: array_intersect_key($parsed, $query_params),
            headers: Util::array_transform_keys(
                $header_params,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: UserBundleListUnusedResponse::class,
        );
    }
}
