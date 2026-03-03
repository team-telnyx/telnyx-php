<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ChildRelationship\Via;

/**
 * @phpstan-import-type ViaShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ChildRelationship\Via
 *
 * @phpstan-type ChildRelationshipShape = array{
 *   childEvent: string,
 *   childProduct: string,
 *   childRecordType: string,
 *   costRollup: bool,
 *   description: string,
 *   relationshipType: string,
 *   traversalEnabled: bool,
 *   via: Via|ViaShape,
 * }
 */
final class ChildRelationship implements BaseModel
{
    /** @use SdkModel<ChildRelationshipShape> */
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
    public Via $via;

    /**
     * `new ChildRelationship()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChildRelationship::with(
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
     * (new ChildRelationship)
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
     * @param Via|ViaShape $via
     */
    public static function with(
        string $childEvent,
        string $childProduct,
        string $childRecordType,
        bool $costRollup,
        string $description,
        string $relationshipType,
        bool $traversalEnabled,
        Via|array $via,
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
     * @param Via|ViaShape $via
     */
    public function withVia(Via|array $via): self
    {
        $self = clone $this;
        $self['via'] = $via;

        return $self;
    }
}
