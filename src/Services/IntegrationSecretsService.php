<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Page;
use Telnyx\IntegrationSecrets\IntegrationSecretListResponse;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IntegrationSecretsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $identifier the unique identifier of the secret
     * @param Type|value-of<Type> $type the type of secret
     * @param string $token The token for the secret. Required for bearer type secrets, ignored otherwise.
     * @param string $password The password for the secret. Required for basic type secrets, ignored otherwise.
     * @param string $username The username for the secret. Required for basic type secrets, ignored otherwise.
     */
    public function create(
        $identifier,
        $type,
        $token = omit,
        $password = omit,
        $username = omit,
        ?RequestOptions $requestOptions = null,
    ): IntegrationSecretNewResponse {
        [$parsed, $options] = IntegrationSecretCreateParams::parseRequest(
            [
                'identifier' => $identifier,
                'type' => $type,
                'token' => $token,
                'password' => $password,
                'username' => $username,
            ],
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): IntegrationSecretListResponse {
        [$parsed, $options] = IntegrationSecretListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
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
