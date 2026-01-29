<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\IntegrationSecrets\IntegrationSecret;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\IntegrationSecretsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class IntegrationSecretsRawService implements IntegrationSecretsRawContract
{
    // @phpstan-ignore-next-line
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
     *   type: Type|value-of<Type>,
     *   token?: string,
     *   password?: string,
     *   username?: string,
     * }|IntegrationSecretCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IntegrationSecretNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IntegrationSecretCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegrationSecretCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|IntegrationSecretListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<IntegrationSecret>>
     *
     * @throws APIException
     */
    public function list(
        array|IntegrationSecretListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = IntegrationSecretListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'integration_secrets',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: IntegrationSecret::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an integration secret given its ID.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['integration_secrets/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
