<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyAddresses;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Metadata;

/**
 * @phpstan-type dynamic_emergency_address_list_response = array{
 *   data?: list<DynamicEmergencyAddress>, meta?: Metadata
 * }
 */
final class DynamicEmergencyAddressListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<dynamic_emergency_address_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<DynamicEmergencyAddress>|null $data */
    #[Api(list: DynamicEmergencyAddress::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Metadata $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<DynamicEmergencyAddress> $data
     */
    public static function with(?array $data = null, ?Metadata $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<DynamicEmergencyAddress> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Metadata $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
