<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse;
}
