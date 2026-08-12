<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingPaginationMeta;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Whatsapp\PhoneNumbers\PhoneNumberGetResponse\Data
 * @phpstan-import-type MessagingPaginationMetaShape from \Telnyx\MessagingPaginationMeta
 *
 * @phpstan-type PhoneNumberGetResponseShape = array{
 *   data?: list<Data|DataShape>|null,
 *   meta?: null|MessagingPaginationMeta|MessagingPaginationMetaShape,
 * }
 */
final class PhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberGetResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?MessagingPaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape>|null $data
     * @param MessagingPaginationMeta|MessagingPaginationMetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        MessagingPaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingPaginationMeta|MessagingPaginationMetaShape $meta
     */
    public function withMeta(MessagingPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
