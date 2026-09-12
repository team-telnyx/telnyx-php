<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\Payments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord\RecordType;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord\Status;

/**
 * An x402 payment transaction.
 *
 * @phpstan-type TransactionRecordShape = array{
 *   id?: string|null,
 *   amount?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   quoteID?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   status?: null|Status|value-of<Status>,
 *   txHash?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TransactionRecord implements BaseModel
{
    /** @use SdkModel<TransactionRecordShape> */
    use SdkModel;

    /**
     * Unique transaction identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * The transaction amount in the specified currency.
     */
    #[Optional]
    public ?string $amount;

    /**
     * ISO 8601 timestamp when the transaction was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The currency of the transaction amount (e.g. USD).
     */
    #[Optional]
    public ?string $currency;

    /**
     * The original quote ID associated with this transaction.
     */
    #[Optional('quote_id')]
    public ?string $quoteID;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * The settlement status of the transaction. x402 transactions are created after successful on-chain settlement, so the status is `settled`.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The on-chain transaction hash, if available.
     */
    #[Optional('tx_hash', nullable: true)]
    public ?string $txHash;

    /**
     * ISO 8601 timestamp when the transaction was last updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        string|Omitted|null $txHash = Omitted::VALUE,
        ?string $id = null,
        ?string $amount = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $currency = null,
        ?string $quoteID = null,
        RecordType|string|null $recordType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amount && $self['amount'] = $amount;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $quoteID && $self['quoteID'] = $quoteID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $txHash && $self['txHash'] = $txHash;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Unique transaction identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The transaction amount in the specified currency.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the transaction was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The currency of the transaction amount (e.g. USD).
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * The original quote ID associated with this transaction.
     */
    public function withQuoteID(string $quoteID): self
    {
        $self = clone $this;
        $self['quoteID'] = $quoteID;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The settlement status of the transaction. x402 transactions are created after successful on-chain settlement, so the status is `settled`.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The on-chain transaction hash, if available.
     */
    public function withTxHash(?string $txHash): self
    {
        $self = clone $this;
        $self['txHash'] = $txHash;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the transaction was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
