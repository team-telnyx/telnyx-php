<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\Versions\VersionDeleteParams;
use Telnyx\AI\Assistants\Versions\VersionPromoteParams;
use Telnyx\AI\Assistants\Versions\VersionRetrieveParams;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface VersionsRawContract
{
    /**
     * @api
     *
     * @param string $versionID Path param
     * @param array<string,mixed>|VersionRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        array|VersionRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $versionID Path param
     * @param array<string,mixed>|VersionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        array|VersionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VersionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        array|VersionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|VersionPromoteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        array|VersionPromoteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
