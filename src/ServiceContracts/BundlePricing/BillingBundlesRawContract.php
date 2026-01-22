<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BillingBundlesRawContract
{
    /**
     * @api
     *
     * @param string $bundleID billing bundle's ID, this is used to identify the billing bundle in the API
     * @param array<string,mixed>|BillingBundleRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BillingBundleGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        array|BillingBundleRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BillingBundleListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<BillingBundleSummary>>
     *
     * @throws APIException
     */
    public function list(
        array|BillingBundleListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
