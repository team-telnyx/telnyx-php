<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\Insights\InsightTemplate;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightGroupGetInsightGroupsResponseShape = array{
 *   data: list<InsightTemplateGroup>, meta: Meta
 * }
 */
final class InsightGroupGetInsightGroupsResponse implements BaseModel
{
    /** @use SdkModel<InsightGroupGetInsightGroupsResponseShape> */
    use SdkModel;

    /** @var list<InsightTemplateGroup> $data */
    #[Required(list: InsightTemplateGroup::class)]
    public array $data;

    #[Required]
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
     * @param list<InsightTemplateGroup|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   description?: string|null,
     *   insights?: list<InsightTemplate>|null,
     *   webhook?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<InsightTemplateGroup|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   description?: string|null,
     *   insights?: list<InsightTemplate>|null,
     *   webhook?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
