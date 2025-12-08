<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountBalance\RecordType;

/**
 * @phpstan-type ManagedAccountBalanceShape = array{
 *   available_credit?: string|null,
 *   balance?: string|null,
 *   credit_limit?: string|null,
 *   currency?: string|null,
 *   record_type?: value-of<RecordType>|null,
 * }
 */
final class ManagedAccountBalance implements BaseModel
{
    /** @use SdkModel<ManagedAccountBalanceShape> */
    use SdkModel;

    /**
     * Available amount to spend (balance + credit limit).
     */
    #[Optional]
    public ?string $available_credit;

    /**
     * The account's current balance.
     */
    #[Optional]
    public ?string $balance;

    /**
     * The account's credit limit.
     */
    #[Optional]
    public ?string $credit_limit;

    /**
     * The ISO 4217 currency identifier.
     */
    #[Optional]
    public ?string $currency;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $available_credit = null,
        ?string $balance = null,
        ?string $credit_limit = null,
        ?string $currency = null,
        RecordType|string|null $record_type = null,
    ): self {
        $obj = new self;

        null !== $available_credit && $obj['available_credit'] = $available_credit;
        null !== $balance && $obj['balance'] = $balance;
        null !== $credit_limit && $obj['credit_limit'] = $credit_limit;
        null !== $currency && $obj['currency'] = $currency;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Available amount to spend (balance + credit limit).
     */
    public function withAvailableCredit(string $availableCredit): self
    {
        $obj = clone $this;
        $obj['available_credit'] = $availableCredit;

        return $obj;
    }

    /**
     * The account's current balance.
     */
    public function withBalance(string $balance): self
    {
        $obj = clone $this;
        $obj['balance'] = $balance;

        return $obj;
    }

    /**
     * The account's credit limit.
     */
    public function withCreditLimit(string $creditLimit): self
    {
        $obj = clone $this;
        $obj['credit_limit'] = $creditLimit;

        return $obj;
    }

    /**
     * The ISO 4217 currency identifier.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
