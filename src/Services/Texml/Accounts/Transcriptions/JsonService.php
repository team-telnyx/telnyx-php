<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Transcriptions;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Transcriptions\JsonContract;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonDeleteRecordingTranscriptionSidJsonParams;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonRetrieveRecordingTranscriptionSidJsonParams;

final class JsonService implements JsonContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param array{
     *   account_sid: string
     * }|JsonDeleteRecordingTranscriptionSidJsonParams $params
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonDeleteRecordingTranscriptionSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = JsonDeleteRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'texml/Accounts/%1$s/Transcriptions/%2$s.json',
                $accountSid,
                $recordingTranscriptionSid,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the recording transcription resource identified by its ID.
     *
     * @param array{
     *   account_sid: string
     * }|JsonRetrieveRecordingTranscriptionSidJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonRetrieveRecordingTranscriptionSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse {
        [$parsed, $options] = JsonRetrieveRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['account_sid'];
        unset($parsed['account_sid']);

        /** @var BaseResponse<JsonGetRecordingTranscriptionSidJsonResponse> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Transcriptions/%2$s.json',
                $accountSid,
                $recordingTranscriptionSid,
            ],
            options: $options,
            convert: JsonGetRecordingTranscriptionSidJsonResponse::class,
        );

        return $response->parse();
    }
}
