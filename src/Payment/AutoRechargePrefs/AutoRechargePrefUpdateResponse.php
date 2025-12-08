<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse\Data;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse\Data\Preference;

/**
 * @phpstan-type AutoRechargePrefUpdateResponseShape = array{data?: Data|null}
 */
final class AutoRechargePrefUpdateResponse implements BaseModel
{
    /** @use SdkModel<AutoRechargePrefUpdateResponseShape> */
    use SdkModel;

    #[Optional]
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
     *   id?: string|null,
     *   enabled?: bool|null,
     *   invoice_enabled?: bool|null,
     *   preference?: value-of<Preference>|null,
     *   recharge_amount?: string|null,
     *   record_type?: string|null,
     *   threshold_amount?: string|null,
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
     *   id?: string|null,
     *   enabled?: bool|null,
     *   invoice_enabled?: bool|null,
     *   preference?: value-of<Preference>|null,
     *   recharge_amount?: string|null,
     *   record_type?: string|null,
     *   threshold_amount?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
