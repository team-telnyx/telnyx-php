<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enum\EnumRetrieveParams\Endpoint;
use Telnyx\RequestOptions;

interface EnumRawContract
{
    /**
     * @api
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return BaseResponse<mixed|list<mixed|string>>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
