<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListResponse;

interface RequirementTypesRawContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     *
     * @return BaseResponse<RequirementTypeGetResponse>
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
     * @param array<string,mixed>|RequirementTypeListParams $params
     *
     * @return BaseResponse<RequirementTypeListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementTypeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
