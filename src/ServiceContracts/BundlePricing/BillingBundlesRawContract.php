<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BillingBundlesRawContract
{
    /**
     * @api
     *
     * @param string $bundleID billing bundle's ID, this is used to identify the billing bundle in the API
     * @param array<mixed>|BillingBundleRetrieveParams $params
     *
     * @return BaseResponse<BillingBundleGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        array|BillingBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BillingBundleListParams $params
     *
     * @return BaseResponse<BillingBundleListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BillingBundleListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
