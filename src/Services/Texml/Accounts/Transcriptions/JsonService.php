<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Transcriptions;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
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
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [
            $parsed, $options,
        ] = JsonDeleteRecordingTranscriptionSidJsonParams::parseRequest(
            ['accountSid' => $accountSid],
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
     * @return JsonGetRecordingTranscriptionSidJsonResponse<HasRawResponse>
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse {
        [
            $parsed, $options,
        ] = JsonRetrieveRecordingTranscriptionSidJsonParams::parseRequest(
            ['accountSid' => $accountSid],
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
