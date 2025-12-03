<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type InsightListResponseShape = array{
 *   data: list<InsightTemplate>, meta: Meta
 * }
 */
final class InsightListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InsightListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<InsightTemplate> $data */
    #[Api(list: InsightTemplate::class)]
    public array $data;

    #[Api]
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
     * @param list<InsightTemplate> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<InsightTemplate> $data
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
