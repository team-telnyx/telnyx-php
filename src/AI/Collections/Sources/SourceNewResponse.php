<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Envelope containing a single collection source.
 *
 * @phpstan-import-type SourceShape from \Telnyx\AI\Collections\Sources\Source
 *
 * @phpstan-type SourceNewResponseShape = array{data?: null|Source|SourceShape}
 */
final class SourceNewResponse implements BaseModel
{
    /** @use SdkModel<SourceNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Source $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Source|SourceShape|null $data
     */
    public static function with(Source|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Source|SourceShape $data
     */
    public function withData(Source|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
