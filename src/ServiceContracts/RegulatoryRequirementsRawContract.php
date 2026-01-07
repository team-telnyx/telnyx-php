<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RegulatoryRequirementsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RegulatoryRequirementRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RegulatoryRequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|RegulatoryRequirementRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
