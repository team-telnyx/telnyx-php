<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page;

/**
 * Returns a list of your porting activation jobs.
 *
 * @see Telnyx\Services\PortingOrders\ActivationJobsService::list()
 *
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\ActivationJobs\ActivationJobListParams\Page
 *
 * @phpstan-type ActivationJobListParamsShape = array{page?: null|Page|PageShape}
 */
final class ActivationJobListParams implements BaseModel
{
    /** @use SdkModel<ActivationJobListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
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
