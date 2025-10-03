<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Transcriptions;

use Telnyx\Client;
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
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = ['accountSid' => $accountSid];

        return $this->deleteRecordingTranscriptionSidJsonRaw(
            $recordingTranscriptionSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJsonRaw(
        string $recordingTranscriptionSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [
            $parsed, $options,
        ] = JsonDeleteRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'texml/Accounts/%1$s/Transcriptions/%2$s.json',
                $accountSid,
                $recordingTranscriptionSid,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the recording transcription resource identified by its ID.
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse {
        $params = ['accountSid' => $accountSid];

        return $this->retrieveRecordingTranscriptionSidJsonRaw(
            $recordingTranscriptionSid,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJsonRaw(
        string $recordingTranscriptionSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse {
        [
            $parsed, $options,
        ] = JsonRetrieveRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'texml/Accounts/%1$s/Transcriptions/%2$s.json',
                $accountSid,
                $recordingTranscriptionSid,
            ],
            options: $options,
            convert: JsonGetRecordingTranscriptionSidJsonResponse::class,
        );
    }
}
