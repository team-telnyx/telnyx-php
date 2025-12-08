<?php

declare(strict_types=1);

namespace Telnyx\PublicInternetGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse\Data;

/**
 * @phpstan-type PublicInternetGatewayGetResponseShape = array{data?: Data|null}
 */
final class PublicInternetGatewayGetResponse implements BaseModel
{
    /** @use SdkModel<PublicInternetGatewayGetResponseShape> */
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
     *   public_ip?: string|null,
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
     *   public_ip?: string|null,
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
