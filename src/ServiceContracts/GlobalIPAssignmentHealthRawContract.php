<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface GlobalIPAssignmentHealthRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|GlobalIPAssignmentHealthRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPAssignmentHealthGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPAssignmentHealthRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
