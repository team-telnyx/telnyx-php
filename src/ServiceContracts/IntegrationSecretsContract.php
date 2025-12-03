<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\IntegrationSecrets\IntegrationSecret;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;

interface IntegrationSecretsContract
{
    /**
     * @api
     *
     * @param array<mixed>|IntegrationSecretCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IntegrationSecretCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|IntegrationSecretListParams $params
     *
     * @return DefaultFlatPagination<IntegrationSecret>
     *
     * @throws APIException
     */
    public function list(
        array|IntegrationSecretListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
