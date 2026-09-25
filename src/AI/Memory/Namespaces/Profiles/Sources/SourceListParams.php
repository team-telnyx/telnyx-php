<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Sources;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Everything a profile has stored and extracts memories from: each ingested session, and each remembered fact, which has no session. Content is not listed; read one source for it. A source whose ingest is still queued is not here yet. Re-ingesting a session moves it to the front, so a listing paged while sessions are written can repeat or miss one at a page boundary. A `session_id` narrows the listing to the source that session was stored as: one source or none, and none -- an empty page, not a 404 -- for a session never ingested, still queued, or another profile's.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\Profiles\SourcesService::list()
 *
 * @phpstan-type SourceListParamsShape = array{
 *   namespace: string,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sessionID?: string|null,
 * }
 */
final class SourceListParams implements BaseModel
{
    /** @use SdkModel<SourceListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $namespace;

    /**
     * The page to return, counting from 1. Bounded in depth: (page[number] - 1) * page[size] may be at most 10000.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * How many results a page holds.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * An ingested session, by the `session_id` it was ingested with. Narrows the request to the source that session was stored as.
     */
    #[Optional(nullable: true)]
    public ?string $sessionID;

    /**
     * `new SourceListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceListParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceListParams)->withNamespace(...)
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
        string $namespace,
        string|Omitted|null $sessionID = Omitted::VALUE,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        $self['namespace'] = $namespace;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withNamespace(string $namespace): self
    {
        $self = clone $this;
        $self['namespace'] = $namespace;

        return $self;
    }

    /**
     * The page to return, counting from 1. Bounded in depth: (page[number] - 1) * page[size] may be at most 10000.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * How many results a page holds.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * An ingested session, by the `session_id` it was ingested with. Narrows the request to the source that session was stored as.
     */
    public function withSessionID(?string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }
}
