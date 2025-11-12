<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightListParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all insights.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_Conversations\InsightsService::list()
 *
 * @phpstan-type InsightListParamsShape = array{page?: Page}
 */
final class InsightListParams implements BaseModel
{
    /** @use SdkModel<InsightListParamsShape> */
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
