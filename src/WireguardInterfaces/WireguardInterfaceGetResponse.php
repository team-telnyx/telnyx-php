<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse\Data;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse\Data\Region;

/**
 * @phpstan-type WireguardInterfaceGetResponseShape = array{data?: Data|null}
 */
final class WireguardInterfaceGetResponse implements BaseModel
{
    /** @use SdkModel<WireguardInterfaceGetResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   enable_sip_trunking?: bool|null,
     *   endpoint?: string|null,
     *   public_key?: string|null,
     *   region?: Region|null,
     *   region_code?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   updated_at?: string|null,
     *   name?: string|null,
     *   network_id?: string|null,
     *   status?: value-of<InterfaceStatus>|null,
     *   enable_sip_trunking?: bool|null,
     *   endpoint?: string|null,
     *   public_key?: string|null,
     *   region?: Region|null,
     *   region_code?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
