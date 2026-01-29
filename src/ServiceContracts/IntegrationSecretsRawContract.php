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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IntegrationSecretsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|IntegrationSecretCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationSecretNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IntegrationSecretCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|IntegrationSecretListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<IntegrationSecret>>
     *
     * @throws APIException
     */
    public function list(
        array|IntegrationSecretListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
