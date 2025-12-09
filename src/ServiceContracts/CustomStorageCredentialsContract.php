<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialCreateParams\Backend;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Telnyx\RequestOptions;

interface CustomStorageCredentialsContract
{
    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param 'gcs'|'s3'|'azure'|Backend $backend
     * @param array<string,mixed> $configuration
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        string|Backend $backend,
        array $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialNewResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
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
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     * @param 'gcs'|'s3'|'azure'|\Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend $backend
     * @param array<string,mixed> $configuration
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        string|\Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateParams\Backend $backend,
        array $configuration,
        ?RequestOptions $requestOptions = null,
    ): CustomStorageCredentialUpdateResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control, TeXML) or Sip connection resource
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
