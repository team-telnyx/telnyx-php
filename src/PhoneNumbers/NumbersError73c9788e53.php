<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\NumbersError73c9788e53\Meta;
use Telnyx\PhoneNumbers\NumbersError73c9788e53\Source;

/**
 * @phpstan-import-type MetaShape from \Telnyx\PhoneNumbers\NumbersError73c9788e53\Meta
 * @phpstan-import-type SourceShape from \Telnyx\PhoneNumbers\NumbersError73c9788e53\Source
 *
 * @phpstan-type NumbersError73c9788e53Shape = array{
 *   code?: string|null,
 *   detail?: string|null,
 *   meta?: null|Meta|MetaShape,
 *   source?: null|Source|SourceShape,
 *   title?: string|null,
 * }
 */
final class NumbersError73c9788e53 implements BaseModel
{
    /** @use SdkModel<NumbersError73c9788e53Shape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $detail;

    #[Optional]
    public ?Meta $meta;

    #[Optional]
    public ?Source $source;

    #[Optional]
    public ?string $title;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Meta|MetaShape|null $meta
     * @param Source|SourceShape|null $source
     */
    public static function with(
        ?string $code = null,
        ?string $detail = null,
        Meta|array|null $meta = null,
        Source|array|null $source = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $detail && $self['detail'] = $detail;
        null !== $meta && $self['meta'] = $meta;
        null !== $source && $self['source'] = $source;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
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

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
