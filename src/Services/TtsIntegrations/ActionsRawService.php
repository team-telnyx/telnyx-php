<?php

declare(strict_types=1);

namespace Telnyx\Services\TtsIntegrations;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TtsIntegrations\ActionsRawContract;
use Telnyx\TtsIntegrations\Actions\ActionTestConnectionParams;
use Telnyx\TtsIntegrations\Actions\CommunityTtsConformanceRun;
use Telnyx\TtsIntegrations\CommunityTtsEngine;

/**
 * Register and manage text-to-speech (TTS) engines you publish, and find the public engines other organizations published, so an AI Assistant, TeXML or Call Control can speak with one of their voices, using your own key for it, instead of a Telnyx-integrated vendor.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Pause an `active` engine so it stops serving traffic, without deleting it. Owner-initiated and owner-reversible via `enable`. Only an `active` engine can be disabled. While an engine is disabled, no organization can use it, including other organizations if it is `public`.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tts_integrations/%1$s/actions/disable', $id],
            options: $requestOptions,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Resume a `disabled` engine. Only a `disabled` engine can be enabled; a `suspended` engine can only be reinstated by Telnyx.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tts_integrations/%1$s/actions/enable', $id],
            options: $requestOptions,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Make Telnyx read the engine's `voices_url` now instead of at the next scheduled read (every 15 minutes). On success the stored list is replaced and `voices_degraded` is cleared. The previous list is kept when the read fails.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tts_integrations/%1$s/actions/refresh_voices', $id],
            options: $requestOptions,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Ask Telnyx to review a `draft` engine so it can serve other organizations. Only a `draft` engine with no pending or approved review can be submitted (a rejected one can be submitted again). The engine moves to `review_status: pending`; Telnyx approves it (`status: active`, `review_status: approved`) or rejects it with `review_notes`. See the [Community TTS engines guide](/docs/voice/tts/community-engines) for the full review flow.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tts_integrations/%1$s/actions/request_review', $id],
            options: $requestOptions,
            convert: CommunityTtsEngine::class,
        );
    }

    /**
     * @api
     *
     * Check an engine end to end with your own key, without a call. Telnyx reads the voice list, connects to the engine's `websocket_url` with the Integration Secret named by `api_key_ref`, sends a short text, and checks the answer: the handshake, the credentials, the audio, the final frame and a clean close. The result is recorded (see `conformance_runs`) and returned. A test within 10 seconds of the previous one is refused with `429`, and a `suspended` engine cannot be tested. See [Try your engine before approval](/docs/voice/tts/community-engines#try-your-engine-before-approval).
     *
     * @param string $id unique identifier of the community TTS engine
     * @param array{
     *   apiKeyRef: string, voiceID?: string
     * }|ActionTestConnectionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ActionTestConnectionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['tts_integrations/%1$s/actions/test_connection', $id],
            body: (object) $parsed,
            options: $options,
            convert: CommunityTtsConformanceRun::class,
        );
    }
}
