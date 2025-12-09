<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;
use Telnyx\RequestOptions;

interface RegulatoryRequirementsContract
{
    /**
     * @api
     *
     * @param array{
     *   action?: 'ordering'|'porting'|'action'|Action,
     *   countryCode?: string,
     *   phoneNumber?: string,
     *   phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *   requirementGroupID?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number], filter[requirement_group_id], filter[country_code], filter[phone_number_type], filter[action]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): RegulatoryRequirementGetResponse;
}
