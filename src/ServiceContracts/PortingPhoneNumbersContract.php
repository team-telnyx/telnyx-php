<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Page;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PortingPhoneNumbersContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[porting_order_status]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return PortingPhoneNumberListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): PortingPhoneNumberListResponse;
}
