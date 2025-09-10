<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function retrieve(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        [
            $parsed, $options,
        ] = PhoneNumbersRegulatoryRequirementRetrieveParams::parseRequest(
            ['filter' => $filter],
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
