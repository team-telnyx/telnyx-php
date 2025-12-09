<?php

declare(strict_types=1);

namespace Telnyx\Balance\BalanceGetResponse;

use Telnyx\Balance\BalanceGetResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   availableCredit?: string|null,
 *   balance?: string|null,
 *   creditLimit?: string|null,
 *   currency?: string|null,
 *   pending?: string|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Available amount to spend (balance + credit limit).
     */
    #[Optional('available_credit')]
    public ?string $availableCredit;

    /**
     * The account's current balance.
     */
    #[Optional]
    public ?string $balance;

    /**
     * The account's credit limit.
     */
    #[Optional('credit_limit')]
    public ?string $creditLimit;

    /**
     * The ISO 4217 currency identifier.
     */
    #[Optional]
    public ?string $currency;

    /**
     * The account’s pending amount.
     */
    #[Optional]
    public ?string $pending;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
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
        ?string $pending = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $availableCredit && $self['availableCredit'] = $availableCredit;
        null !== $balance && $self['balance'] = $balance;
        null !== $creditLimit && $self['creditLimit'] = $creditLimit;
        null !== $currency && $self['currency'] = $currency;
        null !== $pending && $self['pending'] = $pending;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Available amount to spend (balance + credit limit).
     */
    public function withAvailableCredit(string $availableCredit): self
    {
        $self = clone $this;
        $self['availableCredit'] = $availableCredit;

        return $self;
    }

    /**
     * The account's current balance.
     */
    public function withBalance(string $balance): self
    {
        $self = clone $this;
        $self['balance'] = $balance;

        return $self;
    }

    /**
     * The account's credit limit.
     */
    public function withCreditLimit(string $creditLimit): self
    {
        $self = clone $this;
        $self['creditLimit'] = $creditLimit;

        return $self;
    }

    /**
     * The ISO 4217 currency identifier.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * The account’s pending amount.
     */
    public function withPending(string $pending): self
    {
        $self = clone $this;
        $self['pending'] = $pending;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
