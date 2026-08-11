<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CollectionShape from \Telnyx\AI\Collections\Collection
 *
 * @phpstan-type CollectionEnvelopeShape = array{
 *   data?: null|Collection|CollectionShape
 * }
 */
final class CollectionEnvelope implements BaseModel
{
    /** @use SdkModel<CollectionEnvelopeShape> */
    use SdkModel;

    #[Optional]
    public ?Collection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Collection|CollectionShape|null $data
     */
    public static function with(Collection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Collection|CollectionShape $data
     */
    public function withData(Collection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
