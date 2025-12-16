<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Download a porting order loa template.
 *
 * @see Telnyx\Services\PortingOrdersService::retrieveLoaTemplate()
 *
 * @phpstan-type PortingOrderRetrieveLoaTemplateParamsShape = array{
 *   loaConfigurationID?: string|null
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
    #[Optional]
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
        $self = new self;

        null !== $loaConfigurationID && $self['loaConfigurationID'] = $loaConfigurationID;

        return $self;
    }

    /**
     * The identifier of the LOA configuration to use for the template. If not provided, the default LOA configuration will be used.
     */
    public function withLoaConfigurationID(string $loaConfigurationID): self
    {
        $self = clone $this;
        $self['loaConfigurationID'] = $loaConfigurationID;

        return $self;
    }
}
