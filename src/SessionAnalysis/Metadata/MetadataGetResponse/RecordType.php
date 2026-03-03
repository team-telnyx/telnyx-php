<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType\ChildRelationship;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType\ParentRelationship;

/**
 * @phpstan-import-type ChildRelationshipShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType\ChildRelationship
 * @phpstan-import-type ParentRelationshipShape from \Telnyx\SessionAnalysis\Metadata\MetadataGetResponse\RecordType\ParentRelationship
 *
 * @phpstan-type RecordTypeShape = array{
 *   aliases: list<string>,
 *   childRelationships: list<ChildRelationship|ChildRelationshipShape>,
 *   description: string,
 *   event: string,
 *   parentRelationships: list<ParentRelationship|ParentRelationshipShape>,
 *   product: string,
 *   recordType: string,
 * }
 */
final class RecordType implements BaseModel
{
    /** @use SdkModel<RecordTypeShape> */
    use SdkModel;

    /** @var list<string> $aliases */
    #[Required(list: 'string')]
    public array $aliases;

    /** @var list<ChildRelationship> $childRelationships */
    #[Required('child_relationships', list: ChildRelationship::class)]
    public array $childRelationships;

    #[Required]
    public string $description;

    #[Required]
    public string $event;

    /** @var list<ParentRelationship> $parentRelationships */
    #[Required('parent_relationships', list: ParentRelationship::class)]
    public array $parentRelationships;

    #[Required]
    public string $product;

    #[Required('record_type')]
    public string $recordType;

    /**
     * `new RecordType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordType::with(
     *   aliases: ...,
     *   childRelationships: ...,
     *   description: ...,
     *   event: ...,
     *   parentRelationships: ...,
     *   product: ...,
     *   recordType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordType)
     *   ->withAliases(...)
     *   ->withChildRelationships(...)
     *   ->withDescription(...)
     *   ->withEvent(...)
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
     * @param list<ParentRelationship|ParentRelationshipShape> $parentRelationships
     */
    public static function with(
        array $aliases,
        array $childRelationships,
        string $description,
        string $event,
        array $parentRelationships,
        string $product,
        string $recordType,
    ): self {
        $self = new self;

        $self['aliases'] = $aliases;
        $self['childRelationships'] = $childRelationships;
        $self['description'] = $description;
        $self['event'] = $event;
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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withEvent(string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

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
