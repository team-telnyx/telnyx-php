<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\EventNode\Relationship;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ViaShape = array{localField: string, parentField: string}
 */
final class Via implements BaseModel
{
    /** @use SdkModel<ViaShape> */
    use SdkModel;

    /**
     * Field name on the child record.
     */
    #[Required('local_field')]
    public string $localField;

    /**
     * Field name on the parent record.
     */
    #[Required('parent_field')]
    public string $parentField;

    /**
     * `new Via()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Via::with(localField: ..., parentField: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Via)->withLocalField(...)->withParentField(...)
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
     */
    public static function with(string $localField, string $parentField): self
    {
        $self = new self;

        $self['localField'] = $localField;
        $self['parentField'] = $parentField;

        return $self;
    }

    /**
     * Field name on the child record.
     */
    public function withLocalField(string $localField): self
    {
        $self = clone $this;
        $self['localField'] = $localField;

        return $self;
    }

    /**
     * Field name on the parent record.
     */
    public function withParentField(string $parentField): self
    {
        $self = clone $this;
        $self['parentField'] = $parentField;

        return $self;
    }
}
