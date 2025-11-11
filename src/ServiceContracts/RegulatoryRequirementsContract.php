<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;

interface RegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RegulatoryRequirementRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|RegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): RegulatoryRequirementGetResponse;
}
