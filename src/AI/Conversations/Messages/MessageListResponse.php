<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type message_list_response = array{data: list<Data>, meta: Meta}
 */
final class MessageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<message_list_response> */
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
     * @param list<Data> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Data> $data
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
