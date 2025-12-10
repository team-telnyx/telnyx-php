<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UsageReportsRawContract;
use Telnyx\UsageReports\UsageReportGetOptionsParams;
use Telnyx\UsageReports\UsageReportGetOptionsResponse;
use Telnyx\UsageReports\UsageReportListParams;
use Telnyx\UsageReports\UsageReportListParams\Format;

final class UsageReportsRawService implements UsageReportsRawContract
{
    // @phpstan-ignore-next-line
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
     *   dateRange?: string,
     *   endDate?: string,
     *   filter?: string,
     *   format?: 'csv'|'json'|Format,
     *   managedAccounts?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: list<string>,
     *   startDate?: string,
     *   authorizationBearer?: string,
     * }|UsageReportListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<array<string,mixed>>>
     *
     * @throws APIException
     */
    public function list(
        array|UsageReportListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
                'page[number]',
                'page[size]',
                'sort',
                'start_date',
            ],
        );

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'usage_reports',
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                [
                    'dateRange' => 'date_range',
                    'endDate' => 'end_date',
                    'managedAccounts' => 'managed_accounts',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'startDate' => 'start_date',
                ],
            ),
            headers: Util::array_transform_keys(
                $header_params,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: new MapOf('mixed'),
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions
     *
     * @param array{
     *   product?: string, authorizationBearer?: string
     * }|UsageReportGetOptionsParams $params
     *
     * @return BaseResponse<UsageReportGetOptionsResponse>
     *
     * @throws APIException
     */
    public function getOptions(
        array|UsageReportGetOptionsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UsageReportGetOptionsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['product']);

        /** @var array<string,string> */
        $header_params = array_diff_key($parsed, $query_params);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'usage_reports/options',
            query: array_intersect_key($parsed, $query_params),
            headers: Util::array_transform_keys(
                $header_params,
                ['authorizationBearer' => 'authorization_bearer']
            ),
            options: $options,
            convert: UsageReportGetOptionsResponse::class,
        );
    }
}
