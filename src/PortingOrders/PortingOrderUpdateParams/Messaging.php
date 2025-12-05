<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessagingShape = array{enable_messaging?: bool|null}
 */
final class Messaging implements BaseModel
{
    /** @use SdkModel<MessagingShape> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Api(optional: true)]
    public ?bool $enable_messaging;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enable_messaging = null): self
    {
        $obj = new self;

        null !== $enable_messaging && $obj['enable_messaging'] = $enable_messaging;

        return $obj;
    }

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    public function withEnableMessaging(bool $enableMessaging): self
    {
        $obj = clone $this;
        $obj['enable_messaging'] = $enableMessaging;

        return $obj;
    }
}
