<?php

declare(strict_types=1);

namespace Telnyx\MessagingURLDomains;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;

/**
 * List messaging URL domains.
 *
 * @see Telnyx\Services\MessagingURLDomainsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page
 *
 * @phpstan-type MessagingURLDomainListParamsShape = array{
 *   page?: null|Page|PageShape
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
