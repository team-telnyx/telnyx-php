<?php

declare(strict_types=1);

namespace Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse\Data\Preference;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   enabled?: bool|null,
 *   invoice_enabled?: bool|null,
 *   preference?: value-of<Preference>|null,
 *   recharge_amount?: string|null,
 *   record_type?: string|null,
 *   threshold_amount?: string|null,
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

    #[Optional]
    public ?bool $invoice_enabled;

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
    #[Optional]
    public ?string $recharge_amount;

    /**
     * The record type.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * The threshold amount at which the account will be recharged.
     */
    #[Optional]
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
        ?string $id = null,
        ?bool $enabled = null,
        ?bool $invoice_enabled = null,
        Preference|string|null $preference = null,
        ?string $recharge_amount = null,
        ?string $record_type = null,
        ?string $threshold_amount = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $invoice_enabled && $obj['invoice_enabled'] = $invoice_enabled;
        null !== $preference && $obj['preference'] = $preference;
        null !== $recharge_amount && $obj['recharge_amount'] = $recharge_amount;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $threshold_amount && $obj['threshold_amount'] = $threshold_amount;

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
        $obj['invoice_enabled'] = $invoiceEnabled;

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
        $obj['recharge_amount'] = $rechargeAmount;

        return $obj;
    }

    /**
     * The record type.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The threshold amount at which the account will be recharged.
     */
    public function withThresholdAmount(string $thresholdAmount): self
    {
        $obj = clone $this;
        $obj['threshold_amount'] = $thresholdAmount;

        return $obj;
    }
}
