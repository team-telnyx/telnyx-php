<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type messaging_alias = array{enableMessaging?: bool|null}
 */
final class Messaging implements BaseModel
{
    /** @use SdkModel<messaging_alias> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Api('enable_messaging', optional: true)]
    public ?bool $enableMessaging;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enableMessaging = null): self
    {
        $obj = new self;

        null !== $enableMessaging && $obj->enableMessaging = $enableMessaging;

        return $obj;
    }

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    public function withEnableMessaging(bool $enableMessaging): self
    {
        $obj = clone $this;
        $obj->enableMessaging = $enableMessaging;

        return $obj;
    }
}
