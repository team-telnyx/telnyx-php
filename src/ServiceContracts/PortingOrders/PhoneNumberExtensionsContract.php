<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberExtensionsContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param list<array{
     *   endAt: int, startAt: int
     * }> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param array{endAt: int, startAt: int} $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        array $extensionRange,
        string $portingPhoneNumberID,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extensions
     * @param array{
     *   portingPhoneNumberID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: '-created_at'|'created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse;

    /**
     * @api
     *
     * @param string $id Identifies the phone number extension to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberExtensionDeleteResponse;
}
