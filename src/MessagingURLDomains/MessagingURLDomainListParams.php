<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;

/**
 * List messaging URL domains.
 *
 * @see Telnyx\Services\MessagingURLDomainsService::list()
 *
 * @phpstan-type MessagingURLDomainListParamsShape = array{
 *   page?: Page|array{number?: int|null, size?: int|null}
 * }
 */
final class MessagingURLDomainListParams implements BaseModel
{
    /** @use SdkModel<MessagingURLDomainListParamsShape> */
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
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $obj = new self;

        null !== $page && $obj['page'] = $page;

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
}
