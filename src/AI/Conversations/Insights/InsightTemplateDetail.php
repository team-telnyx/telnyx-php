<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type insight_template_detail = array{data: InsightTemplate}
 */
final class InsightTemplateDetail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<insight_template_detail> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public InsightTemplate $data;

    /**
     * `new InsightTemplateDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplateDetail::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplateDetail)->withData(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(InsightTemplate $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(InsightTemplate $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
