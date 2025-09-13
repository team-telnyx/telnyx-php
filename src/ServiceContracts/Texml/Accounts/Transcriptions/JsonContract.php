<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;

interface JsonContract
{
    /**
     * @api
     *
     * @param string $accountSid
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $accountSid
     *
     * @return JsonGetRecordingTranscriptionSidJsonResponse<HasRawResponse>
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        $accountSid,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse;
}
