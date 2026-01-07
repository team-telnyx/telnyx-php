<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

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
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserBundlesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|UserBundleCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserBundleCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<string,mixed>|UserBundleRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserBundleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<UserBundle>>
     *
     * @throws APIException
     */
    public function list(
        array|UserBundleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<string,mixed>|UserBundleDeactivateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<string,mixed>|UserBundleListResourcesParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserBundleListUnusedParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserBundleListUnusedResponse>
     *
     * @throws APIException
     */
    public function listUnused(
        array|UserBundleListUnusedParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
