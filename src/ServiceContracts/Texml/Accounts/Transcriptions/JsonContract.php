<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JsonContract
{
    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): JsonGetRecordingTranscriptionSidJsonResponse;
}
