<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;
use Telnyx\AvailablePhoneNumbersMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data
 * @phpstan-import-type AvailablePhoneNumbersMetadataShape from \Telnyx\AvailablePhoneNumbersMetadata
 *
 * @phpstan-type AvailablePhoneNumberListResponseShape = array{
 *   data?: list<DataShape>|null,
 *   meta?: null|AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape,
 *   metadata?: null|AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape,
 * }
 */
final class AvailablePhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?AvailablePhoneNumbersMetadata $meta;

    #[Optional]
    public ?AvailablePhoneNumbersMetadata $metadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DataShape>|null $data
     * @param AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape|null $meta
     * @param AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape|null $metadata
     */
    public static function with(
        ?array $data = null,
        AvailablePhoneNumbersMetadata|array|null $meta = null,
        AvailablePhoneNumbersMetadata|array|null $metadata = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;
        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param list<DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape $meta
     */
    public function withMeta(AvailablePhoneNumbersMetadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param AvailablePhoneNumbersMetadata|AvailablePhoneNumbersMetadataShape $metadata
     */
    public function withMetadata(
        AvailablePhoneNumbersMetadata|array $metadata
    ): self {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
