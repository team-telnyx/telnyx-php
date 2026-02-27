<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\PortingReport;
use Telnyx\Porting\Reports\ReportCreateParams;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams;
use Telnyx\Porting\Reports\ReportListParams\Filter;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\ReportsRawContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type ExportPortingOrdersCsvReportShape from \Telnyx\Porting\Reports\ExportPortingOrdersCsvReport
 * @phpstan-import-type FilterShape from \Telnyx\Porting\Reports\ReportListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReportsRawService implements ReportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate reports about porting operations.
     *
     * @param array{
     *   params: ExportPortingOrdersCsvReport|ExportPortingOrdersCsvReportShape,
     *   reportType: ReportType|value-of<ReportType>,
     * }|ReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'porting/reports',
            body: (object) $parsed,
            options: $options,
            convert: ReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific report generated.
     *
     * @param string $id identifies a report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReportGetResponse>
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
            path: ['porting/reports/%1$s', $id],
            options: $requestOptions,
            convert: ReportGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List the reports generated about porting operations.
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|ReportListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingReport>>
     *
     * @throws APIException
     */
    public function list(
        array|ReportListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting/reports',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PortingReport::class,
            page: DefaultFlatPagination::class,
        );
    }
}
