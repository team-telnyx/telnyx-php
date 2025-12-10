<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsContract;

final class RegulatoryRequirementsService implements RegulatoryRequirementsContract
{
    /**
     * @api
     */
    public RegulatoryRequirementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RegulatoryRequirementsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve regulatory requirements
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
    ): RegulatoryRequirementGetResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
