<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ReportsContract;
use Telnyx\Services\Reports\CdrUsageReportsService;
use Telnyx\Services\Reports\MdrUsageReportsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReportsService implements ReportsContract
{
    /**
     * @api
     */
    public ReportsRawService $raw;

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
        $this->raw = new ReportsRawService($client);
        $this->cdrUsageReports = new CdrUsageReportsService($client);
        $this->mdrUsageReports = new MdrUsageReportsService($client);
    }

    /**
     * @api
     *
     * Fetch all Mdr records
     *
     * @param string $id filter results by identifier
     * @param string $cld filter results by cld
     * @param string $cli filter results by cli
     * @param Direction|value-of<Direction> $direction filter results by direction
     * @param string $endDate Pagination end date
     * @param MessageType|value-of<MessageType> $messageType filter results by message type
     * @param string $profile filter results by profile
     * @param string $startDate Pagination start date
     * @param Status|value-of<Status> $status filter results by status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listMdrs(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        Direction|string|null $direction = null,
        ?string $endDate = null,
        MessageType|string|null $messageType = null,
        ?string $profile = null,
        ?string $startDate = null,
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): ReportListMdrsResponse {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'cld' => $cld,
                'cli' => $cli,
                'direction' => $direction,
                'endDate' => $endDate,
                'messageType' => $messageType,
                'profile' => $profile,
                'startDate' => $startDate,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listMdrs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch all Wdr records
     *
     * @param string $id filter results by identifier
     * @param string $endDate End date
     * @param string $imsi filter results by imsi
     * @param string $mcc filter results by mcc
     * @param string $mnc filter results by mnc
     * @param string $phoneNumber filter results by phone number
     * @param string $simCardID filter results by sim card id
     * @param string $simGroupID filter results by sim group id
     * @param string $simGroupName filter results by sim group name
     * @param list<string> $sort field and direction to sort the results by
     * @param string $startDate Start date
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ReportListWdrsResponse>
     *
     * @throws APIException
     */
    public function listWdrs(
        ?string $id = null,
        ?string $endDate = null,
        ?string $imsi = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $phoneNumber = null,
        ?string $simCardID = null,
        ?string $simGroupID = null,
        ?string $simGroupName = null,
        array $sort = ['created_at'],
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'endDate' => $endDate,
                'imsi' => $imsi,
                'mcc' => $mcc,
                'mnc' => $mnc,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'phoneNumber' => $phoneNumber,
                'simCardID' => $simCardID,
                'simGroupID' => $simGroupID,
                'simGroupName' => $simGroupName,
                'sort' => $sort,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listWdrs(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
