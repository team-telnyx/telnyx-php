<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response containing a single pronunciation dictionary.
 *
 * @phpstan-import-type PronunciationDictDataShape from \Telnyx\PronunciationDicts\PronunciationDictData
 *
 * @phpstan-type PronunciationDictUpdateResponseShape = array{
 *   data?: null|PronunciationDictData|PronunciationDictDataShape
 * }
 */
final class PronunciationDictUpdateResponse implements BaseModel
{
    /** @use SdkModel<PronunciationDictUpdateResponseShape> */
    use SdkModel;

    /**
     * A pronunciation dictionary record.
     */
    #[Optional]
    public ?PronunciationDictData $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PronunciationDictData|PronunciationDictDataShape|null $data
     */
    public static function with(PronunciationDictData|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A pronunciation dictionary record.
     *
     * @param PronunciationDictData|PronunciationDictDataShape $data
     */
    public function withData(PronunciationDictData|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
