<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type SourceShape = array{
 *   id: string,
 *   memoryCount: int,
 *   sessionID: string|null,
 *   createdAt?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Source implements BaseModel
{
    /** @use SdkModel<SourceShape> */
    use SdkModel;

    /**
     * Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     */
    #[Required]
    public string $id;

    /**
     * Memories extracted from this source. A memory derived from several sources is not counted here.
     */
    #[Required('memory_count')]
    public int $memoryCount;

    /**
     * The session this source was ingested as. Null for a remembered fact.
     */
    #[Required('session_id')]
    public ?string $sessionID;

    /**
     * When the source was first stored.
     */
    #[Optional('created_at', nullable: true)]
    public ?string $createdAt;

    /**
     * When the source was last written; re-ingesting moves it.
     */
    #[Optional('updated_at', nullable: true)]
    public ?string $updatedAt;

    /**
     * `new Source()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Source::with(id: ..., memoryCount: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Source)->withID(...)->withMemoryCount(...)->withSessionID(...)
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
     */
    public static function with(
        string $id,
        int $memoryCount,
        ?string $sessionID,
        string|Omitted|null $createdAt = Omitted::VALUE,
        string|Omitted|null $updatedAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['memoryCount'] = $memoryCount;
        $self['sessionID'] = $sessionID;

        Omitted::VALUE !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Memories extracted from this source. A memory derived from several sources is not counted here.
     */
    public function withMemoryCount(int $memoryCount): self
    {
        $self = clone $this;
        $self['memoryCount'] = $memoryCount;

        return $self;
    }

    /**
     * The session this source was ingested as. Null for a remembered fact.
     */
    public function withSessionID(?string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    /**
     * When the source was first stored.
     */
    public function withCreatedAt(?string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * When the source was last written; re-ingesting moves it.
     */
    public function withUpdatedAt(?string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
