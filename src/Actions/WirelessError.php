<?php

declare(strict_types=1);

namespace Telnyx\Actions;

use Telnyx\Actions\WirelessError\Source;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SourceShape from \Telnyx\Actions\WirelessError\Source
 *
 * @phpstan-type WirelessErrorShape = array{
 *   code: string,
 *   title: string,
 *   detail?: string|null,
 *   meta?: array<string,mixed>|null,
 *   source?: null|Source|SourceShape,
 * }
 */
final class WirelessError implements BaseModel
{
    /** @use SdkModel<WirelessErrorShape> */
    use SdkModel;

    #[Required]
    public string $code;

    #[Required]
    public string $title;

    #[Optional]
    public ?string $detail;

    /** @var array<string,mixed>|null $meta */
    #[Optional(map: 'mixed')]
    public ?array $meta;

    #[Optional]
    public ?Source $source;

    /**
     * `new WirelessError()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WirelessError::with(code: ..., title: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WirelessError)->withCode(...)->withTitle(...)
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
        ?string $detail = null,
        ?array $meta = null,
        Source|array|null $source = null,
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['title'] = $title;

        null !== $detail && $self['detail'] = $detail;
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

    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

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
