<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonDeleteRecordingTranscriptionSidJsonParams;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonRetrieveRecordingTranscriptionSidJsonParams;

interface JsonContract
{
    /**
     * @api
     *
     * @param array<mixed>|JsonDeleteRecordingTranscriptionSidJsonParams $params
     *
     * @throws APIException
     */
    public function deleteRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonDeleteRecordingTranscriptionSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|JsonRetrieveRecordingTranscriptionSidJsonParams $params
     *
     * @throws APIException
     */
    public function retrieveRecordingTranscriptionSidJson(
        string $recordingTranscriptionSid,
        array|JsonRetrieveRecordingTranscriptionSidJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): JsonGetRecordingTranscriptionSidJsonResponse;
}
