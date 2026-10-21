<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TtsIntegrations\CommunityTtsEngine;
use Telnyx\TtsIntegrations\TtsIntegrationCreateParams;
use Telnyx\TtsIntegrations\TtsIntegrationGetConformanceRunsResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetDiscoverableResponse;
use Telnyx\TtsIntegrations\TtsIntegrationGetVoicesResponse;
use Telnyx\TtsIntegrations\TtsIntegrationListParams;
use Telnyx\TtsIntegrations\TtsIntegrationListResponse;
use Telnyx\TtsIntegrations\TtsIntegrationReplaceParams;
use Telnyx\TtsIntegrations\TtsIntegrationRetrieveConformanceRunsParams;
use Telnyx\TtsIntegrations\TtsIntegrationRetrieveDiscoverableParams;
use Telnyx\TtsIntegrations\TtsIntegrationUpdateParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TtsIntegrationsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TtsIntegrationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function create(
        array|TtsIntegrationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array<string,mixed>|TtsIntegrationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TtsIntegrationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TtsIntegrationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|TtsIntegrationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array<string,mixed>|TtsIntegrationReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsEngine>
     *
     * @throws APIException
     */
    public function replace(
        string $id,
        array|TtsIntegrationReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array<string,mixed>|TtsIntegrationRetrieveConformanceRunsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetConformanceRunsResponse>
     *
     * @throws APIException
     */
    public function retrieveConformanceRuns(
        string $id,
        array|TtsIntegrationRetrieveConformanceRunsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TtsIntegrationRetrieveDiscoverableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetDiscoverableResponse>
     *
     * @throws APIException
     */
    public function retrieveDiscoverable(
        array|TtsIntegrationRetrieveDiscoverableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TtsIntegrationGetVoicesResponse>
     *
     * @throws APIException
     */
    public function retrieveVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
