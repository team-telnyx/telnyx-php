<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ChildRelationship;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\Meta;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ParentRelationship;

/**
 * @phpstan-import-type ChildRelationshipShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ChildRelationship
 * @phpstan-import-type MetaShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\Meta
 * @phpstan-import-type ParentRelationshipShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse\ParentRelationship
 *
 * @phpstan-type MetadataGetRecordTypeResponseShape = array{
 *   aliases: list<string>,
 *   childRelationships: list<ChildRelationship|ChildRelationshipShape>,
 *   event: string,
 *   examples: array<string,mixed>,
 *   meta: Meta|MetaShape,
 *   parentRelationships: list<ParentRelationship|ParentRelationshipShape>,
 *   product: string,
 *   recordType: string,
 * }
 */
final class MetadataGetRecordTypeResponse implements BaseModel
{
    /** @use SdkModel<MetadataGetRecordTypeResponseShape> */
    use SdkModel;

    /** @var list<string> $aliases */
    #[Required(list: 'string')]
    public array $aliases;

    /** @var list<ChildRelationship> $childRelationships */
    #[Required('child_relationships', list: ChildRelationship::class)]
    public array $childRelationships;

    #[Required]
    public string $event;

    /**
     * Example queries and responses for this record type.
     *
     * @var array<string,mixed> $examples
     */
    #[Required(map: 'mixed')]
    public array $examples;

    #[Required]
    public Meta $meta;

    /** @var list<ParentRelationship> $parentRelationships */
    #[Required('parent_relationships', list: ParentRelationship::class)]
    public array $parentRelationships;

    #[Required]
    public string $product;

    #[Required('record_type')]
    public string $recordType;

    /**
     * `new MetadataGetRecordTypeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetadataGetRecordTypeResponse::with(
     *   aliases: ...,
     *   childRelationships: ...,
     *   event: ...,
     *   examples: ...,
     *   meta: ...,
     *   parentRelationships: ...,
     *   product: ...,
     *   recordType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetadataGetRecordTypeResponse)
     *   ->withAliases(...)
     *   ->withChildRelationships(...)
     *   ->withEvent(...)
     *   ->withExamples(...)
     *   ->withMeta(...)
     *   ->withParentRelationships(...)
     *   ->withProduct(...)
     *   ->withRecordType(...)
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
     * @param list<string> $aliases
     * @param list<ChildRelationship|ChildRelationshipShape> $childRelationships
     * @param array<string,mixed> $examples
     * @param Meta|MetaShape $meta
     * @param list<ParentRelationship|ParentRelationshipShape> $parentRelationships
     */
    public static function with(
        array $aliases,
        array $childRelationships,
        string $event,
        array $examples,
        Meta|array $meta,
        array $parentRelationships,
        string $product,
        string $recordType,
    ): self {
        $self = new self;

        $self['aliases'] = $aliases;
        $self['childRelationships'] = $childRelationships;
        $self['event'] = $event;
        $self['examples'] = $examples;
        $self['meta'] = $meta;
        $self['parentRelationships'] = $parentRelationships;
        $self['product'] = $product;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<string> $aliases
     */
    public function withAliases(array $aliases): self
    {
        $self = clone $this;
        $self['aliases'] = $aliases;

        return $self;
    }

    /**
     * @param list<ChildRelationship|ChildRelationshipShape> $childRelationships
     */
    public function withChildRelationships(array $childRelationships): self
    {
        $self = clone $this;
        $self['childRelationships'] = $childRelationships;

        return $self;
    }

    public function withEvent(string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }

    /**
     * Example queries and responses for this record type.
     *
     * @param array<string,mixed> $examples
     */
    public function withExamples(array $examples): self
    {
        $self = clone $this;
        $self['examples'] = $examples;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<ParentRelationship|ParentRelationshipShape> $parentRelationships
     */
    public function withParentRelationships(array $parentRelationships): self
    {
        $self = clone $this;
        $self['parentRelationships'] = $parentRelationships;

        return $self;
    }

    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
