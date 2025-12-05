<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCards\SimCardGetDeviceDetailsResponse\Data;

/**
 * @phpstan-type SimCardGetDeviceDetailsResponseShape = array{data?: Data|null}
 */
final class SimCardGetDeviceDetailsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SimCardGetDeviceDetailsResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     *   brand_name?: string|null,
     *   device_type?: string|null,
     *   imei?: string|null,
     *   model_name?: string|null,
     *   operating_system?: string|null,
     *   record_type?: string|null,
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
     *   brand_name?: string|null,
     *   device_type?: string|null,
     *   imei?: string|null,
     *   model_name?: string|null,
     *   operating_system?: string|null,
     *   record_type?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
