<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightTemplateDetailShape = array{data: InsightTemplate}
 */
final class InsightTemplateDetail implements BaseModel
{
    /** @use SdkModel<InsightTemplateDetailShape> */
    use SdkModel;

    #[Required]
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
     *
     * @param InsightTemplate|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   instructions: string,
     *   insight_type?: value-of<InsightType>|null,
     *   json_schema?: mixed|string|null,
     *   name?: string|null,
     *   webhook?: string|null,
     * } $data
     */
    public static function with(InsightTemplate|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param InsightTemplate|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   instructions: string,
     *   insight_type?: value-of<InsightType>|null,
     *   json_schema?: mixed|string|null,
     *   name?: string|null,
     *   webhook?: string|null,
     * } $data
     */
    public function withData(InsightTemplate|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
