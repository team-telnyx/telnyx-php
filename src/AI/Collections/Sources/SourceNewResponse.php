<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Envelope containing a single collection source.
 *
 * @phpstan-import-type CollectionsSourceShape from \Telnyx\AI\Collections\Sources\CollectionsSource
 *
 * @phpstan-type SourceNewResponseShape = array{
 *   data?: null|CollectionsSource|CollectionsSourceShape
 * }
 */
final class SourceNewResponse implements BaseModel
{
    /** @use SdkModel<SourceNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CollectionsSource $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CollectionsSource|CollectionsSourceShape|null $data
     */
    public static function with(CollectionsSource|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CollectionsSource|CollectionsSourceShape $data
     */
    public function withData(CollectionsSource|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
