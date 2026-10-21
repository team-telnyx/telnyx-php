<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\TtsIntegrations;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;
use Telnyx\TtsIntegrations\CommunityTtsEngine;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refreshVoices(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestReview(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CommunityTtsEngine;

    /**
     * @api
     *
     * @param string $id unique identifier of the community TTS engine
     * @param string $apiKeyRef the identifier of the Integration Secret in your organization that Telnyx connects to the engine with, as a caller would
     * @param string $voiceID The voice to test. Default: the first voice in the engine's list. It must be in the list.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function testConnection(
        string $id,
        string $apiKeyRef,
        ?string $voiceID = null,
        RequestOptions|array|null $requestOptions = null,
    ): CommunityTtsConformanceRun;
}
