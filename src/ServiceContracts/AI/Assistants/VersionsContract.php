<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\Versions\VersionDeleteParams;
use Telnyx\AI\Assistants\Versions\VersionPromoteParams;
use Telnyx\AI\Assistants\Versions\VersionRetrieveParams;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface VersionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|VersionRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        array|VersionRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @param array<mixed>|VersionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        array|VersionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantsList;

    /**
     * @api
     *
     * @param array<mixed>|VersionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        array|VersionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|VersionPromoteParams $params
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        array|VersionPromoteParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;
}
