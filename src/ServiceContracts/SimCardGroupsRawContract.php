<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCardGroups\SimCardGroupCreateParams;
use Telnyx\SimCardGroups\SimCardGroupDeleteResponse;
use Telnyx\SimCardGroups\SimCardGroupGetResponse;
use Telnyx\SimCardGroups\SimCardGroupListParams;
use Telnyx\SimCardGroups\SimCardGroupListResponse;
use Telnyx\SimCardGroups\SimCardGroupNewResponse;
use Telnyx\SimCardGroups\SimCardGroupRetrieveParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateParams;
use Telnyx\SimCardGroups\SimCardGroupUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SimCardGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SimCardGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGroupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SimCardGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param array<string,mixed>|SimCardGroupRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGroupGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|SimCardGroupRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param array<string,mixed>|SimCardGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGroupUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SimCardGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SimCardGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SimCardGroupListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|SimCardGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM group
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SimCardGroupDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
