<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Metadata;

/**
 * @phpstan-type dynamic_emergency_endpoint_list_response = array{
 *   data?: list<DynamicEmergencyEndpoint>, meta?: Metadata
 * }
 */
final class DynamicEmergencyEndpointListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<dynamic_emergency_endpoint_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<DynamicEmergencyEndpoint>|null $data */
    #[Api(list: DynamicEmergencyEndpoint::class, optional: true)]
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
     * @param list<DynamicEmergencyEndpoint> $data
     */
    public static function with(?array $data = null, ?Metadata $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<DynamicEmergencyEndpoint> $data
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
