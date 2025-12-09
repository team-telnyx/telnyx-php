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
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $redactionEnabled && $obj['redactionEnabled'] = $redactionEnabled;

        return $obj;
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
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
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
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * If receiving address (+E.164 formatted phone number) should be redacted.
     */
    public function withRedactionEnabled(string $redactionEnabled): self
    {
        $obj = clone $this;
        $obj['redactionEnabled'] = $redactionEnabled;

        return $obj;
    }
}
