<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;

/**
 * Update payment auto recharge preferences.
 *
 * @see Telnyx\Services\Payment\AutoRechargePrefsService::update()
 *
 * @phpstan-type AutoRechargePrefUpdateParamsShape = array{
 *   enabled?: bool,
 *   invoiceEnabled?: bool,
 *   preference?: Preference|value-of<Preference>,
 *   rechargeAmount?: string,
 *   thresholdAmount?: string,
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
    #[Optional]
    public ?bool $enabled;

    #[Optional('invoice_enabled')]
    public ?bool $invoiceEnabled;

    /**
     * The payment preference for auto recharge.
     *
     * @var value-of<Preference>|null $preference
     */
    #[Optional(enum: Preference::class)]
    public ?string $preference;

    /**
     * The amount to recharge the account, the actual recharge amount will be the amount necessary to reach the threshold amount plus the recharge amount.
     */
    #[Optional('recharge_amount')]
    public ?string $rechargeAmount;

    /**
     * The threshold amount at which the account will be recharged.
     */
    #[Optional('threshold_amount')]
    public ?string $thresholdAmount;

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
        ?bool $invoiceEnabled = null,
        Preference|string|null $preference = null,
        ?string $rechargeAmount = null,
        ?string $thresholdAmount = null,
    ): self {
        $obj = new self;

        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $invoiceEnabled && $obj['invoiceEnabled'] = $invoiceEnabled;
        null !== $preference && $obj['preference'] = $preference;
        null !== $rechargeAmount && $obj['rechargeAmount'] = $rechargeAmount;
        null !== $thresholdAmount && $obj['thresholdAmount'] = $thresholdAmount;

        return $obj;
    }

    /**
     * Whether auto recharge is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj['enabled'] = $enabled;

        return $obj;
    }

    public function withInvoiceEnabled(bool $invoiceEnabled): self
    {
        $obj = clone $this;
        $obj['invoiceEnabled'] = $invoiceEnabled;

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
        $obj['rechargeAmount'] = $rechargeAmount;

        return $obj;
    }

    /**
     * The threshold amount at which the account will be recharged.
     */
    public function withThresholdAmount(string $thresholdAmount): self
    {
        $obj = clone $this;
        $obj['thresholdAmount'] = $thresholdAmount;

        return $obj;
    }
}
