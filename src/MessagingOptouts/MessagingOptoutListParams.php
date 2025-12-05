<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts;

use Telnyx\Core\Attributes\Api;
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
 *   created_at?: CreatedAt|array{
 *     gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 *   },
 *   filter?: Filter|array{from?: string|null, messaging_profile_id?: string|null},
 *   page?: Page|array{number?: int|null, size?: int|null},
 *   redaction_enabled?: string,
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
    #[Api(optional: true)]
    public ?CreatedAt $created_at;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    /**
     * If receiving address (+E.164 formatted phone number) should be redacted.
     */
    #[Api(optional: true)]
    public ?string $redaction_enabled;

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
     * } $created_at
     * @param Filter|array{
     *   from?: string|null, messaging_profile_id?: string|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        CreatedAt|array|null $created_at = null,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $redaction_enabled = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $redaction_enabled && $obj['redaction_enabled'] = $redaction_enabled;

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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
     *
     * @param Filter|array{
     *   from?: string|null, messaging_profile_id?: string|null
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
        $obj['redaction_enabled'] = $redactionEnabled;

        return $obj;
    }
}
