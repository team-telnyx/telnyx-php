<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles\Memories;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Everything stored under one profile, unranked -- ask `recall` for the memories that answer a question. A profile that holds nothing is an empty page rather than a 404: profiles exist by being written to. Each memory names the `source_id` it was extracted from, or null for a memory derived from other memories -- which can read almost the same as the fact it restates. A `source_id` narrows the listing to the memories extracted from that source, and a `session_id` to those extracted from the session, which is the same thing named another way; pass one or the other. Neither is everything the source led to: a memory derived from several sources belongs to no single one and appears only in the unfiltered listing. A memory written while the listing is paged shifts the pages after it, so an entry can be repeated or missed at a page boundary.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\Profiles\MemoriesService::list()
 *
 * @phpstan-type MemoryListParamsShape = array{
 *   namespace: string,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   sessionID?: string|null,
 *   sourceID?: string|null,
 * }
 */
final class MemoryListParams implements BaseModel
{
    /** @use SdkModel<MemoryListParamsShape> */
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
     * Narrows the listing to the memories extracted from one source, a remembered fact as well as a session. Pass this or `session_id`, not both.
     */
    #[Optional(nullable: true)]
    public ?string $sourceID;

    /**
     * `new MemoryListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MemoryListParams::with(namespace: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MemoryListParams)->withNamespace(...)
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
        string|Omitted|null $sourceID = Omitted::VALUE,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        $self['namespace'] = $namespace;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        Omitted::VALUE !== $sessionID && $self['sessionID'] = $sessionID;
        Omitted::VALUE !== $sourceID && $self['sourceID'] = $sourceID;

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

    /**
     * Narrows the listing to the memories extracted from one source, a remembered fact as well as a session. Pass this or `session_id`, not both.
     */
    public function withSourceID(?string $sourceID): self
    {
        $self = clone $this;
        $self['sourceID'] = $sourceID;

        return $self;
    }
}
