<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\MeetingSessions\MeetingSessionGetRecordingsResponse\Data
 * @phpstan-import-type MeetingSessionRecordingExportShape from \Telnyx\MeetingSessions\MeetingSessionRecordingExport
 *
 * @phpstan-type MeetingSessionGetRecordingsResponseShape = array{
 *   data: list<Data|DataShape>,
 *   recordingExport?: null|MeetingSessionRecordingExport|MeetingSessionRecordingExportShape,
 * }
 */
final class MeetingSessionGetRecordingsResponse implements BaseModel
{
    /** @use SdkModel<MeetingSessionGetRecordingsResponseShape> */
    use SdkModel;

    /**
     * Temporary download URLs for recordings held by the Meeting service, including Zoom and existing Google Meet and Teams recordings. Empty for customer Storage exports; use recording_export instead. Choose the download method from these fields rather than the platform alone.
     *
     * @var list<Data> $data
     */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * Customer Storage recording reference. Pending is not downloadable; exported means upload was verified; failed is terminal. Download with ordinary Storage authorization. No presigned URL is returned.
     */
    #[Optional('recording_export', nullable: true)]
    public ?MeetingSessionRecordingExport $recordingExport;

    /**
     * `new MeetingSessionGetRecordingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionGetRecordingsResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionGetRecordingsResponse)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape> $data
     * @param Omitted|MeetingSessionRecordingExport|MeetingSessionRecordingExportShape|null $recordingExport
     */
    public static function with(
        array $data,
        Omitted|MeetingSessionRecordingExport|array|null $recordingExport = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['data'] = $data;

        Omitted::VALUE !== $recordingExport && $self['recordingExport'] = $recordingExport;

        return $self;
    }

    /**
     * Temporary download URLs for recordings held by the Meeting service, including Zoom and existing Google Meet and Teams recordings. Empty for customer Storage exports; use recording_export instead. Choose the download method from these fields rather than the platform alone.
     *
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Customer Storage recording reference. Pending is not downloadable; exported means upload was verified; failed is terminal. Download with ordinary Storage authorization. No presigned URL is returned.
     *
     * @param MeetingSessionRecordingExport|MeetingSessionRecordingExportShape|null $recordingExport
     */
    public function withRecordingExport(
        MeetingSessionRecordingExport|array|null $recordingExport
    ): self {
        $self = clone $this;
        $self['recordingExport'] = $recordingExport;

        return $self;
    }
}
