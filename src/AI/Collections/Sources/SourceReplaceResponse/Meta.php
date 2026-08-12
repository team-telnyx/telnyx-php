<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources\SourceReplaceResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Reports which source IDs were added, retained, and removed by a replace operation.
 *
 * @phpstan-type MetaShape = array{
 *   added?: list<string>|null,
 *   removed?: list<string>|null,
 *   retained?: list<string>|null,
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    /** @var list<string>|null $added */
    #[Optional(list: 'string')]
    public ?array $added;

    /** @var list<string>|null $removed */
    #[Optional(list: 'string')]
    public ?array $removed;

    /** @var list<string>|null $retained */
    #[Optional(list: 'string')]
    public ?array $retained;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $added
     * @param list<string>|null $removed
     * @param list<string>|null $retained
     */
    public static function with(
        ?array $added = null,
        ?array $removed = null,
        ?array $retained = null
    ): self {
        $self = new self;

        null !== $added && $self['added'] = $added;
        null !== $removed && $self['removed'] = $removed;
        null !== $retained && $self['retained'] = $retained;

        return $self;
    }

    /**
     * @param list<string> $added
     */
    public function withAdded(array $added): self
    {
        $self = clone $this;
        $self['added'] = $added;

        return $self;
    }

    /**
     * @param list<string> $removed
     */
    public function withRemoved(array $removed): self
    {
        $self = clone $this;
        $self['removed'] = $removed;

        return $self;
    }

    /**
     * @param list<string> $retained
     */
    public function withRetained(array $retained): self
    {
        $self = clone $this;
        $self['retained'] = $retained;

        return $self;
    }
}
