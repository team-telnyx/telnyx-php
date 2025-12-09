<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

interface TexmlRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|TexmlSecretsParams $params
     *
     * @return BaseResponse<TexmlSecretsResponse>
     *
     * @throws APIException
     */
    public function secrets(
        array|TexmlSecretsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
