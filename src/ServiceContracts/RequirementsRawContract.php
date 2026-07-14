<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\DocReqsRequirement;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementRetrieveParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RequirementsRawContract
{
    /**
     * @api
     *
     * @param string $id Uniquely identifies the requirement_type record
     * @param array<string,mixed>|RequirementRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RequirementGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|RequirementRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RequirementListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DocReqsRequirement>>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
