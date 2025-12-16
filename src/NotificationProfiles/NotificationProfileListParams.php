<?php

declare(strict_types=1);

namespace Telnyx\NotificationProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationProfiles\NotificationProfileListParams\Page;

/**
 * Returns a list of your notifications profiles.
 *
 * @see Telnyx\Services\NotificationProfilesService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\NotificationProfiles\NotificationProfileListParams\Page
 *
 * @phpstan-type NotificationProfileListParamsShape = array{page?: PageShape|null}
 */
final class NotificationProfileListParams implements BaseModel
{
    /** @use SdkModel<NotificationProfileListParamsShape> */
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
     * @param PageShape $page
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
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
