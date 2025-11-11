<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\RequestOptions;

interface CustomStorageCredentialsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CustomStorageCredentialCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|CustomStorageCredentialCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): CustomStorageCredentialGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CustomStorageCredentialUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|CustomStorageCredentialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
