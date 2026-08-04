<?php

declare(strict_types=1);

namespace Telnyx\Services\Pricing;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Pricing\Products\ProductGetResponse;
use Telnyx\Pricing\Products\ProductListParams;
use Telnyx\Pricing\Products\ProductListResponse;
use Telnyx\Pricing\Products\ProductRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Pricing\ProductsRawContract;

/**
 * Public pricing operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProductsRawService implements ProductsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns pricing entries for a single product. Most products return standard rate entries with fields like rate, unit, country_iso, direction, and tiers. Inference products return model-specific fields (model, input_rate, output_rate, cached_input_rate) with tiered pricing. Some products use rate decks (pricing_type: rate_deck) where rates are determined dynamically.
     *
     * @param string $slug product slug from the catalog listing
     * @param array{
     *   filterCountryISO?: string|null, pageNumber?: int, pageSize?: int
     * }|ProductRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProductGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        array|ProductRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProductRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['pricing/products/%1$s', $slug],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCountryISO' => 'filter[country_iso]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: ProductGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the full product catalog with pagination. Each entry contains a slug, display name, and description. Use the slug to fetch per-product pricing via GET /pricing/products/{slug}.
     *
     * @param array{pageNumber?: int, pageSize?: int}|ProductListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ProductListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ProductListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProductListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pricing/products',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ProductListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
