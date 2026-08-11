<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SourceShape = array{
 *   id?: string|null,
 *   bucketID?: string|null,
 *   collectionID?: string|null,
 *   recordType?: string|null,
 *   sourceType?: null|SourceType|value-of<SourceType>,
 *   status?: string|null,
 * }
 */
final class Source implements BaseModel
{
    /** @use SdkModel<SourceShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * The Telnyx Storage bucket name. Present only for `bucket` sources.
     */
    #[Optional('bucket_id')]
    public ?string $bucketID;

    #[Optional('collection_id')]
    public ?string $collectionID;

    /**
     * Identifies the record type. Always `ai_collection_source`.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
     *
     * @var value-of<SourceType>|null $sourceType
     */
    #[Optional('source_type', enum: SourceType::class)]
    public ?string $sourceType;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SourceType|value-of<SourceType>|null $sourceType
     */
    public static function with(
        ?string $id = null,
        ?string $bucketID = null,
        ?string $collectionID = null,
        ?string $recordType = null,
        SourceType|string|null $sourceType = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $bucketID && $self['bucketID'] = $bucketID;
        null !== $collectionID && $self['collectionID'] = $collectionID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $sourceType && $self['sourceType'] = $sourceType;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Telnyx Storage bucket name. Present only for `bucket` sources.
     */
    public function withBucketID(string $bucketID): self
    {
        $self = clone $this;
        $self['bucketID'] = $bucketID;

        return $self;
    }

    public function withCollectionID(string $collectionID): self
    {
        $self = clone $this;
        $self['collectionID'] = $collectionID;

        return $self;
    }

    /**
     * Identifies the record type. Always `ai_collection_source`.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The type of Telnyx data attached as a source. `bucket` requires an additional `bucket_id`. Only `voice` is searchable today; `meeting_bot`, `message`, and `bucket` attach but are not yet searchable (Coming soon).
     *
     * @param SourceType|value-of<SourceType> $sourceType
     */
    public function withSourceType(SourceType|string $sourceType): self
    {
        $self = clone $this;
        $self['sourceType'] = $sourceType;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
