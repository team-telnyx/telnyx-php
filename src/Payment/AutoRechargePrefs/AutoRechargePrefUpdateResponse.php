<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse\Data;

/**
 * @phpstan-type auto_recharge_pref_update_response = array{data?: Data|null}
 */
final class AutoRechargePrefUpdateResponse implements BaseModel
{
    /** @use SdkModel<auto_recharge_pref_update_response> */
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
     */
    public static function with(?Data $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Data $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
