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
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessagingOptoutListParams); // set properties as needed
 * $client->messagingOptouts->list(...$params->toArray());
 * ```
 * Retrieve a list of opt-out blocks.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingOptouts->list(...$params->toArray());`
 *
 * @see Telnyx\MessagingOptouts->list
 *
 * @phpstan-type messaging_optout_list_params = array{
 *   createdAt?: CreatedAt, filter?: Filter, page?: Page, redactionEnabled?: string
 * }
 */
final class MessagingOptoutListParams implements BaseModel
{
    /** @use SdkModel<messaging_optout_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    #[Api(optional: true)]
    public ?CreatedAt $createdAt;

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
    public ?string $redactionEnabled;

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
        ?CreatedAt $createdAt = null,
        ?Filter $filter = null,
        ?Page $page = null,
        ?string $redactionEnabled = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
        null !== $redactionEnabled && $obj->redactionEnabled = $redactionEnabled;

        return $obj;
    }

    /**
     * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
     */
    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * If receiving address (+E.164 formatted phone number) should be redacted.
     */
    public function withRedactionEnabled(string $redactionEnabled): self
    {
        $obj = clone $this;
        $obj->redactionEnabled = $redactionEnabled;

        return $obj;
    }
}
