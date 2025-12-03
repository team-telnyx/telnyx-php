<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Meta;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Metadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AvailablePhoneNumberListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null, metadata?: Metadata|null
 * }
 */
final class AvailablePhoneNumberListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AvailablePhoneNumberListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    #[Api(optional: true)]
    public ?Metadata $metadata;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data> $data
     */
    public static function with(
        ?array $data = null,
        ?Meta $meta = null,
        ?Metadata $metadata = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;
        null !== $metadata && $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }
}
