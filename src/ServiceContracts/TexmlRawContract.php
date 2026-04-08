<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\TexmlInitiateAICallParams;
use Telnyx\Texml\TexmlInitiateAICallResponse;
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
     * @param string $connectionID the ID of the TeXML connection to use for the call
     * @param array<string,mixed>|TexmlInitiateAICallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlInitiateAICallResponse>
     *
     * @throws APIException
     */
    public function initiateAICall(
        string $connectionID,
        array|TexmlInitiateAICallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
