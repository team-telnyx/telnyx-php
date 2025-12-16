<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementGroups\RequirementGroup;
use Telnyx\RequirementGroups\RequirementGroupCreateParams;
use Telnyx\RequirementGroups\RequirementGroupListParams;
use Telnyx\RequirementGroups\RequirementGroupUpdateParams;

interface RequirementGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RequirementGroupCreateParams $params
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function create(
        array|RequirementGroupCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to retrieve
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     * @param array<string,mixed>|RequirementGroupUpdateParams $params
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|RequirementGroupUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequirementGroupListParams $params
     *
     * @return BaseResponse<list<RequirementGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementGroupListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the requirement group to submit
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function submitForApproval(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
