<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Filter;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Page;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface BillingBundlesContract
{
    /**
     * @api
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return BillingBundleGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $bundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return BillingBundleListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleListResponse;
}
