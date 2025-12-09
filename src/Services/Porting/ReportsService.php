<?php

declare(strict_types=1);

namespace Telnyx\Services\Porting;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\Reports\ExportPortingOrdersCsvReport;
use Telnyx\Porting\Reports\ReportCreateParams;
use Telnyx\Porting\Reports\ReportCreateParams\ReportType;
use Telnyx\Porting\Reports\ReportGetResponse;
use Telnyx\Porting\Reports\ReportListParams;
use Telnyx\Porting\Reports\ReportListParams\Filter\Status;
use Telnyx\Porting\Reports\ReportListResponse;
use Telnyx\Porting\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Porting\ReportsContract;

final class ReportsService implements ReportsContract
{
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
     *   params: array{
     *     filters: array{
     *       createdAtGt?: string|\DateTimeInterface,
     *       createdAtLt?: string|\DateTimeInterface,
     *       customerReferenceIn?: list<string>,
     *       statusIn?: list<mixed>,
     *     },
     *   }|ExportPortingOrdersCsvReport,
     *   reportType: 'export_porting_orders_csv'|ReportType,
     * }|ReportCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ReportCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ReportNewResponse {
        [$parsed, $options] = ReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ReportNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'porting/reports',
            body: (object) $parsed,
            options: $options,
            convert: ReportNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a specific report generated.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ReportGetResponse {
        /** @var BaseResponse<ReportGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['porting/reports/%1$s', $id],
            options: $requestOptions,
            convert: ReportGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List the reports generated about porting operations.
     *
     * @param array{
     *   filter?: array{
     *     reportType?: 'export_porting_orders_csv'|ReportListParams\Filter\ReportType,
     *     status?: 'pending'|'completed'|Status,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|ReportListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ReportListParams $params,
        ?RequestOptions $requestOptions = null
    ): ReportListResponse {
        [$parsed, $options] = ReportListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ReportListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'porting/reports',
            query: $parsed,
            options: $options,
            convert: ReportListResponse::class,
        );

        return $response->parse();
    }
}
