<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type insight_template_detail = array{data: InsightTemplate}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class InsightTemplateDetail implements BaseModel
{
    /** @use SdkModel<insight_template_detail> */
    use SdkModel;

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
