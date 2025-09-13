<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PhoneNumberExtensionsContract
{
    /**
     * @api
     *
     * @param list<ActivationRange> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param ExtensionRange $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     *
     * @return PhoneNumberExtensionNewResponse<HasRawResponse>
     */
    public function create(
        string $portingOrderID,
        $activationRanges,
        $extensionRange,
        $portingPhoneNumberID,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return PhoneNumberExtensionListResponse<HasRawResponse>
     */
    public function list(
        string $portingOrderID,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse;

    /**
     * @api
     *
     * @param string $portingOrderID
     *
     * @return PhoneNumberExtensionDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        $portingOrderID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberExtensionDeleteResponse;
}
