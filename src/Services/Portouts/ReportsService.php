<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\Reports\ExportPortoutsCsvReport;
use Telnyx\Portouts\Reports\ReportCreateParams;
use Telnyx\Portouts\Reports\ReportCreateParams\ReportType;
use Telnyx\Portouts\Reports\ReportGetResponse;
use Telnyx\Portouts\Reports\ReportListParams;
use Telnyx\Portouts\Reports\ReportListParams\Filter\Status;
use Telnyx\Portouts\Reports\ReportListResponse;
use Telnyx\Portouts\Reports\ReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\ReportsContract;

final class ReportsService implements ReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generate reports about port-out operations.
     *
     * @param array{
     *   params: array{
     *     filters: array{
     *       created_at__gt?: string|\DateTimeInterface,
     *       created_at__lt?: string|\DateTimeInterface,
     *       customer_reference__in?: list<string>,
     *       end_user_name?: string,
     *       phone_numbers__overlaps?: list<string>,
     *       status__in?: list<mixed>,
     *     },
     *   }|ExportPortoutsCsvReport,
     *   report_type: 'export_portouts_csv'|ReportType,
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
            path: 'portouts/reports',
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
            path: ['portouts/reports/%1$s', $id],
            options: $requestOptions,
            convert: ReportGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List the reports generated about port-out operations.
     *
     * @param array{
     *   filter?: array{
     *     report_type?: 'export_portouts_csv'|ReportListParams\Filter\ReportType,
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
            path: 'portouts/reports',
            query: $parsed,
            options: $options,
            convert: ReportListResponse::class,
        );

        return $response->parse();
    }
}
