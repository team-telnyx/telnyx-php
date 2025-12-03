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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface UserBundlesContract
{
    /**
     * @api
     *
     * @param array<mixed>|UserBundleCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|UserBundleCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $userBundleID,
        array|UserBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleListParams $params
     *
     * @return DefaultPagination<UserBundle>
     *
     * @throws APIException
     */
    public function list(
        array|UserBundleListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleDeactivateParams $params
     *
     * @throws APIException
     */
    public function deactivate(
        string $userBundleID,
        array|UserBundleDeactivateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleDeactivateResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleListResourcesParams $params
     *
     * @throws APIException
     */
    public function listResources(
        string $userBundleID,
        array|UserBundleListResourcesParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListResourcesResponse;

    /**
     * @api
     *
     * @param array<mixed>|UserBundleListUnusedParams $params
     *
     * @throws APIException
     */
    public function listUnused(
        array|UserBundleListUnusedParams $params,
        ?RequestOptions $requestOptions = null,
    ): UserBundleListUnusedResponse;
}
