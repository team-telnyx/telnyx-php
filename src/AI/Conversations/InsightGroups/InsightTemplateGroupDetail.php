<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type InsightTemplateGroupDetailShape = array{
 *   data: InsightTemplateGroup
 * }
 */
final class InsightTemplateGroupDetail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InsightTemplateGroupDetailShape> */
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
     *
     * @param InsightTemplateGroup|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   name: string,
     *   description?: string|null,
     *   insights?: list<InsightTemplate>|null,
     *   webhook?: string|null,
     * } $data
     */
    public static function with(InsightTemplateGroup|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param InsightTemplateGroup|array{
     *   id: string,
     *   created_at: \DateTimeInterface,
     *   name: string,
     *   description?: string|null,
     *   insights?: list<InsightTemplate>|null,
     *   webhook?: string|null,
     * } $data
     */
    public function withData(InsightTemplateGroup|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
