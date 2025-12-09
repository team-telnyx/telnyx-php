<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListResponse;

interface RequirementsRawContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     *
     * @return BaseResponse<RequirementGetResponse>
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
     * @param array<mixed>|RequirementListParams $params
     *
     * @return BaseResponse<RequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
