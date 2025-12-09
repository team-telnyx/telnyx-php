<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\UserBundles\UserBundleCreateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateParams;
use Telnyx\BundlePricing\UserBundles\UserBundleDeactivateResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleGetResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListResourcesResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedParams;
use Telnyx\BundlePricing\UserBundles\UserBundleListUnusedResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleNewResponse;
use Telnyx\BundlePricing\UserBundles\UserBundleRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface UserBundlesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserBundleCreateParams $params
     *
     * @return BaseResponse<UserBundleNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|UserBundleCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<mixed>|UserBundleRetrieveParams $params
     *
     * @return BaseResponse<UserBundleGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        array|UserBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleListParams $params
     *
     * @return BaseResponse<UserBundleListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|UserBundleListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<mixed>|UserBundleDeactivateParams $params
     *
     * @return BaseResponse<UserBundleDeactivateResponse>
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        array|UserBundleDeactivateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userBundleID user bundle's ID, this is used to identify the user bundle in the API
     * @param array<mixed>|UserBundleListResourcesParams $params
     *
     * @return BaseResponse<UserBundleListResourcesResponse>
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        array|UserBundleListResourcesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleListUnusedParams $params
     *
     * @return BaseResponse<UserBundleListUnusedResponse>
     *
     * @throws APIException
     */
    public function listUnused(
        array|UserBundleListUnusedParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
