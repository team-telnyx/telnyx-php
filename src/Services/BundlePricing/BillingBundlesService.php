<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Filter;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Page;
use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\BillingBundlesContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\BundlePricing\BillingBundles\BillingBundleListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BillingBundlesService implements BillingBundlesContract
{
    /**
     * @api
     */
    public BillingBundlesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BillingBundlesRawService($client);
    }

    /**
     * @api
     *
     * Get a single bundle by ID.
     *
     * @param string $bundleID billing bundle's ID, this is used to identify the billing bundle in the API
     * @param string $authorizationBearer Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): BillingBundleGetResponse {
        $params = Util::removeNulls(
            ['authorizationBearer' => $authorizationBearer]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($bundleID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all allowed bundles.
     *
     * @param Filter|FilterShape $filter Query param: Consolidated filter parameter (deepObject style). Supports filtering by country_iso and resource. Examples: filter[country_iso]=US or filter[resource]=+15617819942
     * @param Page|PageShape $page Query param: Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param string $authorizationBearer Header param: Authenticates the request with your Telnyx API V2 KEY
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<BillingBundleSummary>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $authorizationBearer = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'page' => $page,
                'authorizationBearer' => $authorizationBearer,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
