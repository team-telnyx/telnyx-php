<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UsageReportsContract;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;
use Telnyx\UsageReports\UsageReportListResponse;

final class UsageReportsService implements UsageReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Telnyx usage data by product, broken out by the specified dimensions
     *
     * @param array{
     *   dimensions: list<string>,
     *   metrics: list<string>,
     *   product: string,
     *   date_range?: string,
     *   end_date?: string,
     *   filter?: string,
     *   format?: "csv"|"json",
     *   managed_accounts?: bool,
     *   page?: array{number?: int, size?: int},
     *   sort?: list<string>,
     *   start_date?: string,
     *   authorization_bearer?: string,
     * }|UsageReportListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        ?RequestOptions $requestOptions = null
    ): UsageReportListResponse {
        [$parsed, $options] = UsageReportListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(
            [
                'dimensions',
                'metrics',
                'product',
                'date_range',
                'end_date',
                'filter',
                'format',
                'managed_accounts',
                'page',
                'sort',
                'start_date',
            ],
        );

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'usage_reports',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UsageReportListResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions
     *
     * @param array{
     *   product?: string, authorization_bearer?: string
     * }|UsageReportGetOptionsParams $params
     *
     * @throws APIException
     */
    public function getOptions(
        array|UsageReportGetOptionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): UsageReportGetOptionsResponse {
        [$parsed, $options] = UsageReportGetOptionsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = ['product'];

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'usage_reports/options',
            query: array_intersect_key($parsed, $query_params),
            headers: $header_params,
            options: $options,
            convert: UsageReportGetOptionsResponse::class,
        );
    }
}
