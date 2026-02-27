<?php

declare(strict_types=1);

namespace Telnyx\Services\Texml\Accounts\Transcriptions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Texml\Accounts\Transcriptions\JsonContract;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;

/**
 * TeXML REST Commands.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class JsonService implements JsonContract
{
    /**
     * @api
     */
    public JsonRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new JsonRawService($client);
    }

    /**
     * @api
     *
     * Permanently deletes a recording transcription.
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteRecordingTranscriptionSidJson($recordingTranscriptionSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the recording transcription resource identified by its ID.
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param string $accountSid the id of the account the resource belongs to
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        string $accountSid,
        RequestOptions|array|null $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse {
        $params = Util::removeNulls(['accountSid' => $accountSid]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveRecordingTranscriptionSidJson($recordingTranscriptionSid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
