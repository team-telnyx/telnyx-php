<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools\ToolTestResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type data_alias = array{
 *   contentType: string,
 *   request: array<string, mixed>,
 *   response: string,
 *   statusCode: int,
 *   success: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('content_type')]
    public string $contentType;

    /** @var array<string, mixed> $request */
    #[Api(map: 'mixed')]
    public array $request;

    #[Api]
    public string $response;

    #[Api('status_code')]
    public int $statusCode;

    #[Api]
    public bool $success;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   contentType: ..., request: ..., response: ..., statusCode: ..., success: ...
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
     * @param array<string, mixed> $request
     */
    public static function with(
        string $contentType,
        array $request,
        string $response,
        int $statusCode,
        bool $success,
    ): self {
        $obj = new self;

        $obj->contentType = $contentType;
        $obj->request = $request;
        $obj->response = $response;
        $obj->statusCode = $statusCode;
        $obj->success = $success;

        return $obj;
    }

    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * @param array<string, mixed> $request
     */
    public function withRequest(array $request): self
    {
        $obj = clone $this;
        $obj->request = $request;

        return $obj;
    }

    public function withResponse(string $response): self
    {
        $obj = clone $this;
        $obj->response = $response;

        return $obj;
    }

    public function withStatusCode(int $statusCode): self
    {
        $obj = clone $this;
        $obj->statusCode = $statusCode;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }
}
