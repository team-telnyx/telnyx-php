<?php

declare(strict_types=1);

namespace Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse\Data\RecordType;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse\Data\TransactionProcessingType;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   amountCents?: int|null,
 *   amountCurrency?: string|null,
 *   autoRecharge?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   processorStatus?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   transactionProcessingType?: null|TransactionProcessingType|value-of<TransactionProcessingType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('amount_cents')]
    public ?int $amountCents;

    #[Optional('amount_currency')]
    public ?string $amountCurrency;

    #[Optional('auto_recharge')]
    public ?bool $autoRecharge;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('processor_status')]
    public ?string $processorStatus;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /** @var value-of<TransactionProcessingType>|null $transactionProcessingType */
    #[Optional(
        'transaction_processing_type',
        enum: TransactionProcessingType::class
    )]
    public ?string $transactionProcessingType;

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
     * @param TransactionProcessingType|value-of<TransactionProcessingType>|null $transactionProcessingType
     */
    public static function with(
        ?string $id = null,
        ?int $amountCents = null,
        ?string $amountCurrency = null,
        ?bool $autoRecharge = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $processorStatus = null,
        RecordType|string|null $recordType = null,
        TransactionProcessingType|string|null $transactionProcessingType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amountCents && $self['amountCents'] = $amountCents;
        null !== $amountCurrency && $self['amountCurrency'] = $amountCurrency;
        null !== $autoRecharge && $self['autoRecharge'] = $autoRecharge;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $processorStatus && $self['processorStatus'] = $processorStatus;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $transactionProcessingType && $self['transactionProcessingType'] = $transactionProcessingType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAmountCents(int $amountCents): self
    {
        $self = clone $this;
        $self['amountCents'] = $amountCents;

        return $self;
    }

    public function withAmountCurrency(string $amountCurrency): self
    {
        $self = clone $this;
        $self['amountCurrency'] = $amountCurrency;

        return $self;
    }

    public function withAutoRecharge(bool $autoRecharge): self
    {
        $self = clone $this;
        $self['autoRecharge'] = $autoRecharge;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withProcessorStatus(string $processorStatus): self
    {
        $self = clone $this;
        $self['processorStatus'] = $processorStatus;

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
     * @param TransactionProcessingType|value-of<TransactionProcessingType> $transactionProcessingType
     */
    public function withTransactionProcessingType(
        TransactionProcessingType|string $transactionProcessingType
    ): self {
        $self = clone $this;
        $self['transactionProcessingType'] = $transactionProcessingType;

        return $self;
    }
}
