<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\BillingBundlesContract;

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
     * @param array{authorization_bearer?: string}|BillingBundleRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        array|BillingBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleGetResponse {
        [$parsed, $options] = BillingBundleRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BillingBundleGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['bundle_pricing/billing_bundles/%1$s', $bundleID],
            headers: $parsed,
            options: $options,
            convert: BillingBundleGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all allowed bundles.
     *
     * @param array{
     *   filter?: array{country_iso?: list<string>, resource?: list<string>},
     *   page?: array{number?: int, size?: int},
     *   authorization_bearer?: string,
     * }|BillingBundleListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BillingBundleListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BillingBundleListResponse {
        [$parsed, $options] = BillingBundleListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        /** @var BaseResponse<BillingBundleListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'bundle_pricing/billing_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: BillingBundleListResponse::class,
        );

        return $response->parse();
    }
}
