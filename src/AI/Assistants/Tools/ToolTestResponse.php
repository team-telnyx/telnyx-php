<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\AI\Assistants\Tools\ToolTestResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type ToolTestResponseShape = array{data: Data}
 */
final class ToolTestResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ToolTestResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     *
     * @param Data|array{
     *   content_type: string,
     *   request: array<string,mixed>,
     *   response: string,
     *   status_code: int,
     *   success: bool,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * Response model for webhook tool test results.
     *
     * @param Data|array{
     *   content_type: string,
     *   request: array<string,mixed>,
     *   response: string,
     *   status_code: int,
     *   success: bool,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
