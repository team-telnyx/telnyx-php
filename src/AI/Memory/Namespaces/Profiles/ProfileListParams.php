<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\Profiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Profiles are never created, only written to, so this lists the ones that hold a memory. A profile whose first ingest is still running is not here yet. Ordered by memory count, largest first, so a profile written to while the listing is paged can move between pages and be repeated or missed.
 *
 * @see Telnyx\Services\AI\Memory\Namespaces\ProfilesService::list()
 *
 * @phpstan-type ProfileListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class ProfileListParams implements BaseModel
{
    /** @use SdkModel<ProfileListParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

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
}
