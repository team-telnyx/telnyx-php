<?php

declare(strict_types=1);

namespace Telnyx\Recordings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RecordingResponseDataShape from \Telnyx\Recordings\RecordingResponseData
 *
 * @phpstan-type RecordingDeleteResponseShape = array{
 *   data?: null|RecordingResponseData|RecordingResponseDataShape
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
     * @param RecordingResponseDataShape $data
     */
    public static function with(RecordingResponseData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param RecordingResponseDataShape $data
     */
    public function withData(RecordingResponseData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
