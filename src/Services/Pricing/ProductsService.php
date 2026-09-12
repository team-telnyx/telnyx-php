<?php

declare(strict_types=1);

namespace Telnyx\Services\Pricing;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\Pricing\Products\ProductGetResponse;
use Telnyx\Pricing\Products\ProductListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Pricing\ProductsContract;

/**
 * Public pricing operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProductsService implements ProductsContract
{
    /**
     * @api
     */
    public ProductsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProductsRawService($client);
    }

    /**
     * @api
     *
     * Returns pricing entries for a single product. Most products return standard rate entries with fields like rate, unit, country_iso, direction, and tiers. Inference products return model-specific fields (model, input_rate, output_rate, cached_input_rate) with tiered pricing. Some products use rate decks (pricing_type: rate_deck) where rates are determined dynamically.
     *
     * @param string $slug product slug from the catalog listing
     * @param string|Omitted|null $filterCountryISO Two-letter ISO 3166-1 alpha-2 country code (uppercase, e.g. US) to filter pricing to a single country.
     * @param int $pageNumber page number (1-based)
     * @param int $pageSize number of items per page (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ProductGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $slug,
        string|Omitted|null $filterCountryISO = Omitted::VALUE,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filterCountryISO' => $filterCountryISO,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($slug, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the full product catalog with pagination. Each entry contains a slug, display name, and description. Use the slug to fetch per-product pricing via GET /pricing/products/{slug}.
     *
     * @param int $pageNumber page number (1-based)
     * @param int $pageSize number of items per page (max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ProductListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
