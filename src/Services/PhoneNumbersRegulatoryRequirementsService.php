<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRegulatoryRequirementsContract;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumbersRegulatoryRequirementsService implements PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve regulatory requirements for a list of phone numbers
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     *
     * @return PhoneNumbersRegulatoryRequirementGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        $params = ['filter' => $filter];

        return $this->retrieveRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumbersRegulatoryRequirementGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        [
            $parsed, $options,
        ] = PhoneNumbersRegulatoryRequirementRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers_regulatory_requirements',
            query: $parsed,
            options: $options,
            convert: PhoneNumbersRegulatoryRequirementGetResponse::class,
        );
    }
}
