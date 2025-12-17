<?php

declare(strict_types=1);

namespace Telnyx\RecordingTranscriptions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta;

/**
 * @phpstan-import-type RecordingTranscriptionShape from \Telnyx\RecordingTranscriptions\RecordingTranscription
 * @phpstan-import-type MetaShape from \Telnyx\RecordingTranscriptions\RecordingTranscriptionListResponse\Meta
 *
 * @phpstan-type RecordingTranscriptionListResponseShape = array{
 *   data?: list<RecordingTranscriptionShape>|null, meta?: null|Meta|MetaShape
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
     * @param list<RecordingTranscriptionShape>|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<RecordingTranscriptionShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
