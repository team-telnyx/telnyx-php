<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PortingOrderRetrieveLoaTemplateParams); // set properties as needed
 * $client->portingOrders->retrieveLoaTemplate(...$params->toArray());
 * ```
 * Download a porting order loa template.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->portingOrders->retrieveLoaTemplate(...$params->toArray());`
 *
 * @see Telnyx\PortingOrders->retrieveLoaTemplate
 *
 * @phpstan-type porting_order_retrieve_loa_template_params = array{
 *   loaConfigurationID?: string
 * }
 */
final class PortingOrderRetrieveLoaTemplateParams implements BaseModel
{
    /** @use SdkModel<porting_order_retrieve_loa_template_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     */
    #[Api(optional: true)]
    public ?string $loaConfigurationID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $loaConfigurationID = null): self
    {
        $obj = new self;

        null !== $loaConfigurationID && $obj->loaConfigurationID = $loaConfigurationID;

        return $obj;
    }

    /**
     * The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     */
    public function withLoaConfigurationID(string $loaConfigurationID): self
    {
        $obj = clone $this;
        $obj->loaConfigurationID = $loaConfigurationID;

        return $obj;
    }
}
