<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;

interface JsonContract
{
    /**
     * @api
     *
     * @param string $accountSid
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed;

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
    ): mixed;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return JsonGetRecordingTranscriptionSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return JsonGetRecordingTranscriptionSidJsonResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJsonRaw(
        string $recordingTranscriptionSid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse;
}
