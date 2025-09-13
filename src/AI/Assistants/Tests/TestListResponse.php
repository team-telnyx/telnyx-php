<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of assistant tests with metadata.
 *
 * Returns a subset of tests based on pagination parameters along with
 * metadata for implementing pagination controls in the UI.
 *
 * @phpstan-type test_list_response = array{data: list<AssistantTest>, meta: Meta}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class TestListResponse implements BaseModel
{
    /** @use SdkModel<test_list_response> */
    use SdkModel;

    /**
     * Array of assistant test objects for the current page.
     *
     * @var list<AssistantTest> $data
     */
    #[Api(list: AssistantTest::class)]
    public array $data;

    /**
     * Pagination metadata including total counts and current page info.
     */
    #[Api]
    public Meta $meta;

    /**
     * `new TestListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestListResponse)->withData(...)->withMeta(...)
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
     * @param list<AssistantTest> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * Array of assistant test objects for the current page.
     *
     * @param list<AssistantTest> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    /**
     * Pagination metadata including total counts and current page info.
     */
    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
