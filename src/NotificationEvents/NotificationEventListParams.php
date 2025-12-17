<?php

declare(strict_types=1);

namespace Telnyx\NotificationEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEvents\NotificationEventListParams\Page;

/**
 * Returns a list of your notifications events.
 *
 * @see Telnyx\Services\NotificationEventsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\NotificationEvents\NotificationEventListParams\Page
 *
 * @phpstan-type NotificationEventListParamsShape = array{
 *   page?: null|Page|PageShape
 * }
 */
final class NotificationEventListParams implements BaseModel
{
    /** @use SdkModel<NotificationEventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Page|PageShape|null $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
