<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools;

use Telnyx\AI\Assistants\Tools\ToolTestResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type ToolTestResponseShape = array{data: Data}
 */
final class ToolTestResponse implements BaseModel
{
    /** @use SdkModel<ToolTestResponseShape> */
    use SdkModel;

    /**
     * Response model for webhook tool test results.
     */
    #[Required]
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
     *   contentType: string,
     *   request: array<string,mixed>,
     *   response: string,
     *   statusCode: int,
     *   success: bool,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Response model for webhook tool test results.
     *
     * @param Data|array{
     *   contentType: string,
     *   request: array<string,mixed>,
     *   response: string,
     *   statusCode: int,
     *   success: bool,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
