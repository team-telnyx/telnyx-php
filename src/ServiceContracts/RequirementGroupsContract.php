<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams;
use Telnyx\RequirementGroups\RequirementGroupListParams;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams;

interface RequirementGroupsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RequirementGroupCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|RequirementGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @param array<mixed>|RequirementGroupUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequirementGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementGroup;

    /**
     * @api
     *
     * @param array<mixed>|RequirementGroupListParams $params
     *
     * @return list<RequirementGroup>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;

    /**
     * @api
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGroup;
}
