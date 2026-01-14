<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;

/**
 * Retrieve a list of opt-out blocks.
 *
 * @see Telnyx\Services\MessagingOptoutsService::list()
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt
 * @phpstan-import-type FilterShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter
 *
 * @phpstan-type MessagingOptoutListParamsShape = array{
 *   createdAt?: null|CreatedAt|CreatedAtShape,
 *   filter?: null|Filter|FilterShape,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   redactionEnabled?: string|null,
 * }
 */
final class MessagingOptoutListParams implements BaseModel
{
    /** @use SdkModel<MessagingOptoutListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Optional]
    public ?CreatedAt $createdAt;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
     */
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * If receiving address (+E.164 formatted phone number) should be redacted.
     */
    #[Optional]
    public ?string $redactionEnabled;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CreatedAt|CreatedAtShape|null $createdAt
     * @param Filter|FilterShape|null $filter
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $redactionEnabled = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $filter && $self['filter'] = $filter;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $redactionEnabled && $self['redactionEnabled'] = $redactionEnabled;

        return $self;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     *
     * @param CreatedAt|CreatedAtShape $createdAt
     */
    public function withCreatedAt(CreatedAt|array $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * If receiving address (+E.164 formatted phone number) should be redacted.
     */
    public function withRedactionEnabled(string $redactionEnabled): self
    {
        $self = clone $this;
        $self['redactionEnabled'] = $redactionEnabled;

        return $self;
    }
}
