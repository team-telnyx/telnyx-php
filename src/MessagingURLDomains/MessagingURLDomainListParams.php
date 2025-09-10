<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessagingURLDomainListParams); // set properties as needed
 * $client->messagingURLDomains->list(...$params->toArray());
 * ```
 * List messaging URL domains.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messagingURLDomains->list(...$params->toArray());`
 *
 * @see Telnyx\MessagingURLDomains->list
 *
 * @phpstan-type messaging_url_domain_list_params = array{page?: Page}
 */
final class MessagingURLDomainListParams implements BaseModel
{
    /** @use SdkModel<messaging_url_domain_list_params> */
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
