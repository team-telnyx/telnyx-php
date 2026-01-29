<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        RequestOptions|array|null $requestOptions = null,
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $id,
        string $requirementGroupID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        $params = Util::removeNulls(['requirementGroupID' => $requirementGroupID]);

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
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        $params = Util::removeNulls(
            ['regulatoryRequirements' => $regulatoryRequirements]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRequirements($numberOrderPhoneNumberID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
