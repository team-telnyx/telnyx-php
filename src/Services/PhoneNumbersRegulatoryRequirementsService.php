<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRegulatoryRequirementsContract;

/**
 * Regulatory Requirements.
 *
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumbersRegulatoryRequirementsService implements PhoneNumbersRegulatoryRequirementsContract
{
    /**
     * @api
     */
    public PhoneNumbersRegulatoryRequirementsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumbersRegulatoryRequirementsRawService($client);
    }

    /**
     * @api
     *
     * Returns the regulatory requirements that apply to the supplied comma-separated phone numbers. The response includes the matching requirement records and pagination metadata.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        $params = array_filter(
            ['filter' => $filter ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
