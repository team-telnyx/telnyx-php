<?php

declare(strict_types=1);

namespace Telnyx\AI\AISearchConversationHistoriesResponse;

use Telnyx\AI\AISearchConversationHistoriesResponse\Data\RecordType;
use Telnyx\AI\AISearchConversationHistoriesResponse\Data\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A single search result representing one chunk of a conversation history record. Records are split into chunks of up to 480 tokens with 64-token overlap at ingestion time.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   chunkIndex: int,
 *   chunkTotal: int,
 *   documentID: string|null,
 *   ingestedAt: \DateTimeInterface,
 *   organizationID: string,
 *   recordCreatedAt: \DateTimeInterface,
 *   recordID: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   region: Region|value-of<Region>,
 *   score: float,
 *   text: string,
 *   userID: string,
 *   metadata?: array<string,mixed>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique chunk identifier.
     */
    #[Required]
    public string $id;

    /**
     * Zero-based index of this chunk within the parent record.
     */
    #[Required('chunk_index')]
    public int $chunkIndex;

    /**
     * Total number of chunks the parent record was split into.
     */
    #[Required('chunk_total')]
    public int $chunkTotal;

    /**
     * Document identifier. Present only for knowledge_base records; null for all other record types.
     */
    #[Required('document_id')]
    public ?string $documentID;

    /**
     * When the record was chunked, embedded, and indexed (ISO 8601).
     */
    #[Required('ingested_at')]
    public \DateTimeInterface $ingestedAt;

    /**
     * Identifier of the organization that owns this record.
     */
    #[Required('organization_id')]
    public string $organizationID;

    /**
     * When the original record was created (ISO 8601).
     */
    #[Required('record_created_at')]
    public \DateTimeInterface $recordCreatedAt;

    /**
     * Identifier of the parent record. Multiple chunks from the same record share this ID.
     */
    #[Required('record_id')]
    public string $recordID;

    /**
     * Type of the record.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * The region where this record is stored.
     *
     * @var value-of<Region> $region
     */
    #[Required(enum: Region::class)]
    public string $region;

    /**
     * Cosine similarity score between the query vector and this chunk's vector. Higher values indicate greater semantic relevance.
     */
    #[Required]
    public float $score;

    /**
     * The text content of this chunk (up to 480 tokens).
     */
    #[Required]
    public string $text;

    /**
     * Identifier of the user who owns this record.
     */
    #[Required('user_id')]
    public string $userID;

    /**
     * Arbitrary metadata attached to the record at ingestion time. Stored as a flat_object in OpenSearch and filterable via filter[field]=value query parameters.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   chunkIndex: ...,
     *   chunkTotal: ...,
     *   documentID: ...,
     *   ingestedAt: ...,
     *   organizationID: ...,
     *   recordCreatedAt: ...,
     *   recordID: ...,
     *   recordType: ...,
     *   region: ...,
     *   score: ...,
     *   text: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withChunkIndex(...)
     *   ->withChunkTotal(...)
     *   ->withDocumentID(...)
     *   ->withIngestedAt(...)
     *   ->withOrganizationID(...)
     *   ->withRecordCreatedAt(...)
     *   ->withRecordID(...)
     *   ->withRecordType(...)
     *   ->withRegion(...)
     *   ->withScore(...)
     *   ->withText(...)
     *   ->withUserID(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Region|value-of<Region> $region
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $id,
        int $chunkIndex,
        int $chunkTotal,
        ?string $documentID,
        \DateTimeInterface $ingestedAt,
        string $organizationID,
        \DateTimeInterface $recordCreatedAt,
        string $recordID,
        RecordType|string $recordType,
        Region|string $region,
        float $score,
        string $text,
        string $userID,
        ?array $metadata = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['chunkIndex'] = $chunkIndex;
        $self['chunkTotal'] = $chunkTotal;
        $self['documentID'] = $documentID;
        $self['ingestedAt'] = $ingestedAt;
        $self['organizationID'] = $organizationID;
        $self['recordCreatedAt'] = $recordCreatedAt;
        $self['recordID'] = $recordID;
        $self['recordType'] = $recordType;
        $self['region'] = $region;
        $self['score'] = $score;
        $self['text'] = $text;
        $self['userID'] = $userID;

        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Unique chunk identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Zero-based index of this chunk within the parent record.
     */
    public function withChunkIndex(int $chunkIndex): self
    {
        $self = clone $this;
        $self['chunkIndex'] = $chunkIndex;

        return $self;
    }

    /**
     * Total number of chunks the parent record was split into.
     */
    public function withChunkTotal(int $chunkTotal): self
    {
        $self = clone $this;
        $self['chunkTotal'] = $chunkTotal;

        return $self;
    }

    /**
     * Document identifier. Present only for knowledge_base records; null for all other record types.
     */
    public function withDocumentID(?string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * When the record was chunked, embedded, and indexed (ISO 8601).
     */
    public function withIngestedAt(\DateTimeInterface $ingestedAt): self
    {
        $self = clone $this;
        $self['ingestedAt'] = $ingestedAt;

        return $self;
    }

    /**
     * Identifier of the organization that owns this record.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * When the original record was created (ISO 8601).
     */
    public function withRecordCreatedAt(
        \DateTimeInterface $recordCreatedAt
    ): self {
        $self = clone $this;
        $self['recordCreatedAt'] = $recordCreatedAt;

        return $self;
    }

    /**
     * Identifier of the parent record. Multiple chunks from the same record share this ID.
     */
    public function withRecordID(string $recordID): self
    {
        $self = clone $this;
        $self['recordID'] = $recordID;

        return $self;
    }

    /**
     * Type of the record.
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
     * The region where this record is stored.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Cosine similarity score between the query vector and this chunk's vector. Higher values indicate greater semantic relevance.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * The text content of this chunk (up to 480 tokens).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Identifier of the user who owns this record.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Arbitrary metadata attached to the record at ingestion time. Stored as a flat_object in OpenSearch and filterable via filter[field]=value query parameters.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
