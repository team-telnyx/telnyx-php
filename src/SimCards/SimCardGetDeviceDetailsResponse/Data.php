<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetDeviceDetailsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   brandName?: string,
 *   deviceType?: string,
 *   imei?: string,
 *   modelName?: string,
 *   operatingSystem?: string,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Api('brand_name', optional: true)]
    public ?string $brandName;

    /**
     * Type of the device where the SIM card is being used in.
     */
    #[Api('device_type', optional: true)]
    public ?string $deviceType;

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $imei;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Api('model_name', optional: true)]
    public ?string $modelName;

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    #[Api('operating_system', optional: true)]
    public ?string $operatingSystem;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $brandName = null,
        ?string $deviceType = null,
        ?string $imei = null,
        ?string $modelName = null,
        ?string $operatingSystem = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $brandName && $obj->brandName = $brandName;
        null !== $deviceType && $obj->deviceType = $deviceType;
        null !== $imei && $obj->imei = $imei;
        null !== $modelName && $obj->modelName = $modelName;
        null !== $operatingSystem && $obj->operatingSystem = $operatingSystem;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withBrandName(string $brandName): self
    {
        $obj = clone $this;
        $obj->brandName = $brandName;

        return $obj;
    }

    /**
     * Type of the device where the SIM card is being used in.
     */
    public function withDeviceType(string $deviceType): self
    {
        $obj = clone $this;
        $obj->deviceType = $deviceType;

        return $obj;
    }

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    public function withImei(string $imei): self
    {
        $obj = clone $this;
        $obj->imei = $imei;

        return $obj;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withModelName(string $modelName): self
    {
        $obj = clone $this;
        $obj->modelName = $modelName;

        return $obj;
    }

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    public function withOperatingSystem(string $operatingSystem): self
    {
        $obj = clone $this;
        $obj->operatingSystem = $operatingSystem;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
