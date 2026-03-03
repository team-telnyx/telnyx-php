<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataFieldMappingShape = array{
 *   localField: string, parentField: string
 * }
 */
final class MetadataFieldMapping implements BaseModel
{
    /** @use SdkModel<MetadataFieldMappingShape> */
    use SdkModel;

    #[Required('local_field')]
    public string $localField;

    #[Required('parent_field')]
    public string $parentField;

    /**
     * `new MetadataFieldMapping()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetadataFieldMapping::with(localField: ..., parentField: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetadataFieldMapping)->withLocalField(...)->withParentField(...)
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

    public function withLocalField(string $localField): self
    {
        $self = clone $this;
        $self['localField'] = $localField;

        return $self;
    }

    public function withParentField(string $parentField): self
    {
        $self = clone $this;
        $self['parentField'] = $parentField;

        return $self;
    }
}
