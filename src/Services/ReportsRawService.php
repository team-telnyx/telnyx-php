<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reports\ReportListMdrsParams;
use Telnyx\Reports\ReportListMdrsParams\Direction;
use Telnyx\Reports\ReportListMdrsParams\MessageType;
use Telnyx\Reports\ReportListMdrsParams\Status;
use Telnyx\Reports\ReportListMdrsResponse;
use Telnyx\Reports\ReportListWdrsParams;
use Telnyx\Reports\ReportListWdrsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ReportsRawContract;

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
     * Fetch all Mdr records
     *
     * @param array{
     *   id?: string,
     *   cld?: string,
     *   cli?: string,
     *   direction?: 'INBOUND'|'OUTBOUND'|Direction,
     *   endDate?: string,
     *   messageType?: 'SMS'|'MMS'|MessageType,
     *   profile?: string,
     *   startDate?: string,
     *   status?: value-of<Status>,
     * }|ReportListMdrsParams $params
     *
     * @return BaseResponse<ReportListMdrsResponse>
     *
     * @throws APIException
     */
    public function listMdrs(
        array|ReportListMdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ReportListMdrsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'reports/mdrs',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'messageType' => 'message_type',
                    'startDate' => 'start_date',
                ],
            ),
            options: $options,
            convert: ReportListMdrsResponse::class,
        );
    }

    /**
     * @api
     *
     * Fetch all Wdr records
     *
     * @param array{
     *   id?: string,
     *   endDate?: string,
     *   imsi?: string,
     *   mcc?: string,
     *   mnc?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   phoneNumber?: string,
     *   simCardID?: string,
     *   simGroupID?: string,
     *   simGroupName?: string,
     *   sort?: list<string>,
     *   startDate?: string,
     * }|ReportListWdrsParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<ReportListWdrsResponse>>
     *
     * @throws APIException
     */
    public function listWdrs(
        array|ReportListWdrsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ReportListWdrsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'reports/wdrs',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'phoneNumber' => 'phone_number',
                    'simCardID' => 'sim_card_id',
                    'simGroupID' => 'sim_group_id',
                    'simGroupName' => 'sim_group_name',
                    'startDate' => 'start_date',
                ],
            ),
            options: $options,
            convert: ReportListWdrsResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
