<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TtsIntegrations;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TtsIntegrations\Actions\ActionTestConnectionParams;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;
use Telnyx\TtsIntegrations\CommunityTtsEngine;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
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
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
    public function enable(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
    public function refreshVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
    public function requestReview(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array<string,mixed>|ActionTestConnectionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CommunityTtsConformanceRun>
     *
     * @throws APIException
     */
    public function testConnection(
        string $id,
        array|ActionTestConnectionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
