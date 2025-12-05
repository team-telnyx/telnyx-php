<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools\ToolTestResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type DataShape = array{
 *   content_type: string,
 *   request: array<string,mixed>,
 *   response: string,
 *   status_code: int,
 *   success: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $content_type;

    /** @var array<string,mixed> $request */
    #[Api(map: 'mixed')]
    public array $request;

    #[Api]
    public string $response;

    #[Api]
    public int $status_code;

    #[Api]
    public bool $success;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   content_type: ..., request: ..., response: ..., status_code: ..., success: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withContentType(...)
     *   ->withRequest(...)
     *   ->withResponse(...)
     *   ->withStatusCode(...)
     *   ->withSuccess(...)
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
     * @param array<string,mixed> $request
     */
    public static function with(
        string $content_type,
        array $request,
        string $response,
        int $status_code,
        bool $success,
    ): self {
        $obj = new self;

        $obj['content_type'] = $content_type;
        $obj['request'] = $request;
        $obj['response'] = $response;
        $obj['status_code'] = $status_code;
        $obj['success'] = $success;

        return $obj;
    }

    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['content_type'] = $contentType;

        return $obj;
    }

    /**
     * @param array<string,mixed> $request
     */
    public function withRequest(array $request): self
    {
        $obj = clone $this;
        $obj['request'] = $request;

        return $obj;
    }

    public function withResponse(string $response): self
    {
        $obj = clone $this;
        $obj['response'] = $response;

        return $obj;
    }

    public function withStatusCode(int $statusCode): self
    {
        $obj = clone $this;
        $obj['status_code'] = $statusCode;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
