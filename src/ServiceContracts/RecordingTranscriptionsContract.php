<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RecordingTranscriptions\RecordingTranscriptionDeleteResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionGetResponse;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse;
use Telnyx\RequestOptions;

interface RecordingTranscriptionsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionGetResponse;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionListResponse;

    /**
     * @api
     */
    public function delete(
        string $recordingTranscriptionID,
        ?RequestOptions $requestOptions = null
    ): RecordingTranscriptionDeleteResponse;
}
