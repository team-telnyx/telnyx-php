<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Reports\ReportListMdrsParams;
use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams;
use Telnyx\Reports\ReportListWdrsParams\Page;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ReportsContract;
use Telnyx\Services\Reports\CdrUsageReportsService;
use Telnyx\Services\Reports\MdrUsageReportsService;

use const Telnyx\Core\OMIT as omit;

final class ReportsService implements ReportsContract
{
    /**
     * @@api
     */
    public CdrUsageReportsService $cdrUsageReports;

    /**
     * @@api
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
     * @param string $id Message uuid
     * @param string $cld Destination number
     * @param string $cli Origination number
     * @param Direction|value-of<Direction> $direction Direction (inbound or outbound)
     * @param string $endDate Pagination end date
     * @param MessageType|value-of<MessageType> $messageType Type of message
     * @param string $profile Name of the profile
     * @param string $startDate Pagination start date
     * @param Status|value-of<Status> $status Message status
     *
     * @return ReportListMdrsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listMdrs(
        $id = omit,
        $cld = omit,
        $cli = omit,
        $direction = omit,
        $endDate = omit,
        $messageType = omit,
        $profile = omit,
        $startDate = omit,
        $status = omit,
        ?RequestOptions $requestOptions = null,
    ): ReportListMdrsResponse {
        $params = [
            'id' => $id,
            'cld' => $cld,
            'cli' => $cli,
            'direction' => $direction,
            'endDate' => $endDate,
            'messageType' => $messageType,
            'profile' => $profile,
            'startDate' => $startDate,
            'status' => $status,
        ];

        return $this->listMdrsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ReportListMdrsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listMdrsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ReportListMdrsResponse {
        [$parsed, $options] = ReportListMdrsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/mdrs',
            query: $parsed,
            options: $options,
            convert: ReportListMdrsResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all Wdr records
     *
     * @param string $id WDR uuid
     * @param string $endDate End date
     * @param string $imsi International mobile subscriber identity
     * @param string $mcc Mobile country code
     * @param string $mnc Mobile network code
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $phoneNumber Phone number
     * @param string $simCardID Sim card unique identifier
     * @param string $simGroupID Sim group unique identifier
     * @param string $simGroupName Sim group name
     * @param list<string> $sort Field used to order the data. If no field is specified, default value is 'created_at'
     * @param string $startDate Start date
     *
     * @return ReportListWdrsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listWdrs(
        $id = omit,
        $endDate = omit,
        $imsi = omit,
        $mcc = omit,
        $mnc = omit,
        $page = omit,
        $phoneNumber = omit,
        $simCardID = omit,
        $simGroupID = omit,
        $simGroupName = omit,
        $sort = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): ReportListWdrsResponse {
        $params = [
            'id' => $id,
            'endDate' => $endDate,
            'imsi' => $imsi,
            'mcc' => $mcc,
            'mnc' => $mnc,
            'page' => $page,
            'phoneNumber' => $phoneNumber,
            'simCardID' => $simCardID,
            'simGroupID' => $simGroupID,
            'simGroupName' => $simGroupName,
            'sort' => $sort,
            'startDate' => $startDate,
        ];

        return $this->listWdrsRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ReportListWdrsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listWdrsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ReportListWdrsResponse {
        [$parsed, $options] = ReportListWdrsParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'reports/wdrs',
            query: $parsed,
            options: $options,
            convert: ReportListWdrsResponse::class,
        );
    }
}
