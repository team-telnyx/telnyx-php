<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumbersRegulatoryRequirementGetResponse;
}
