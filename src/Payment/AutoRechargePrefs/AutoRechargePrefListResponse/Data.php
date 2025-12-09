<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse\Data\Preference;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   enabled?: bool|null,
 *   invoiceEnabled?: bool|null,
 *   preference?: value-of<Preference>|null,
 *   rechargeAmount?: string|null,
 *   recordType?: string|null,
 *   thresholdAmount?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The unique identifier for the auto recharge preference.
     */
    #[Optional]
    public ?string $id;

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
     * The record type.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
        ?string $id = null,
        ?bool $enabled = null,
        ?bool $invoiceEnabled = null,
        Preference|string|null $preference = null,
        ?string $rechargeAmount = null,
        ?string $recordType = null,
        ?string $thresholdAmount = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $invoiceEnabled && $obj['invoiceEnabled'] = $invoiceEnabled;
        null !== $preference && $obj['preference'] = $preference;
        null !== $rechargeAmount && $obj['rechargeAmount'] = $rechargeAmount;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $thresholdAmount && $obj['thresholdAmount'] = $thresholdAmount;

        return $obj;
    }

    /**
     * The unique identifier for the auto recharge preference.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
     * The record type.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
