<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse;

use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data\Content;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-import-type ContentVariants from \Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data\Content
 * @phpstan-import-type ContentShape from \Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse\Data\Content
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   content: ContentShape,
 *   memoryCount: int,
 *   sessionID: string|null,
 *   createdAt?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     */
    #[Required]
    public string $id;

    /**
     * What was stored, in the shape it was sent: an ingested JSON body as JSON, a string body or a remembered fact as a string. A session ingested before formats were recorded is returned as the text it was stored as.
     *
     * @var ContentVariants $content
     */
    #[Required(union: Content::class)]
    public string|float|bool|array $content;

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
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., content: ..., memoryCount: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withMemoryCount(...)
     *   ->withSessionID(...)
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
     * @param ContentShape $content
     */
    public static function with(
        string $id,
        string|float|bool|array $content,
        int $memoryCount,
        ?string $sessionID,
        string|Omitted|null $createdAt = Omitted::VALUE,
        string|Omitted|null $updatedAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
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
     * What was stored, in the shape it was sent: an ingested JSON body as JSON, a string body or a remembered fact as a string. A session ingested before formats were recorded is returned as the text it was stored as.
     *
     * @param ContentShape $content
     */
    public function withContent(string|float|bool|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

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
