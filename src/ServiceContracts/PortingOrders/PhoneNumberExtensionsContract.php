<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ActivationRange
 * @phpstan-import-type ExtensionRangeShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams\ExtensionRange
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberExtensionsContract
{
    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param list<ActivationRange|ActivationRangeShape> $activationRanges Specifies the activation ranges for this porting phone number extension. The activation range must be within the extension range and should not overlap with other activation ranges.
     * @param ExtensionRange|ExtensionRangeShape $extensionRange
     * @param string $portingPhoneNumberID identifies the porting phone number associated with this porting phone number extension
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array $activationRanges,
        ExtensionRange|array $extensionRange,
        string $portingPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberExtensionNewResponse;

    /**
     * @api
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extensions
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_phone_number_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PortingPhoneNumberExtension>
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
     * @param string $id Identifies the phone number extension to be deleted
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number extension
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $portingOrderID,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberExtensionDeleteResponse;
}
