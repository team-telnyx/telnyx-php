<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListResponse;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IntegrationSecretsContract;

final class IntegrationSecretsService implements IntegrationSecretsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new secret with an associated identifier that can be used to securely integrate with other services.
     *
     * @param array{
     *   identifier: string,
     *   type: 'bearer'|'basic',
     *   token?: string,
     *   password?: string,
     *   username?: string,
     * }|IntegrationSecretCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|IntegrationSecretCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretNewResponse {
        [$parsed, $options] = IntegrationSecretCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'integration_secrets',
            body: (object) $parsed,
            options: $options,
            convert: IntegrationSecretNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all integration secrets configured by the user.
     *
     * @param array{
     *   filter?: array{type?: 'bearer'|'basic'},
     *   page?: array{number?: int, size?: int},
     * }|IntegrationSecretListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|IntegrationSecretListParams $params,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretListResponse {
        [$parsed, $options] = IntegrationSecretListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'integration_secrets',
            query: $parsed,
            options: $options,
            convert: IntegrationSecretListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an integration secret given its ID.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['integration_secrets/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
