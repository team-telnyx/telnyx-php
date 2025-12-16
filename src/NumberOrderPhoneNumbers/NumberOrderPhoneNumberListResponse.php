<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumberOrderPhoneNumberShape from \Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber
 * @phpstan-import-type PaginationMetaShape from \Telnyx\AuthenticationProviders\PaginationMeta
 *
 * @phpstan-type NumberOrderPhoneNumberListResponseShape = array{
 *   data?: list<NumberOrderPhoneNumberShape>|null,
 *   meta?: null|PaginationMeta|PaginationMetaShape,
 * }
 */
final class NumberOrderPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<NumberOrderPhoneNumber>|null $data */
    #[Optional(list: NumberOrderPhoneNumber::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<NumberOrderPhoneNumberShape> $data
     * @param PaginationMetaShape $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<NumberOrderPhoneNumberShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMetaShape $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
