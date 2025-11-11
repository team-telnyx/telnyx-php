<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams;
use Telnyx\RequirementGroups\RequirementGroupListParams;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams;
use Telnyx\ServiceContracts\RequirementGroupsContract;

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
     * @param array{
     *   action: "ordering"|"porting",
     *   country_code: string,
     *   phone_number_type: "local"|"toll_free"|"mobile"|"national"|"shared_cost",
     *   customer_reference?: string,
     *   regulatory_requirements?: list<array{
     *     field_value?: string, requirement_id?: string
     *   }>,
     * }|RequirementGroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RequirementGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup {
        [$parsed, $options] = RequirementGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   customer_reference?: string,
     *   regulatory_requirements?: list<array{
     *     field_value?: string, requirement_id?: string
     *   }>,
     * }|RequirementGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequirementGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup {
        [$parsed, $options] = RequirementGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{
     *     action?: "ordering"|"porting"|"action",
     *     country_code?: string,
     *     customer_reference?: string,
     *     phone_number_type?: "local"|"toll_free"|"mobile"|"national"|"shared_cost",
     *     status?: "approved"|"unapproved"|"pending-approval"|"declined"|"expired",
     *   },
     * }|RequirementGroupListParams $params
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array {
        [$parsed, $options] = RequirementGroupListParams::parseRequest(
            $params,
            $requestOptions,
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
