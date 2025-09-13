<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type insight_group_get_insight_groups_response = array{
 *   data: list<InsightTemplateGroup>, meta: Meta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class InsightGroupGetInsightGroupsResponse implements BaseModel
{
    /** @use SdkModel<insight_group_get_insight_groups_response> */
    use SdkModel;

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
