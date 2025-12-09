<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests;

use Telnyx\AI\Assistants\Tests\AssistantTest\Rubric;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Paginated list of assistant tests with metadata.
 *
 * Returns a subset of tests based on pagination parameters along with
 * metadata for implementing pagination controls in the UI.
 *
 * @phpstan-type TestListResponseShape = array{
 *   data: list<AssistantTest>, meta: Meta
 * }
 */
final class TestListResponse implements BaseModel
{
    /** @use SdkModel<TestListResponseShape> */
    use SdkModel;

    /**
     * Array of assistant test objects for the current page.
     *
     * @var list<AssistantTest> $data
     */
    #[Required(list: AssistantTest::class)]
    public array $data;

    /**
     * Pagination metadata including total counts and current page info.
     */
    #[Required]
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
     * @param list<AssistantTest|array{
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   rubric: list<Rubric>,
     *   telnyxConversationChannel: value-of<TelnyxConversationChannel>,
     *   testID: string,
     *   description?: string|null,
     *   destination?: string|null,
     *   instructions?: string|null,
     *   maxDurationSeconds?: int|null,
     *   testSuite?: string|null,
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
     * Array of assistant test objects for the current page.
     *
     * @param list<AssistantTest|array{
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   rubric: list<Rubric>,
     *   telnyxConversationChannel: value-of<TelnyxConversationChannel>,
     *   testID: string,
     *   description?: string|null,
     *   destination?: string|null,
     *   instructions?: string|null,
     *   maxDurationSeconds?: int|null,
     *   testSuite?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Pagination metadata including total counts and current page info.
     *
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
