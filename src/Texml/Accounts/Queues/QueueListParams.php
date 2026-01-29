<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Queues;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists queue resources.
 *
 * @see Telnyx\Services\Texml\Accounts\QueuesService::list()
 *
 * @phpstan-type QueueListParamsShape = array{
 *   dateCreated?: string|null,
 *   dateUpdated?: string|null,
 *   page?: int|null,
 *   pageSize?: int|null,
 *   pageToken?: string|null,
 * }
 */
final class QueueListParams implements BaseModel
{
    /** @use SdkModel<QueueListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    #[Optional]
    public ?string $dateCreated;

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    #[Optional]
    public ?string $dateUpdated;

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    #[Optional]
    public ?int $page;

    /**
     * The number of records to be displayed on a page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Used to request the next page of results.
     */
    #[Optional]
    public ?string $pageToken;

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
        ?string $dateCreated = null,
        ?string $dateUpdated = null,
        ?int $page = null,
        ?int $pageSize = null,
        ?string $pageToken = null,
    ): self {
        $self = new self;

        null !== $dateCreated && $self['dateCreated'] = $dateCreated;
        null !== $dateUpdated && $self['dateUpdated'] = $dateUpdated;
        null !== $page && $self['page'] = $page;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageToken && $self['pageToken'] = $pageToken;

        return $self;
    }

    /**
     * Filters conferences by the creation date. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateCreated>=2023-05-22.
     */
    public function withDateCreated(string $dateCreated): self
    {
        $self = clone $this;
        $self['dateCreated'] = $dateCreated;

        return $self;
    }

    /**
     * Filters conferences by the time they were last updated. Expected format is YYYY-MM-DD. Also accepts inequality operators, e.g. DateUpdated>=2023-05-22.
     */
    public function withDateUpdated(string $dateUpdated): self
    {
        $self = clone $this;
        $self['dateUpdated'] = $dateUpdated;

        return $self;
    }

    /**
     * The number of the page to be displayed, zero-indexed, should be used in conjuction with PageToken.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * The number of records to be displayed on a page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Used to request the next page of results.
     */
    public function withPageToken(string $pageToken): self
    {
        $self = clone $this;
        $self['pageToken'] = $pageToken;

        return $self;
    }
}
