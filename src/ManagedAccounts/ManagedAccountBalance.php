<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountBalance\RecordType;

/**
 * @phpstan-type managed_account_balance = array{
 *   availableCredit?: string|null,
 *   balance?: string|null,
 *   creditLimit?: string|null,
 *   currency?: string|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class ManagedAccountBalance implements BaseModel
{
    /** @use SdkModel<managed_account_balance> */
    use SdkModel;

    /**
     * Available amount to spend (balance + credit limit).
     */
    #[Api('available_credit', optional: true)]
    public ?string $availableCredit;

    /**
     * The account's current balance.
     */
    #[Api(optional: true)]
    public ?string $balance;

    /**
     * The account's credit limit.
     */
    #[Api('credit_limit', optional: true)]
    public ?string $creditLimit;

    /**
     * The ISO 4217 currency identifier.
     */
    #[Api(optional: true)]
    public ?string $currency;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $availableCredit = null,
        ?string $balance = null,
        ?string $creditLimit = null,
        ?string $currency = null,
        RecordType|string|null $recordType = null,
    ): self {
        $obj = new self;

        null !== $availableCredit && $obj->availableCredit = $availableCredit;
        null !== $balance && $obj->balance = $balance;
        null !== $creditLimit && $obj->creditLimit = $creditLimit;
        null !== $currency && $obj->currency = $currency;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * Available amount to spend (balance + credit limit).
     */
    public function withAvailableCredit(string $availableCredit): self
    {
        $obj = clone $this;
        $obj->availableCredit = $availableCredit;

        return $obj;
    }

    /**
     * The account's current balance.
     */
    public function withBalance(string $balance): self
    {
        $obj = clone $this;
        $obj->balance = $balance;

        return $obj;
    }

    /**
     * The account's credit limit.
     */
    public function withCreditLimit(string $creditLimit): self
    {
        $obj = clone $this;
        $obj->creditLimit = $creditLimit;

        return $obj;
    }

    /**
     * The ISO 4217 currency identifier.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }
}
