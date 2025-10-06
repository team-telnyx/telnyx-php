<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\Action;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\PhoneNumberType;
use Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement;
use Telnyx\RequirementGroups\RequirementGroupListParams;
use Telnyx\RequirementGroups\RequirementGroupListParams\Filter;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams;
use Telnyx\ServiceContracts\RequirementGroupsContract;

use const Telnyx\Core\OMIT as omit;

final class RequirementGroupsService implements RequirementGroupsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new requirement group
     *
     * @param Action|value-of<Action> $action
     * @param string $countryCode ISO alpha 2 country code
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param string $customerReference
     * @param list<RegulatoryRequirement> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function create(
        $action,
        $countryCode,
        $phoneNumberType,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup {
        $params = [
            'action' => $action,
            'countryCode' => $countryCode,
            'phoneNumberType' => $phoneNumberType,
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        [$parsed, $options] = RequirementGroupCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'requirement_groups',
            body: (object) $parsed,
            options: $options,
            convert: RequirementGroup::class,
        );
    }

    /**
     * @api
     *
     * Get a single requirement group by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['requirement_groups/%1$s', $id],
            options: $requestOptions,
            convert: RequirementGroup::class,
        );
    }

    /**
     * @api
     *
     * Update requirement values in requirement group
     *
     * @param string $customerReference Reference for the customer
     * @param list<RequirementGroupUpdateParams\RegulatoryRequirement> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup {
        $params = [
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        [$parsed, $options] = RequirementGroupUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['requirement_groups/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: RequirementGroup::class,
        );
    }

    /**
     * @api
     *
     * List requirement groups
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[country_code], filter[phone_number_type], filter[action], filter[status], filter[customer_reference]
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): array {
        $params = ['filter' => $filter];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = RequirementGroupListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'requirement_groups',
            query: $parsed,
            options: $options,
            convert: new ListOf(RequirementGroup::class),
        );
    }

    /**
     * @api
     *
     * Delete a requirement group by ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['requirement_groups/%1$s', $id],
            options: $requestOptions,
            convert: RequirementGroup::class,
        );
    }

    /**
     * @api
     *
     * Submit a Requirement Group for Approval
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['requirement_groups/%1$s/submit_for_approval', $id],
            options: $requestOptions,
            convert: RequirementGroup::class,
        );
    }
}
