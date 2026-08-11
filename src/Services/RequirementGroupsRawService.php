<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
use Telnyx\ServiceContracts\RequirementGroupsRawContract;

/**
 * Requirement Groups.
 *
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\RequirementGroups\RequirementGroupCreateParams\RegulatoryRequirement
 * @phpstan-import-type RegulatoryRequirementShape from \Telnyx\RequirementGroups\RequirementGroupUpdateParams\RegulatoryRequirement as RegulatoryRequirementShape1
 * @phpstan-import-type FilterShape from \Telnyx\RequirementGroups\RequirementGroupListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RequirementGroupsRawService implements RequirementGroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a regulatory requirement group for a country, number type, and ordering or porting action. Optional customer-reference and requirement values are retained on the created group.
     *
     * @param array{
     *   action: Action|value-of<Action>,
     *   countryCode: string,
     *   phoneNumberType: PhoneNumberType|value-of<PhoneNumberType>,
     *   customerReference?: string,
     *   regulatoryRequirements?: list<RegulatoryRequirement|RegulatoryRequirementShape>,
     * }|RequirementGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function create(
        array|RequirementGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequirementGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns the regulatory requirement group identified by `id`, including its requirement values and current approval status.
     *
     * @param string $id ID of the requirement group to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * Updates the customer reference or regulatory requirement values on the specified requirement group. The response contains the updated group.
     *
     * @param string $id ID of the requirement group
     * @param array{
     *   customerReference?: string,
     *   regulatoryRequirements?: list<RequirementGroupUpdateParams\RegulatoryRequirement|RegulatoryRequirementShape1>,
     * }|RequirementGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequirementGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequirementGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Returns regulatory requirement groups for the account. Results can be filtered by country, number type, action, approval status, and customer reference.
     *
     * @param array{filter?: Filter|FilterShape}|RequirementGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<RequirementGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RequirementGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * Deletes the regulatory requirement group identified by `id`. The response contains the deleted requirement-group representation.
     *
     * @param string $id ID of the requirement group
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * Submits the specified regulatory requirement group for approval. The response contains the requirement group with its resulting approval status.
     *
     * @param string $id ID of the requirement group to submit
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['requirement_groups/%1$s/submit_for_approval', $id],
            options: $requestOptions,
            convert: RequirementGroup::class,
        );
    }
}
