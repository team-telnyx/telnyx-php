<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\AI\Assistants\Tools\ToolTestResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type tool_test_response = array{data: Data}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ToolTestResponse implements BaseModel
{
    /** @use SdkModel<tool_test_response> */
    use SdkModel;

    /**
     * Response model for webhook tool test results.
     */
    #[Api]
    public Data $data;

    /**
     * `new ToolTestResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolTestResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolTestResponse)->withData(...)
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
     */
    public static function with(Data $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * Response model for webhook tool test results.
     */
    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
