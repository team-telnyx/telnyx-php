<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRegulatoryRequirementsContract;

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
     * @param array{
     *   filter?: array{phone_number?: string}
     * }|PhoneNumbersRegulatoryRequirementRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|PhoneNumbersRegulatoryRequirementRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        [$parsed, $options] = PhoneNumbersRegulatoryRequirementRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'phone_numbers_regulatory_requirements',
            query: $parsed,
            options: $options,
            convert: PhoneNumbersRegulatoryRequirementGetResponse::class,
        );
    }
}
