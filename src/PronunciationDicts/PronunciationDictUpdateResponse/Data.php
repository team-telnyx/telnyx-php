<?php

declare(strict_types=1);

namespace Telnyx\PronunciationDicts\PronunciationDictUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse\Data\Item;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse\Data\RecordType;

/**
 * A pronunciation dictionary record.
 *
 * @phpstan-import-type ItemVariants from \Telnyx\PronunciationDicts\PronunciationDictUpdateResponse\Data\Item
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictUpdateResponse\Data\Item
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   items?: list<ItemShape>|null,
 *   name?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   updatedAt?: \DateTimeInterface|null,
 *   version?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the pronunciation dictionary.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 timestamp with millisecond precision.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * List of pronunciation items (alias or phoneme type).
     *
     * @var list<ItemVariants>|null $items
     */
    #[Optional(list: Item::class)]
    public ?array $items;

    /**
     * Human-readable name for the dictionary. Must be unique within the organization.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the resource type.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * ISO 8601 timestamp with millisecond precision.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Auto-incrementing version number. Increases by 1 on each update. Used for optimistic concurrency control and cache invalidation.
     */
    #[Optional]
    public ?int $version;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ItemShape>|null $items
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $items = null,
        ?string $name = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $version = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $items && $self['items'] = $items;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $version && $self['version'] = $version;

        return $self;
    }

    /**
     * Unique identifier for the pronunciation dictionary.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 timestamp with millisecond precision.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * List of pronunciation items (alias or phoneme type).
     *
     * @param list<ItemShape> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
    }

    /**
     * Human-readable name for the dictionary. Must be unique within the organization.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the resource type.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 timestamp with millisecond precision.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Auto-incrementing version number. Increases by 1 on each update. Used for optimistic concurrency control and cache invalidation.
     */
    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
