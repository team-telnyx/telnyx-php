<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersContract;

final class NumberOrderPhoneNumbersService implements NumberOrderPhoneNumbersContract
{
    /**
     * @api
     */
    public NumberOrderPhoneNumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberOrderPhoneNumbersRawService($client);
    }

    /**
     * @api
     *
     * Get an existing phone number in number order.
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($numberOrderPhoneNumberID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of phone numbers associated to orders.
     *
     * @param array{
     *   countryCode?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse {
        $params = ['filter' => $filter];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update requirement group for a phone number order
     *
     * @param string $id The unique identifier of the number order phone number
     * @param string $requirementGroupID The ID of the requirement group to associate
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        $params = ['requirementGroupID' => $requirementGroupID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRequirementGroup($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates requirements for a single phone number within a number order.
     *
     * @param string $numberOrderPhoneNumberID the number order phone number ID
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        $params = ['regulatoryRequirements' => $regulatoryRequirements];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRequirements($numberOrderPhoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
