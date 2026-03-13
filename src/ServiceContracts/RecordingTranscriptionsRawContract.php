<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RecordingTranscriptions\RecordingTranscription;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListParams;
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
     * @param array<string,mixed>|RecordingTranscriptionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RecordingTranscription>>
     *
     * @throws APIException
     */
    public function list(
        array|RecordingTranscriptionListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
