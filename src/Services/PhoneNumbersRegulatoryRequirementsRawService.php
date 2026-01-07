<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRegulatoryRequirementsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersRegulatoryRequirementsRawService implements PhoneNumbersRegulatoryRequirementsRawContract
{
    // @phpstan-ignore-next-line
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
     *   filter?: Filter|FilterShape
     * }|PhoneNumbersRegulatoryRequirementRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumbersRegulatoryRequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|PhoneNumbersRegulatoryRequirementRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
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
