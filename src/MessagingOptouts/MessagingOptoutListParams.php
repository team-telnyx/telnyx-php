<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;

/**
 * Retrieve a list of opt-out blocks.
 *
 * @see Telnyx\Services\MessagingOptoutsService::list()
 *
 * @phpstan-type MessagingOptoutListParamsShape = array{
 *   createdAt?: CreatedAt|array{
 *     gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 *   },
 *   filter?: Filter|array{from?: string|null, messagingProfileID?: string|null},
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   redactionEnabled?: string,
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

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

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
     * @param CreatedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $createdAt
     * @param Filter|array{
     *   from?: string|null, messagingProfileID?: string|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        CreatedAt|array|null $createdAt = null,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $redactionEnabled = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $redactionEnabled && $self['redactionEnabled'] = $redactionEnabled;

        return $self;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     *
     * @param CreatedAt|array{
     *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
     * } $createdAt
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
     * @param Filter|array{
     *   from?: string|null, messagingProfileID?: string|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

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
