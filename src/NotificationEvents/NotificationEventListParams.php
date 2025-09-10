<?php

declare(strict_types=1);

namespace Telnyx\NotificationEvents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NotificationEvents\NotificationEventListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new NotificationEventListParams); // set properties as needed
 * $client->notificationEvents->list(...$params->toArray());
 * ```
 * Returns a list of your notifications events.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->notificationEvents->list(...$params->toArray());`
 *
 * @see Telnyx\NotificationEvents->list
 *
 * @phpstan-type notification_event_list_params = array{page?: Page}
 */
final class NotificationEventListParams implements BaseModel
{
    /** @use SdkModel<notification_event_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Page $page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;

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
}
