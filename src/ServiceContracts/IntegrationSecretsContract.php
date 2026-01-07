<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\IntegrationSecrets\IntegrationSecret;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type;
use Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter;
use Telnyx\IntegrationSecrets\IntegrationSecretNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IntegrationSecretsContract
{
    /**
     * @api
     *
     * @param string $identifier the unique identifier of the secret
     * @param Type|value-of<Type> $type the type of secret
     * @param string $token The token for the secret. Required for bearer type secrets, ignored otherwise.
     * @param string $password The password for the secret. Required for basic type secrets, ignored otherwise.
     * @param string $username The username for the secret. Required for basic type secrets, ignored otherwise.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $identifier,
        Type|string $type,
        ?string $token = null,
        ?string $password = null,
        ?string $username = null,
        RequestOptions|array|null $requestOptions = null,
    ): IntegrationSecretNewResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<IntegrationSecret>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
