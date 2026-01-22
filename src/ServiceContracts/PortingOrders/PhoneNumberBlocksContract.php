<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockNewResponse;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\ActivationRange
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockCreateParams\PhoneNumberRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PhoneNumberBlockListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberBlocksContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number block
     * @param list<ActivationRange|ActivationRangeShape> $activationRanges Specifies the activation ranges for this porting phone number block. The activation range must be within the block range and should not overlap with other activation ranges.
     * @param PhoneNumberRange|PhoneNumberRangeShape $phoneNumberRange
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        PhoneNumberRange|array $phoneNumberRange,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberBlockNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number blocks
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_id], filter[support_key], filter[status], filter[phone_number], filter[activation_status], filter[portability_status]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingPhoneNumberBlock>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id Identifies the phone number block to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number block
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberBlockDeleteResponse;
}
