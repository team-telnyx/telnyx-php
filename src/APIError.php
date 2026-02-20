<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\APIError\Source;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SourceShape from \Telnyx\APIError\Source
 *
 * @phpstan-type APIErrorShape = array{
 *   code: string,
 *   title: string,
 *   description?: string|null,
 *   meta?: array<string,mixed>|null,
 *   source?: null|Source|SourceShape,
 * }
 */
final class APIError implements BaseModel
{
    /** @use SdkModel<APIErrorShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required]
    public string $title;

    #[Optional]
    public ?string $description;

    /** @var array<string,mixed>|null $meta */
    #[Optional(map: 'mixed')]
    public ?array $meta;

    #[Optional]
    public ?Source $source;

    /**
     * `new APIError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIError::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIError)->withCode(...)->withTitle(...)
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
     * @param array<string,mixed>|null $meta
     * @param Source|SourceShape|null $source
     */
    public static function with(
        string $code,
        string $title,
        ?string $description = null,
        ?array $meta = null,
        Source|array|null $source = null,
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['title'] = $title;

        null !== $description && $self['description'] = $description;
        null !== $meta && $self['meta'] = $meta;
        null !== $source && $self['source'] = $source;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param array<string,mixed> $meta
     */
    public function withMeta(array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Source|SourceShape $source
     */
    public function withSource(Source|array $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
