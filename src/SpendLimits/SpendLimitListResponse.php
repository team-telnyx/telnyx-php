<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpendLimits\SpendLimitListResponse\Meta;

/**
 * @phpstan-import-type SpendLimitShape from \Telnyx\SpendLimits\SpendLimit
 * @phpstan-import-type MetaShape from \Telnyx\SpendLimits\SpendLimitListResponse\Meta
 *
 * @phpstan-type SpendLimitListResponseShape = array{
 *   data: list<SpendLimit|SpendLimitShape>, meta?: null|Meta|MetaShape
 * }
 */
final class SpendLimitListResponse implements BaseModel
{
    /** @use SdkModel<SpendLimitListResponseShape> */
    use SdkModel;

    /** @var list<SpendLimit> $data */
    #[Required(list: SpendLimit::class)]
    public array $data;

    #[Optional]
    public ?Meta $meta;

    /**
     * `new SpendLimitListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendLimitListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendLimitListResponse)->withData(...)
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
     * @param list<SpendLimit|SpendLimitShape> $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(array $data, Meta|array|null $meta = null): self
    {
        $self = new self;

        $self['data'] = $data;

        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<SpendLimit|SpendLimitShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

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
}
