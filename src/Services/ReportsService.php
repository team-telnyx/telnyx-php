<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Reports\ReportListMdrsParams;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ReportsContract;
use Telnyx\Services\Reports\CdrUsageReportsService;
use Telnyx\Services\Reports\MdrUsageReportsService;

final class ReportsService implements ReportsContract
{
    /**
     * @api
     */
    public CdrUsageReportsService $cdrUsageReports;

    /**
     * @api
     */
    public MdrUsageReportsService $mdrUsageReports;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->cdrUsageReports = new CdrUsageReportsService($client);
        $this->mdrUsageReports = new MdrUsageReportsService($client);
    }

    /**
     * @api
     *
     * Fetch all Mdr records
     *
     * @param array{
     *   id?: string,
     *   cld?: string,
     *   cli?: string,
     *   direction?: 'INBOUND'|'OUTBOUND',
     *   end_date?: string,
     *   message_type?: 'SMS'|'MMS',
     *   profile?: string,
     *   start_date?: string,
     *   status?: value-of<Status>,
     * }|ReportListMdrsParams $params
     *
     * @throws APIException
     */
    public function listMdrs(
        array|ReportListMdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): ReportListMdrsResponse {
        [$parsed, $options] = ReportListMdrsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ReportListMdrsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'reports/mdrs',
            query: $parsed,
            options: $options,
            convert: ReportListMdrsResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all Wdr records
     *
     * @param array{
     *   id?: string,
     *   end_date?: string,
     *   imsi?: string,
     *   mcc?: string,
     *   mnc?: string,
     *   page?: array{number?: int, size?: int},
     *   phone_number?: string,
     *   sim_card_id?: string,
     *   sim_group_id?: string,
     *   sim_group_name?: string,
     *   sort?: list<string>,
     *   start_date?: string,
     * }|ReportListWdrsParams $params
     *
     * @throws APIException
     */
    public function listWdrs(
        array|ReportListWdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): ReportListWdrsResponse {
        [$parsed, $options] = ReportListWdrsParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ReportListWdrsResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'reports/wdrs',
            query: $parsed,
            options: $options,
            convert: ReportListWdrsResponse::class,
        );

        return $response->parse();
    }
}
