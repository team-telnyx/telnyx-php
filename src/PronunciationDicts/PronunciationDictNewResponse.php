<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictNewResponse\Data;

/**
 * Response containing a single pronunciation dictionary.
 *
 * @phpstan-import-type DataShape from \Telnyx\PronunciationDicts\PronunciationDictNewResponse\Data
 *
 * @phpstan-type PronunciationDictNewResponseShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class PronunciationDictNewResponse implements BaseModel
{
    /** @use SdkModel<PronunciationDictNewResponseShape> */
    use SdkModel;

    /**
     * A pronunciation dictionary record.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * A pronunciation dictionary record.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
