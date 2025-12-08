<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingResponseData\Channels;
use Telnyx\Recordings\RecordingResponseData\DownloadURLs;
use Telnyx\Recordings\RecordingResponseData\RecordType;
use Telnyx\Recordings\RecordingResponseData\Source;
use Telnyx\Recordings\RecordingResponseData\Status;

/**
 * @phpstan-type RecordingListResponseShape = array{
 *   data?: list<RecordingResponseData>|null, meta?: PaginationMeta|null
 * }
 */
final class RecordingListResponse implements BaseModel
{
    /** @use SdkModel<RecordingListResponseShape> */
    use SdkModel;

    /** @var list<RecordingResponseData>|null $data */
    #[Optional(list: RecordingResponseData::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RecordingResponseData|array{
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
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<RecordingResponseData|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
