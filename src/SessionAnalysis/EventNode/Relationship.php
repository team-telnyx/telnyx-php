<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\EventNode;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\EventNode\Relationship\Via;

/**
 * Relationship to the parent node, null for root.
 *
 * @phpstan-import-type ViaShape from \Telnyx\SessionAnalysis\EventNode\Relationship\Via
 *
 * @phpstan-type RelationshipShape = array{
 *   parentID: string, type: string, via: Via|ViaShape
 * }
 */
final class Relationship implements BaseModel
{
    /** @use SdkModel<RelationshipShape> */
    use SdkModel;

    /**
     * Identifier of the parent event.
     */
    #[Required('parent_id')]
    public string $parentID;

    /**
     * Relationship type identifier.
     */
    #[Required]
    public string $type;

    #[Required]
    public Via $via;

    /**
     * `new Relationship()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Relationship::with(parentID: ..., type: ..., via: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Relationship)->withParentID(...)->withType(...)->withVia(...)
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
        string $parentID,
        string $type,
        Via|array $via
    ): self {
        $self = new self;

        $self['parentID'] = $parentID;
        $self['type'] = $type;
        $self['via'] = $via;

        return $self;
    }

    /**
     * Identifier of the parent event.
     */
    public function withParentID(string $parentID): self
    {
        $self = clone $this;
        $self['parentID'] = $parentID;

        return $self;
    }

    /**
     * Relationship type identifier.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

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
