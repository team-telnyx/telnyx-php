<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberGetResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListParams\Filter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberListResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsParams;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementsResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrderPhoneNumbersContract;

use const Telnyx\Core\OMIT as omit;

final class NumberOrderPhoneNumbersService implements NumberOrderPhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get an existing phone number in number order.
     */
    public function retrieve(
        string $numberOrderPhoneNumberID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            options: $requestOptions,
            convert: NumberOrderPhoneNumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a list of phone numbers associated to orders.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code]
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberListResponse {
        [$parsed, $options] = NumberOrderPhoneNumberListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'number_order_phone_numbers',
            query: $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Update requirement group for a phone number order
     *
     * @param string $requirementGroupID The ID of the requirement group to associate
     */
    public function updateRequirementGroup(
        string $id,
        $requirementGroupID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderPhoneNumberUpdateRequirementGroupResponse {
        [
            $parsed, $options,
        ] = NumberOrderPhoneNumberUpdateRequirementGroupParams::parseRequest(
            ['requirementGroupID' => $requirementGroupID],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['number_order_phone_numbers/%1$s/requirement_group', $id],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates requirements for a single phone number within a number order.
     *
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     */
    public function updateRequirements(
        string $numberOrderPhoneNumberID,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderPhoneNumberUpdateRequirementsResponse {
        [
            $parsed, $options,
        ] = NumberOrderPhoneNumberUpdateRequirementsParams::parseRequest(
            ['regulatoryRequirements' => $regulatoryRequirements],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['number_order_phone_numbers/%1$s', $numberOrderPhoneNumberID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderPhoneNumberUpdateRequirementsResponse::class,
        );
    }
}
