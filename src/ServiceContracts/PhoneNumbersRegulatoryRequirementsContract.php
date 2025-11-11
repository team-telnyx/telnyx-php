<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;

interface PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PhoneNumbersRegulatoryRequirementRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|PhoneNumbersRegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumbersRegulatoryRequirementGetResponse;
}
