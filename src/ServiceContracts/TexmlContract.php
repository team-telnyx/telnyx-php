<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

interface TexmlContract
{
    /**
     * @api
     *
     * @param array<mixed>|TexmlSecretsParams $params
     *
     * @throws APIException
     */
    public function secrets(
        array|TexmlSecretsParams $params,
        ?RequestOptions $requestOptions = null
    ): TexmlSecretsResponse;
}
