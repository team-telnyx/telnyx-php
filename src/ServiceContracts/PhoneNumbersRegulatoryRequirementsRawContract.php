<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;

interface PhoneNumbersRegulatoryRequirementsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PhoneNumbersRegulatoryRequirementRetrieveParams $params
     *
     * @return BaseResponse<PhoneNumbersRegulatoryRequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|PhoneNumbersRegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
