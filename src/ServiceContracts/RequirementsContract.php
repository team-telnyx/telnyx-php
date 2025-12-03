<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\Requirements\RequirementGetResponse;
use Telnyx\Requirements\RequirementListParams;
use Telnyx\Requirements\RequirementListResponse;

interface RequirementsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RequirementListParams $params
     *
     * @return DefaultPagination<RequirementListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|RequirementListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
