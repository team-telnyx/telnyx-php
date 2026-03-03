<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MetadataFieldMappingShape from \Telnyx\SessionAnalysis\Metadata\MetadataFieldMapping
 *
 * @phpstan-type ParentRelationshipInfoShape = array{
 *   costRollup: bool,
 *   description: string,
 *   parentEvent: string,
 *   parentProduct: string,
 *   parentRecordType: string,
 *   relationshipType: string,
 *   traversalEnabled: bool,
 *   via: MetadataFieldMapping|MetadataFieldMappingShape,
 * }
 */
final class ParentRelationshipInfo implements BaseModel
{
    /** @use SdkModel<ParentRelationshipInfoShape> */
    use SdkModel;

    #[Required('cost_rollup')]
    public bool $costRollup;

    #[Required]
    public string $description;

    #[Required('parent_event')]
    public string $parentEvent;

    #[Required('parent_product')]
    public string $parentProduct;

    #[Required('parent_record_type')]
    public string $parentRecordType;

    #[Required('relationship_type')]
    public string $relationshipType;

    #[Required('traversal_enabled')]
    public bool $traversalEnabled;

    #[Required]
    public MetadataFieldMapping $via;

    /**
     * `new ParentRelationshipInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ParentRelationshipInfo::with(
     *   costRollup: ...,
     *   description: ...,
     *   parentEvent: ...,
     *   parentProduct: ...,
     *   parentRecordType: ...,
     *   relationshipType: ...,
     *   traversalEnabled: ...,
     *   via: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ParentRelationshipInfo)
     *   ->withCostRollup(...)
     *   ->withDescription(...)
     *   ->withParentEvent(...)
     *   ->withParentProduct(...)
     *   ->withParentRecordType(...)
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
        bool $costRollup,
        string $description,
        string $parentEvent,
        string $parentProduct,
        string $parentRecordType,
        string $relationshipType,
        bool $traversalEnabled,
        MetadataFieldMapping|array $via,
    ): self {
        $self = new self;

        $self['costRollup'] = $costRollup;
        $self['description'] = $description;
        $self['parentEvent'] = $parentEvent;
        $self['parentProduct'] = $parentProduct;
        $self['parentRecordType'] = $parentRecordType;
        $self['relationshipType'] = $relationshipType;
        $self['traversalEnabled'] = $traversalEnabled;
        $self['via'] = $via;

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

    public function withParentEvent(string $parentEvent): self
    {
        $self = clone $this;
        $self['parentEvent'] = $parentEvent;

        return $self;
    }

    public function withParentProduct(string $parentProduct): self
    {
        $self = clone $this;
        $self['parentProduct'] = $parentProduct;

        return $self;
    }

    public function withParentRecordType(string $parentRecordType): self
    {
        $self = clone $this;
        $self['parentRecordType'] = $parentRecordType;

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
