<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Filter\PortingOrder\Status;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationListResponse;
use Telnyx\PortingOrders\PhoneNumberConfigurations\PhoneNumberConfigurationNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberConfigurationsContract
{
    /**
     * @api
     *
     * @param list<array{
     *   portingPhoneNumberID: string, userBundleID: string
     * }> $phoneNumberConfigurations
     *
     * @throws APIException
     */
    public function create(
        ?array $phoneNumberConfigurations = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationNewResponse;

    /**
     * @api
     *
     * @param array{
     *   portingOrder?: array{
     *     status?: list<'activation-in-progress'|'cancel-pending'|'cancelled'|'draft'|'exception'|'foc-date-confirmed'|'in-process'|'ported'|'submitted'|Status>,
     *   },
     *   portingPhoneNumber?: list<string>,
     *   userBundleID?: list<string>,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order.status][in][], filter[porting_phone_number][in][], filter[user_bundle_id][in][]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberConfigurationListResponse;
}
