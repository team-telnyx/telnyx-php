<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RecordingTranscriptionsRawContract
{
    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingTranscriptionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingTranscriptionListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordingTranscriptionID uniquely identifies the recording transcription by id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingTranscriptionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $recordingTranscriptionID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
