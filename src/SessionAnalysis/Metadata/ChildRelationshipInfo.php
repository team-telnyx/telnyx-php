<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MetadataFieldMappingShape from \Telnyx\SessionAnalysis\Metadata\MetadataFieldMapping
 *
 * @phpstan-type ChildRelationshipInfoShape = array{
 *   childEvent: string,
 *   childProduct: string,
 *   childRecordType: string,
 *   costRollup: bool,
 *   description: string,
 *   relationshipType: string,
 *   traversalEnabled: bool,
 *   via: MetadataFieldMapping|MetadataFieldMappingShape,
 * }
 */
final class ChildRelationshipInfo implements BaseModel
{
    /** @use SdkModel<ChildRelationshipInfoShape> */
    use SdkModel;

    #[Required('child_event')]
    public string $childEvent;

    #[Required('child_product')]
    public string $childProduct;

    #[Required('child_record_type')]
    public string $childRecordType;

    #[Required('cost_rollup')]
    public bool $costRollup;

    #[Required]
    public string $description;

    #[Required('relationship_type')]
    public string $relationshipType;

    #[Required('traversal_enabled')]
    public bool $traversalEnabled;

    #[Required]
    public MetadataFieldMapping $via;

    /**
     * `new ChildRelationshipInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChildRelationshipInfo::with(
     *   childEvent: ...,
     *   childProduct: ...,
     *   childRecordType: ...,
     *   costRollup: ...,
     *   description: ...,
     *   relationshipType: ...,
     *   traversalEnabled: ...,
     *   via: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChildRelationshipInfo)
     *   ->withChildEvent(...)
     *   ->withChildProduct(...)
     *   ->withChildRecordType(...)
     *   ->withCostRollup(...)
     *   ->withDescription(...)
     *   ->withRelationshipType(...)
     *   ->withTraversalEnabled(...)
     *   ->withVia(...)
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
     * @param MetadataFieldMapping|MetadataFieldMappingShape $via
     */
    public static function with(
        string $childEvent,
        string $childProduct,
        string $childRecordType,
        bool $costRollup,
        string $description,
        string $relationshipType,
        bool $traversalEnabled,
        MetadataFieldMapping|array $via,
    ): self {
        $self = new self;

        $self['childEvent'] = $childEvent;
        $self['childProduct'] = $childProduct;
        $self['childRecordType'] = $childRecordType;
        $self['costRollup'] = $costRollup;
        $self['description'] = $description;
        $self['relationshipType'] = $relationshipType;
        $self['traversalEnabled'] = $traversalEnabled;
        $self['via'] = $via;

        return $self;
    }

    public function withChildEvent(string $childEvent): self
    {
        $self = clone $this;
        $self['childEvent'] = $childEvent;

        return $self;
    }

    public function withChildProduct(string $childProduct): self
    {
        $self = clone $this;
        $self['childProduct'] = $childProduct;

        return $self;
    }

    public function withChildRecordType(string $childRecordType): self
    {
        $self = clone $this;
        $self['childRecordType'] = $childRecordType;

        return $self;
    }

    public function withCostRollup(bool $costRollup): self
    {
        $self = clone $this;
        $self['costRollup'] = $costRollup;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withRelationshipType(string $relationshipType): self
    {
        $self = clone $this;
        $self['relationshipType'] = $relationshipType;

        return $self;
    }

    public function withTraversalEnabled(bool $traversalEnabled): self
    {
        $self = clone $this;
        $self['traversalEnabled'] = $traversalEnabled;

        return $self;
    }

    /**
     * @param MetadataFieldMapping|MetadataFieldMappingShape $via
     */
    public function withVia(MetadataFieldMapping|array $via): self
    {
        $self = clone $this;
        $self['via'] = $via;

        return $self;
    }
}
