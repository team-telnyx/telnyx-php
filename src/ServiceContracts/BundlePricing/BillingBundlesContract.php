<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface BillingBundlesContract
{
    /**
     * @api
     *
     * @param array<mixed>|BillingBundleRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        array|BillingBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|BillingBundleListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BillingBundleListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleListResponse;
}
