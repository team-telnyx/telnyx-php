<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tools\ToolTestResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for webhook tool test results.
 *
 * @phpstan-type DataShape = array{
 *   contentType: string,
 *   request: array<string,mixed>,
 *   response: string,
 *   statusCode: int,
 *   success: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('content_type')]
    public string $contentType;

    /** @var array<string,mixed> $request */
    #[Required(map: 'mixed')]
    public array $request;

    #[Required]
    public string $response;

    #[Required('status_code')]
    public int $statusCode;

    #[Required]
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
     * @param array<string,mixed> $request
     */
    public static function with(
        string $contentType,
        array $request,
        string $response,
        int $statusCode,
        bool $success,
    ): self {
        $self = new self;

        $self['contentType'] = $contentType;
        $self['request'] = $request;
        $self['response'] = $response;
        $self['statusCode'] = $statusCode;
        $self['success'] = $success;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * @param array<string,mixed> $request
     */
    public function withRequest(array $request): self
    {
        $self = clone $this;
        $self['request'] = $request;

        return $self;
    }

    public function withResponse(string $response): self
    {
        $self = clone $this;
        $self['response'] = $response;

        return $self;
    }

    public function withStatusCode(int $statusCode): self
    {
        $self = clone $this;
        $self['statusCode'] = $statusCode;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
