<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Download a porting order loa template.
 *
 * @see Telnyx\Services\PortingOrdersService::retrieveLoaTemplate()
 *
 * @phpstan-type PortingOrderRetrieveLoaTemplateParamsShape = array{
 *   loa_configuration_id?: string
 * }
 */
final class PortingOrderRetrieveLoaTemplateParams implements BaseModel
{
    /** @use SdkModel<PortingOrderRetrieveLoaTemplateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     */
    #[Api(optional: true)]
    public ?string $loa_configuration_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $loa_configuration_id = null): self
    {
        $obj = new self;

        null !== $loa_configuration_id && $obj['loa_configuration_id'] = $loa_configuration_id;

        return $obj;
    }

    /**
     * The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     */
    public function withLoaConfigurationID(string $loaConfigurationID): self
    {
        $obj = clone $this;
        $obj['loa_configuration_id'] = $loaConfigurationID;

        return $obj;
    }
}
