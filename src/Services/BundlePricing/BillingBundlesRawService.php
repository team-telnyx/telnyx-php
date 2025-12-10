<?php

declare(strict_types=1);

namespace Telnyx\Services\BundlePricing;

use Telnyx\BundlePricing\BillingBundles\BillingBundleGetResponse;
use Telnyx\BundlePricing\BillingBundles\BillingBundleListParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleRetrieveParams;
use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BundlePricing\BillingBundlesRawContract;

final class BillingBundlesRawService implements BillingBundlesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a single bundle by ID.
     *
     * @param string $bundleID billing bundle's ID, this is used to identify the billing bundle in the API
     * @param array{authorizationBearer?: string}|BillingBundleRetrieveParams $params
     *
     * @return BaseResponse<BillingBundleGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $bundleID,
        array|BillingBundleRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BillingBundleRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['bundle_pricing/billing_bundles/%1$s', $bundleID],
            headers: Util::array_transform_keys(
                $parsed,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: BillingBundleGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all allowed bundles.
     *
     * @param array{
     *   filter?: array{countryISO?: list<string>, resource?: list<string>},
     *   page?: array{number?: int, size?: int},
     *   authorizationBearer?: string,
     * }|BillingBundleListParams $params
     *
     * @return BaseResponse<DefaultPagination<BillingBundleSummary>>
     *
     * @throws APIException
     */
    public function list(
        array|BillingBundleListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BillingBundleListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['filter', 'page']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'bundle_pricing/billing_bundles',
            query: array_intersect_key($parsed, $query_params),
            headers: Util::array_transform_keys(
                $header_params,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: BillingBundleSummary::class,
            page: DefaultPagination::class,
        );
    }
}
