<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param list<ActivationRange> $activationRanges Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     * @param PhoneNumberRange $phoneNumberRange
     *
     * @return PhoneNumberBlockNewResponse<HasRawResponse>
     */
    public function create(
        string $portingOrderID,
        $activationRanges,
        $phoneNumberRange,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockNewResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return PhoneNumberBlockListResponse<HasRawResponse>
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberBlockListResponse;

    /**
     * @api
     *
     * @param string $portingOrderID
     *
     * @return PhoneNumberBlockDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberBlockDeleteResponse;
}
