<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\TexmlSecretsParams;
use Telnyx\Texml\TexmlSecretsResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TexmlRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TexmlSecretsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlSecretsResponse>
     *
     * @throws APIException
     */
    public function secrets(
        array|TexmlSecretsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
