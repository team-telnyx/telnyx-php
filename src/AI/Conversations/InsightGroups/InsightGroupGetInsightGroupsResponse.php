<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type InsightGroupGetInsightGroupsResponseShape = array{
 *   data: list<InsightTemplateGroup>, meta: Meta
 * }
 */
final class InsightGroupGetInsightGroupsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InsightGroupGetInsightGroupsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<InsightTemplateGroup> $data */
    #[Api(list: InsightTemplateGroup::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new InsightGroupGetInsightGroupsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightGroupGetInsightGroupsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightGroupGetInsightGroupsResponse)->withData(...)->withMeta(...)
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
     * @param list<InsightTemplateGroup> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<InsightTemplateGroup> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
