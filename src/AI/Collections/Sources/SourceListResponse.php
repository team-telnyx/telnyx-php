<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CollectionsSourceShape from \Telnyx\AI\Collections\Sources\CollectionsSource
 *
 * @phpstan-type SourceListResponseShape = array{
 *   data?: list<CollectionsSource|CollectionsSourceShape>|null
 * }
 */
final class SourceListResponse implements BaseModel
{
    /** @use SdkModel<SourceListResponseShape> */
    use SdkModel;

    /** @var list<CollectionsSource>|null $data */
    #[Optional(list: CollectionsSource::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<CollectionsSource|CollectionsSourceShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<CollectionsSource|CollectionsSourceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
