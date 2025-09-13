<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Filter;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Page;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\BillingBundlesContract;

use const Telnyx\Core\OMIT as omit;

final class BillingBundlesService implements BillingBundlesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single bundle by ID.
     *
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     *
     * @return BillingBundleGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $bundleID,
        $authorizationBearer = omit,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleGetResponse {
        [$parsed, $options] = BillingBundleRetrieveParams::parseRequest(
            ['authorizationBearer' => $authorizationBearer],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/billing_bundles/%1$s', $bundleID],
            headers: $parsed,
            options: $options,
            convert: BillingBundleGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all allowed bundles.
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
    ): BillingBundleListResponse {
        [$parsed, $options] = BillingBundleListParams::parseRequest(
            [
                'filter' => $filter,
                'page' => $page,
                'authorizationBearer' => $authorizationBearer,
            ],
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string, string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/billing_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: BillingBundleListResponse::class,
        );
    }
}
