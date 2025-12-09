<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumbersRegulatoryRequirementsContract;

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
     * Retrieve regulatory requirements for a list of phone numbers
     *
     * @param array{
     *   phoneNumber?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[phone_number]
     *
     * @throws APIException
     */
    public function retrieve(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): PhoneNumbersRegulatoryRequirementGetResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
