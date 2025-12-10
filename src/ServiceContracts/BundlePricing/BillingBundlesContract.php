<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface BillingBundlesContract
{
    /**
     * @api
     *
     * @param string $bundleID billing bundle's ID, this is used to identify the billing bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleGetResponse;

    /**
     * @api
     *
     * @param array{
     *   countryISO?: list<string>, resource?: list<string>
     * } $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param array{
     *   number?: int, size?: int
     * } $page Query param: Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     *
     * @return DefaultPagination<BillingBundleSummary>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?string $authorizationBearer = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
