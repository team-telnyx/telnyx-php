<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\Action;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementRetrieveParams\Filter\PhoneNumberType;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\RegulatoryRequirementsContract;

final class RegulatoryRequirementsService implements RegulatoryRequirementsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve regulatory requirements
     *
     * @param array{
     *   filter?: array{
     *     action?: 'ordering'|'porting'|'action'|Action,
     *     countryCode?: string,
     *     phoneNumber?: string,
     *     phoneNumberType?: 'local'|'toll_free'|'mobile'|'national'|'shared_cost'|PhoneNumberType,
     *     requirementGroupID?: string,
     *   },
     * }|RegulatoryRequirementRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|RegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): RegulatoryRequirementGetResponse {
        [$parsed, $options] = RegulatoryRequirementRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<RegulatoryRequirementGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'regulatory_requirements',
            query: $parsed,
            options: $options,
            convert: RegulatoryRequirementGetResponse::class,
        );

        return $response->parse();
    }
}
