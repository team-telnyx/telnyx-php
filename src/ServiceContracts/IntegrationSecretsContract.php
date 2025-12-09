<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter\Type;
use Telnyx\IntegrationSecrets\IntegrationSecretListResponse;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;

interface IntegrationSecretsContract
{
    /**
     * @api
     *
     * @param string $identifier the unique identifier of the secret
     * @param 'bearer'|'basic'|\Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type $type the type of secret
     * @param string $token The token for the secret. Required for bearer type secrets, ignored otherwise.
     * @param string $password The password for the secret. Required for basic type secrets, ignored otherwise.
     * @param string $username The username for the secret. Required for basic type secrets, ignored otherwise.
     *
     * @throws APIException
     */
    public function create(
        string $identifier,
        string|\Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type $type,
        ?string $token = null,
        ?string $password = null,
        ?string $username = null,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretNewResponse;

    /**
     * @api
     *
     * @param array{
     *   type?: 'bearer'|'basic'|Type
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretListResponse;

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
