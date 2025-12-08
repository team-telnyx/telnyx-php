<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpoint\Status;
use Telnyx\Metadata;

/**
 * @phpstan-type DynamicEmergencyEndpointListResponseShape = array{
 *   data?: list<DynamicEmergencyEndpoint>|null, meta?: Metadata|null
 * }
 */
final class DynamicEmergencyEndpointListResponse implements BaseModel
{
    /** @use SdkModel<DynamicEmergencyEndpointListResponseShape> */
    use SdkModel;

    /** @var list<DynamicEmergencyEndpoint>|null $data */
    #[Optional(list: DynamicEmergencyEndpoint::class)]
    public ?array $data;

    #[Optional]
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
     * @param list<DynamicEmergencyEndpoint|array{
     *   callback_number: string,
     *   caller_name: string,
     *   dynamic_emergency_address_id: string,
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   sip_from_id?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * }> $data
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<DynamicEmergencyEndpoint|array{
     *   callback_number: string,
     *   caller_name: string,
     *   dynamic_emergency_address_id: string,
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   sip_from_id?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
