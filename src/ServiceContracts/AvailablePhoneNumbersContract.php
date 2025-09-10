<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListParams\Filter;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AvailablePhoneNumbersContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[locality], filter[administrative_area], filter[country_code], filter[national_destination_code], filter[rate_center], filter[phone_number_type], filter[features], filter[limit], filter[best_effort], filter[quickship], filter[reservable], filter[exclude_held_numbers]
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): AvailablePhoneNumberListResponse;
}
