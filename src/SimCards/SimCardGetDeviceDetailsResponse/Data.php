<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetDeviceDetailsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   brand_name?: string|null,
 *   device_type?: string|null,
 *   imei?: string|null,
 *   model_name?: string|null,
 *   operating_system?: string|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $brand_name;

    /**
     * Type of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $device_type;

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $imei;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $model_name;

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    #[Api(optional: true)]
    public ?string $operating_system;

    #[Api(optional: true)]
    public ?string $record_type;

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
        ?string $brand_name = null,
        ?string $device_type = null,
        ?string $imei = null,
        ?string $model_name = null,
        ?string $operating_system = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $brand_name && $obj['brand_name'] = $brand_name;
        null !== $device_type && $obj['device_type'] = $device_type;
        null !== $imei && $obj['imei'] = $imei;
        null !== $model_name && $obj['model_name'] = $model_name;
        null !== $operating_system && $obj['operating_system'] = $operating_system;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withBrandName(string $brandName): self
    {
        $obj = clone $this;
        $obj['brand_name'] = $brandName;

        return $obj;
    }

    /**
     * Type of the device where the SIM card is being used in.
     */
    public function withDeviceType(string $deviceType): self
    {
        $obj = clone $this;
        $obj['device_type'] = $deviceType;

        return $obj;
    }

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    public function withImei(string $imei): self
    {
        $obj = clone $this;
        $obj['imei'] = $imei;

        return $obj;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withModelName(string $modelName): self
    {
        $obj = clone $this;
        $obj['model_name'] = $modelName;

        return $obj;
    }

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    public function withOperatingSystem(string $operatingSystem): self
    {
        $obj = clone $this;
        $obj['operating_system'] = $operatingSystem;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
