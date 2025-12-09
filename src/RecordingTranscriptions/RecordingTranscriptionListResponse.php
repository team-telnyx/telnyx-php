<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscription\RecordType;
use Telnyx\RecordingTranscriptions\RecordingTranscription\Status;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta\Cursors;

/**
 * @phpstan-type RecordingTranscriptionListResponseShape = array{
 *   data?: list<RecordingTranscription>|null, meta?: Meta|null
 * }
 */
final class RecordingTranscriptionListResponse implements BaseModel
{
    /** @use SdkModel<RecordingTranscriptionListResponseShape> */
    use SdkModel;

    /** @var list<RecordingTranscription>|null $data */
    #[Optional(list: RecordingTranscription::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RecordingTranscription|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingID?: string|null,
     *   status?: value-of<Status>|null,
     *   transcriptionText?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param Meta|array{
     *   cursors?: Cursors|null, next?: string|null, previous?: string|null
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<RecordingTranscription|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   durationMillis?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   recordingID?: string|null,
     *   status?: value-of<Status>|null,
     *   transcriptionText?: string|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   cursors?: Cursors|null, next?: string|null, previous?: string|null
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
