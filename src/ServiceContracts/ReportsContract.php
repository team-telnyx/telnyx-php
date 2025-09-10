<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams\Page;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ReportsContract
{
    /**
     * @api
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
    ): ReportListMdrsResponse;

    /**
     * @api
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
    ): ReportListWdrsResponse;
}
