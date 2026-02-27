<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Transcriptions;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Transcriptions\JsonRawContract;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonDeleteRecordingTranscriptionSidJsonParams;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonRetrieveRecordingTranscriptionSidJsonParams;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JsonRawService implements JsonRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param array{
     *   accountSid: string
     * }|JsonDeleteRecordingTranscriptionSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonDeleteRecordingTranscriptionSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JsonDeleteRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
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
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param array{
     *   accountSid: string
     * }|JsonRetrieveRecordingTranscriptionSidJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<JsonGetRecordingTranscriptionSidJsonResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonRetrieveRecordingTranscriptionSidJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = JsonRetrieveRecordingTranscriptionSidJsonParams::parseRequest(
            $params,
            $requestOptions,
        );
        $accountSid = $parsed['accountSid'];
        unset($parsed['accountSid']);

        // @phpstan-ignore-next-line return.type
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
