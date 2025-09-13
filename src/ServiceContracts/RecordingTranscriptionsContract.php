<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;

interface RecordingTranscriptionsContract
{
    /**
     * @api
     *
     * @return RecordingTranscriptionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionListResponse<HasRawResponse>
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse;

    /**
     * @api
     *
     * @return RecordingTranscriptionDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse;
}
