<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCardGetDeviceDetailsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   brandName?: string|null,
 *   deviceType?: string|null,
 *   imei?: string|null,
 *   modelName?: string|null,
 *   operatingSystem?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Optional('brand_name')]
    public ?string $brandName;

    /**
     * Type of the device where the SIM card is being used in.
     */
    #[Optional('device_type')]
    public ?string $deviceType;

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    #[Optional]
    public ?string $imei;

    /**
     * Brand of the device where the SIM card is being used in.
     */
    #[Optional('model_name')]
    public ?string $modelName;

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    #[Optional('operating_system')]
    public ?string $operatingSystem;

    #[Optional('record_type')]
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
        $self = new self;

        null !== $brandName && $self['brandName'] = $brandName;
        null !== $deviceType && $self['deviceType'] = $deviceType;
        null !== $imei && $self['imei'] = $imei;
        null !== $modelName && $self['modelName'] = $modelName;
        null !== $operatingSystem && $self['operatingSystem'] = $operatingSystem;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withBrandName(string $brandName): self
    {
        $self = clone $this;
        $self['brandName'] = $brandName;

        return $self;
    }

    /**
     * Type of the device where the SIM card is being used in.
     */
    public function withDeviceType(string $deviceType): self
    {
        $self = clone $this;
        $self['deviceType'] = $deviceType;

        return $self;
    }

    /**
     * IMEI of the device where the SIM card is being used in.
     */
    public function withImei(string $imei): self
    {
        $self = clone $this;
        $self['imei'] = $imei;

        return $self;
    }

    /**
     * Brand of the device where the SIM card is being used in.
     */
    public function withModelName(string $modelName): self
    {
        $self = clone $this;
        $self['modelName'] = $modelName;

        return $self;
    }

    /**
     * Operating system of the device where the SIM card is being used in.
     */
    public function withOperatingSystem(string $operatingSystem): self
    {
        $self = clone $this;
        $self['operatingSystem'] = $operatingSystem;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
