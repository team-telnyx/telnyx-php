<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Recordings\RecordingResponseData\Channels;
use Telnyx\Recordings\RecordingResponseData\DownloadURLs;
use Telnyx\Recordings\RecordingResponseData\RecordType;
use Telnyx\Recordings\RecordingResponseData\Source;
use Telnyx\Recordings\RecordingResponseData\Status;

/**
 * @phpstan-type RecordingGetResponseShape = array{
 *   data?: RecordingResponseData|null
 * }
 */
final class RecordingGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RecordingGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?RecordingResponseData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordingResponseData|array{
     *   id?: string|null,
     *   call_control_id?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   channels?: value-of<Channels>|null,
     *   conference_id?: string|null,
     *   created_at?: string|null,
     *   download_urls?: DownloadURLs|null,
     *   duration_millis?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   recording_ended_at?: string|null,
     *   recording_started_at?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(RecordingResponseData|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RecordingResponseData|array{
     *   id?: string|null,
     *   call_control_id?: string|null,
     *   call_leg_id?: string|null,
     *   call_session_id?: string|null,
     *   channels?: value-of<Channels>|null,
     *   conference_id?: string|null,
     *   created_at?: string|null,
     *   download_urls?: DownloadURLs|null,
     *   duration_millis?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   recording_ended_at?: string|null,
     *   recording_started_at?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(RecordingResponseData|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
