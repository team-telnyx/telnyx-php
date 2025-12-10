<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\IntegrationSecrets\IntegrationSecret;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter\Type;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IntegrationSecretsContract;

final class IntegrationSecretsService implements IntegrationSecretsContract
{
    /**
     * @api
     */
    public IntegrationSecretsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new IntegrationSecretsRawService($client);
    }

    /**
     * @api
     *
     * Create a new secret with an associated identifier that can be used to securely integrate with other services.
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
    ): IntegrationSecretNewResponse {
        $params = Util::removeNulls(
            [
                'identifier' => $identifier,
                'type' => $type,
                'token' => $token,
                'password' => $password,
                'username' => $username,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all integration secrets configured by the user.
     *
     * @param array{
     *   type?: 'bearer'|'basic'|Type
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     *
     * @return DefaultFlatPagination<IntegrationSecret>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
