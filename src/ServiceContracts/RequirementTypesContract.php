<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\RequirementTypes\RequirementTypeGetResponse;
use Telnyx\RequirementTypes\RequirementTypeListParams;
use Telnyx\RequirementTypes\RequirementTypeListResponse;

interface RequirementTypesContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): RequirementTypeGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|RequirementTypeListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|RequirementTypeListParams $params,
        ?RequestOptions $requestOptions = null,
    ): RequirementTypeListResponse;
}
