<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface RegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action]
     *
     * @return RegulatoryRequirementGetResponse<HasRawResponse>
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): RegulatoryRequirementGetResponse;
}
