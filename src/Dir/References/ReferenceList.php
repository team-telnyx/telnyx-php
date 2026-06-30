<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReferenceShape from \Telnyx\Dir\References\Reference
 *
 * @phpstan-type ReferenceListShape = array{data: list<Reference|ReferenceShape>}
 */
final class ReferenceList implements BaseModel
{
    /** @use SdkModel<ReferenceListShape> */
    use SdkModel;

    /** @var list<Reference> $data */
    #[Required(list: Reference::class)]
    public array $data;

    /**
     * `new ReferenceList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReferenceList::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReferenceList)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Reference|ReferenceShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Reference|ReferenceShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
