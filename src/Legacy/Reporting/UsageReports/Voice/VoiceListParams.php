<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Fetch all previous requests for cdr usage reports.
 *
 * @see Telnyx\STAINLESS_FIXME_Legacy\STAINLESS_FIXME_Reporting\STAINLESS_FIXME_UsageReports\VoiceService::list()
 *
 * @phpstan-type VoiceListParamsShape = array{page?: int, per_page?: int}
 */
final class VoiceListParams implements BaseModel
{
    /** @use SdkModel<VoiceListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * Size of the page.
     */
    #[Api(optional: true)]
    public ?int $per_page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $page = null, ?int $per_page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $per_page && $obj->per_page = $per_page;

        return $obj;
    }

    /**
     * Page number.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * Size of the page.
     */
    public function withPerPage(int $perPage): self
    {
        $obj = clone $this;
        $obj->per_page = $perPage;

        return $obj;
    }
}
