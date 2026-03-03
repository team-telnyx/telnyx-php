<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\EventNode\Cost;
use Telnyx\SessionAnalysis\EventNode\Links;
use Telnyx\SessionAnalysis\EventNode\Relationship;

/**
 * @phpstan-import-type CostShape from \Telnyx\SessionAnalysis\EventNode\Cost
 * @phpstan-import-type LinksShape from \Telnyx\SessionAnalysis\EventNode\Links
 * @phpstan-import-type RelationshipShape from \Telnyx\SessionAnalysis\EventNode\Relationship
 *
 * @phpstan-type EventNodeShape = array{
 *   id: string,
 *   children: list<mixed>,
 *   cost: Cost|CostShape,
 *   eventName: string,
 *   links: Links|LinksShape,
 *   product: string,
 *   record: array<string,mixed>,
 *   relationship?: null|Relationship|RelationshipShape,
 * }
 */
final class EventNode implements BaseModel
{
    /** @use SdkModel<EventNodeShape> */
    use SdkModel;

    /**
     * Event identifier.
     */
    #[Required]
    public string $id;

    /**
     * Child events in the session tree.
     *
     * @var list<mixed> $children
     */
    #[Required(list: EventNode::class)]
    public array $children;

    #[Required]
    public Cost $cost;

    /**
     * Name of the event type.
     */
    #[Required('event_name')]
    public string $eventName;

    #[Required]
    public Links $links;

    /**
     * Product that generated this event.
     */
    #[Required]
    public string $product;

    /**
     * The underlying detail record data. Contents vary by record type.
     *
     * @var array<string,mixed> $record
     */
    #[Required(map: 'mixed')]
    public array $record;

    /**
     * Relationship to the parent node, null for root.
     */
    #[Optional(nullable: true)]
    public ?Relationship $relationship;

    /**
     * `new EventNode()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventNode::with(
     *   id: ...,
     *   children: ...,
     *   cost: ...,
     *   eventName: ...,
     *   links: ...,
     *   product: ...,
     *   record: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventNode)
     *   ->withID(...)
     *   ->withChildren(...)
     *   ->withCost(...)
     *   ->withEventName(...)
     *   ->withLinks(...)
     *   ->withProduct(...)
     *   ->withRecord(...)
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
     * @param list<mixed> $children
     * @param Cost|CostShape $cost
     * @param Links|LinksShape $links
     * @param array<string,mixed> $record
     * @param Relationship|RelationshipShape|null $relationship
     */
    public static function with(
        string $id,
        array $children,
        Cost|array $cost,
        string $eventName,
        Links|array $links,
        string $product,
        array $record,
        Relationship|array|null $relationship = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['children'] = $children;
        $self['cost'] = $cost;
        $self['eventName'] = $eventName;
        $self['links'] = $links;
        $self['product'] = $product;
        $self['record'] = $record;

        null !== $relationship && $self['relationship'] = $relationship;

        return $self;
    }

    /**
     * Event identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Child events in the session tree.
     *
     * @param list<mixed> $children
     */
    public function withChildren(array $children): self
    {
        $self = clone $this;
        $self['children'] = $children;

        return $self;
    }

    /**
     * @param Cost|CostShape $cost
     */
    public function withCost(Cost|array $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * Name of the event type.
     */
    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * @param Links|LinksShape $links
     */
    public function withLinks(Links|array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * Product that generated this event.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * The underlying detail record data. Contents vary by record type.
     *
     * @param array<string,mixed> $record
     */
    public function withRecord(array $record): self
    {
        $self = clone $this;
        $self['record'] = $record;

        return $self;
    }

    /**
     * Relationship to the parent node, null for root.
     *
     * @param Relationship|RelationshipShape|null $relationship
     */
    public function withRelationship(
        Relationship|array|null $relationship
    ): self {
        $self = clone $this;
        $self['relationship'] = $relationship;

        return $self;
    }
}
