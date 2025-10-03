<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type insight_template_group_detail = array{data: InsightTemplateGroup}
 */
final class InsightTemplateGroupDetail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<insight_template_group_detail> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public InsightTemplateGroup $data;

    /**
     * `new InsightTemplateGroupDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplateGroupDetail::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplateGroupDetail)->withData(...)
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
    public static function with(InsightTemplateGroup $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(InsightTemplateGroup $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
