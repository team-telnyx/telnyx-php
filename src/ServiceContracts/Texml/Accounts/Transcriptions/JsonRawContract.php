<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Texml\Accounts\Transcriptions;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonDeleteRecordingTranscriptionSidJsonParams;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonGetRecordingTranscriptionSidJsonResponse;
use Telnyx\Texml\Accounts\Transcriptions\Json\JsonRetrieveRecordingTranscriptionSidJsonParams;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface JsonRawContract
{
    /**
     * @api
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param array<string,mixed>|JsonDeleteRecordingTranscriptionSidJsonParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordingTranscriptionSid uniquely identifies the recording transcription by id
     * @param array<string,mixed>|JsonRetrieveRecordingTranscriptionSidJsonParams $params
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
    ): BaseResponse;
}
