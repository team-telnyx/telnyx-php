<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\ActivationStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\PortabilityStatus;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember0;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter\Status\UnionMember1;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort\Value;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\RequestOptions;

interface PhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number block
     * @param list<array{
     *   endAt: string, startAt: string
     * }> $activationRanges Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     * @param array{endAt: string, startAt: string} $phoneNumberRange
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        array $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number blocks
     * @param array{
     *   activationStatus?: 'New'|'Pending'|'Conflict'|'Cancel Pending'|'Failed'|'Concurred'|'Activate RDY'|'Disconnect Pending'|'Concurrence Sent'|'Old'|'Sending'|'Active'|'Cancelled'|ActivationStatus,
     *   phoneNumber?: list<string>,
     *   portabilityStatus?: 'pending'|'confirmed'|'provisional'|PortabilityStatus,
     *   portingOrderID?: list<string>,
     *   status?: 'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|UnionMember0|list<'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|UnionMember1>,
     *   supportKey?: string|list<string>,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status]
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
    ): PhoneNumberBlockListResponse;

    /**
     * @api
     *
     * @param string $id Identifies the phone number block to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number block
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberBlockDeleteResponse;
}
