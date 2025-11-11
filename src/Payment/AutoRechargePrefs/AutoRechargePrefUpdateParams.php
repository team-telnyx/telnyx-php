<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;

/**
 * Update payment auto recharge preferences.
 *
 * @see Telnyx\Payment\AutoRechargePrefs->update
 *
 * @phpstan-type AutoRechargePrefUpdateParamsShape = array{
 *   enabled?: bool,
 *   invoice_enabled?: bool,
 *   preference?: Preference|value-of<Preference>,
 *   recharge_amount?: string,
 *   threshold_amount?: string,
 * }
 */
final class AutoRechargePrefUpdateParams implements BaseModel
{
    /** @use SdkModel<AutoRechargePrefUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether auto recharge is enabled.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    #[Api(optional: true)]
    public ?bool $invoice_enabled;

    /**
     * The payment preference for auto recharge.
     *
     * @var value-of<Preference>|null $preference
     */
    #[Api(enum: Preference::class, optional: true)]
    public ?string $preference;

    /**
     * The amount to recharge the account, the actual recharge amount will be the amount necessary to reach the threshold amount plus the recharge amount.
     */
    #[Api(optional: true)]
    public ?string $recharge_amount;

    /**
     * The threshold amount at which the account will be recharged.
     */
    #[Api(optional: true)]
    public ?string $threshold_amount;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Preference|value-of<Preference> $preference
     */
    public static function with(
        ?bool $enabled = null,
        ?bool $invoice_enabled = null,
        Preference|string|null $preference = null,
        ?string $recharge_amount = null,
        ?string $threshold_amount = null,
    ): self {
        $obj = new self;

        null !== $enabled && $obj->enabled = $enabled;
        null !== $invoice_enabled && $obj->invoice_enabled = $invoice_enabled;
        null !== $preference && $obj['preference'] = $preference;
        null !== $recharge_amount && $obj->recharge_amount = $recharge_amount;
        null !== $threshold_amount && $obj->threshold_amount = $threshold_amount;

        return $obj;
    }

    /**
     * Whether auto recharge is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    public function withInvoiceEnabled(bool $invoiceEnabled): self
    {
        $obj = clone $this;
        $obj->invoice_enabled = $invoiceEnabled;

        return $obj;
    }

    /**
     * The payment preference for auto recharge.
     *
     * @param Preference|value-of<Preference> $preference
     */
    public function withPreference(Preference|string $preference): self
    {
        $obj = clone $this;
        $obj['preference'] = $preference;

        return $obj;
    }

    /**
     * The amount to recharge the account, the actual recharge amount will be the amount necessary to reach the threshold amount plus the recharge amount.
     */
    public function withRechargeAmount(string $rechargeAmount): self
    {
        $obj = clone $this;
        $obj->recharge_amount = $rechargeAmount;

        return $obj;
    }

    /**
     * The threshold amount at which the account will be recharged.
     */
    public function withThresholdAmount(string $thresholdAmount): self
    {
        $obj = clone $this;
        $obj->threshold_amount = $thresholdAmount;

        return $obj;
    }
}
