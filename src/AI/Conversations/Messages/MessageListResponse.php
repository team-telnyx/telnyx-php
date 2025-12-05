<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\Role;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type MessageListResponseShape = array{data: list<Data>, meta: Meta}
 */
final class MessageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new MessageListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageListResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|array{
     *   role: value-of<Role>,
     *   text: string,
     *   created_at?: \DateTimeInterface|null,
     *   sent_at?: \DateTimeInterface|null,
     *   tool_calls?: list<ToolCall>|null,
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   role: value-of<Role>,
     *   text: string,
     *   created_at?: \DateTimeInterface|null,
     *   sent_at?: \DateTimeInterface|null,
     *   tool_calls?: list<ToolCall>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
