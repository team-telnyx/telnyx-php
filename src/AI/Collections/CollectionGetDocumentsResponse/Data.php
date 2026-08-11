<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\CollectionGetDocumentsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   chunkIndex?: int|null,
 *   chunkTotal?: int|null,
 *   ingestedAt?: \DateTimeInterface|null,
 *   metadata?: array<string,mixed>|null,
 *   organizationID?: string|null,
 *   recordCreatedAt?: \DateTimeInterface|null,
 *   recordID?: string|null,
 *   recordType?: string|null,
 *   region?: string|null,
 *   score?: float|null,
 *   text?: string|null,
 *   userID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('chunk_index')]
    public ?int $chunkIndex;

    #[Optional('chunk_total')]
    public ?int $chunkTotal;

    #[Optional('ingested_at')]
    public ?\DateTimeInterface $ingestedAt;

    /** @var array<string,mixed>|null $metadata */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    #[Optional('organization_id')]
    public ?string $organizationID;

    #[Optional('record_created_at')]
    public ?\DateTimeInterface $recordCreatedAt;

    #[Optional('record_id')]
    public ?string $recordID;

    /**
     * The source record kind this chunk came from (e.g. `voice`, `meeting_bot`, `message`).
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $region;

    /**
     * Relevance score (higher = more relevant) for ranked search. `0.0` for plain catalog listings (when `query` is omitted).
     */
    #[Optional]
    public ?float $score;

    #[Optional]
    public ?string $text;

    #[Optional('user_id')]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        ?string $id = null,
        ?int $chunkIndex = null,
        ?int $chunkTotal = null,
        ?\DateTimeInterface $ingestedAt = null,
        ?array $metadata = null,
        ?string $organizationID = null,
        ?\DateTimeInterface $recordCreatedAt = null,
        ?string $recordID = null,
        ?string $recordType = null,
        ?string $region = null,
        ?float $score = null,
        ?string $text = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $chunkIndex && $self['chunkIndex'] = $chunkIndex;
        null !== $chunkTotal && $self['chunkTotal'] = $chunkTotal;
        null !== $ingestedAt && $self['ingestedAt'] = $ingestedAt;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordCreatedAt && $self['recordCreatedAt'] = $recordCreatedAt;
        null !== $recordID && $self['recordID'] = $recordID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $region && $self['region'] = $region;
        null !== $score && $self['score'] = $score;
        null !== $text && $self['text'] = $text;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withChunkIndex(int $chunkIndex): self
    {
        $self = clone $this;
        $self['chunkIndex'] = $chunkIndex;

        return $self;
    }

    public function withChunkTotal(int $chunkTotal): self
    {
        $self = clone $this;
        $self['chunkTotal'] = $chunkTotal;

        return $self;
    }

    public function withIngestedAt(\DateTimeInterface $ingestedAt): self
    {
        $self = clone $this;
        $self['ingestedAt'] = $ingestedAt;

        return $self;
    }

    /**
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    public function withRecordCreatedAt(
        \DateTimeInterface $recordCreatedAt
    ): self {
        $self = clone $this;
        $self['recordCreatedAt'] = $recordCreatedAt;

        return $self;
    }

    public function withRecordID(string $recordID): self
    {
        $self = clone $this;
        $self['recordID'] = $recordID;

        return $self;
    }

    /**
     * The source record kind this chunk came from (e.g. `voice`, `meeting_bot`, `message`).
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Relevance score (higher = more relevant) for ranked search. `0.0` for plain catalog listings (when `query` is omitted).
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
