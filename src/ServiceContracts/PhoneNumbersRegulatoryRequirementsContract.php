<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param array{
     *   phoneNumber?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse;
}
