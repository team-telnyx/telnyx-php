<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\UsageReports;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupListParams;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\TelcoDataUsageReportResponse;
use Telnyx\PerPagePagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\UsageReports\NumberLookupRawContract;

/**
 * Number lookup usage reports.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberLookupRawService implements NumberLookupRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit a new telco data usage report
     *
     * @param array{
     *   aggregationType?: AggregationType|value-of<AggregationType>,
     *   endDate?: string,
     *   managedAccounts?: list<string>,
     *   startDate?: string,
     * }|NumberLookupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberLookupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberLookupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberLookupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/usage_reports/number_lookup',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: NumberLookupNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific telco data usage report by its ID
     *
     * @param string $id unique identifier of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberLookupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: NumberLookupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of telco data usage reports
     *
     * @param array{page?: int, perPage?: int}|NumberLookupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PerPagePagination<TelcoDataUsageReportResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberLookupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberLookupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/usage_reports/number_lookup',
            query: Util::array_transform_keys($parsed, ['perPage' => 'per_page']),
            options: $options,
            convert: TelcoDataUsageReportResponse::class,
            page: PerPagePagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific telco data usage report by its ID
     *
     * @param string $id unique identifier of the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/usage_reports/number_lookup/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
