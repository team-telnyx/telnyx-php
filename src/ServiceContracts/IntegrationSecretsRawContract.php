<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\IntegrationSecrets\IntegrationSecret;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;

interface IntegrationSecretsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|IntegrationSecretCreateParams $params
     *
     * @return BaseResponse<IntegrationSecretNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IntegrationSecretCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|IntegrationSecretListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<IntegrationSecret>>
     *
     * @throws APIException
     */
    public function list(
        array|IntegrationSecretListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
