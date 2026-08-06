<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\Webhooks\WebhookListParams\Sort;

/**
 * Returns a paginated list of webhook subscriptions scoped to the email domain. Results can be sorted by creation time.
 *
 * @see Telnyx\Services\EmailDomains\WebhooksService::list()
 *
 * @phpstan-type WebhookListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null, sort?: null|Sort|value-of<Sort>
 * }
 */
final class WebhookListParams implements BaseModel
{
    /** @use SdkModel<WebhookListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number to return (offset pagination).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of records per page.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Field to sort by. Prefix with `-` for descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Page number to return (offset pagination).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of records per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Field to sort by. Prefix with `-` for descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
