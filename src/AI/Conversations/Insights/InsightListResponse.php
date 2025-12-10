<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\Insights\InsightTemplate\InsightType;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightListResponseShape = array{
 *   data: list<InsightTemplate>, meta: Meta
 * }
 */
final class InsightListResponse implements BaseModel
{
    /** @use SdkModel<InsightListResponseShape> */
    use SdkModel;

    /** @var list<InsightTemplate> $data */
    #[Required(list: InsightTemplate::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new InsightListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightListResponse)->withData(...)->withMeta(...)
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
     * @param list<InsightTemplate|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   insightType?: value-of<InsightType>|null,
     *   jsonSchema?: mixed|string|null,
     *   name?: string|null,
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
     * @param list<InsightTemplate|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   instructions: string,
     *   insightType?: value-of<InsightType>|null,
     *   jsonSchema?: mixed|string|null,
     *   name?: string|null,
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
