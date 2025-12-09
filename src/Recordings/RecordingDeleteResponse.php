<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\RecordingResponseData\Channels;
use Telnyx\Recordings\RecordingResponseData\DownloadURLs;
use Telnyx\Recordings\RecordingResponseData\RecordType;
use Telnyx\Recordings\RecordingResponseData\Source;
use Telnyx\Recordings\RecordingResponseData\Status;

/**
 * @phpstan-type RecordingDeleteResponseShape = array{
 *   data?: RecordingResponseData|null
 * }
 */
final class RecordingDeleteResponse implements BaseModel
{
    /** @use SdkModel<RecordingDeleteResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   callControlID?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   channels?: value-of<Channels>|null,
     *   conferenceID?: string|null,
     *   createdAt?: string|null,
     *   downloadURLs?: DownloadURLs|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingEndedAt?: string|null,
     *   recordingStartedAt?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(RecordingResponseData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RecordingResponseData|array{
     *   id?: string|null,
     *   callControlID?: string|null,
     *   callLegID?: string|null,
     *   callSessionID?: string|null,
     *   channels?: value-of<Channels>|null,
     *   conferenceID?: string|null,
     *   createdAt?: string|null,
     *   downloadURLs?: DownloadURLs|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingEndedAt?: string|null,
     *   recordingStartedAt?: string|null,
     *   source?: value-of<Source>|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(RecordingResponseData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
