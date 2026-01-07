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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequirementGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RequirementGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGroup>
     *
     * @throws APIException
     */
    public function create(
        array|RequirementGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id ID of the requirement group
     * @param array<string,mixed>|RequirementGroupUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequirementGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<RequirementGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
