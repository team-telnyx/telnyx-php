<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param string $id Message uuid
     * @param string $cld Destination number
     * @param string $cli Origination number
     * @param 'INBOUND'|'OUTBOUND'|Direction $direction Direction (inbound or outbound)
     * @param string $endDate Pagination end date
     * @param 'SMS'|'MMS'|MessageType $messageType Type of message
     * @param string $profile Name of the profile
     * @param string $startDate Pagination start date
     * @param 'GW_TIMEOUT'|'DELIVERED'|'DLR_UNCONFIRMED'|'DLR_TIMEOUT'|'RECEIVED'|'GW_REJECT'|'FAILED'|Status $status Message status
     *
     * @throws APIException
     */
    public function listMdrs(
        ?string $id = null,
        ?string $cld = null,
        ?string $cli = null,
        string|Direction|null $direction = null,
        ?string $endDate = null,
        string|MessageType|null $messageType = null,
        ?string $profile = null,
        ?string $startDate = null,
        string|Status|null $status = null,
        ?RequestOptions $requestOptions = null,
    ): ReportListMdrsResponse;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
