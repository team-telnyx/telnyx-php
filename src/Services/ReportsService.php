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
     * @param string $id Message uuid
     * @param string $cld Destination number
     * @param string $cli Origination number
     * @param Direction|value-of<Direction> $direction Direction (inbound or outbound)
     * @param string $endDate Pagination end date
     * @param MessageType|value-of<MessageType> $messageType Type of message
     * @param string $profile Name of the profile
     * @param string $startDate Pagination start date
     * @param Status|value-of<Status> $status Message status
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
     * @param string $id WDR uuid
     * @param string $endDate End date
     * @param string $imsi International mobile subscriber identity
     * @param string $mcc Mobile country code
     * @param string $mnc Mobile network code
     * @param string $phoneNumber Phone number
     * @param string $simCardID Sim card unique identifier
     * @param string $simGroupID Sim group unique identifier
     * @param string $simGroupName Sim group name
     * @param list<string> $sort Field used to order the data. If no field is specified, default value is 'created_at'
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
