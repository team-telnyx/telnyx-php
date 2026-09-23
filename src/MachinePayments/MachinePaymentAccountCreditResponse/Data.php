<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments\MachinePaymentAccountCreditResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data\PaymentMethod;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data\PaymentSource;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data\Provider;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data\RecordType;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data\Status;

/**
 * An account-credit transaction settled through the Machine Payment Protocol.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   accountID: string,
 *   amount: string,
 *   currency: string,
 *   paymentSource: PaymentSource|value-of<PaymentSource>,
 *   recordType: RecordType|value-of<RecordType>,
 *   created?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   mppResource?: string|null,
 *   paymentIntentID?: string|null,
 *   paymentMethod?: null|PaymentMethod|value-of<PaymentMethod>,
 *   provider?: null|Provider|value-of<Provider>,
 *   receiptReference?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier of the account-credit transaction.
     */
    #[Required]
    public string $id;

    /**
     * Identifier of the credited Telnyx account. Derived from the authenticated user on the initial request and from the verified payment credential on a paid retry — never from the request body.
     */
    #[Required('account_id')]
    public string $accountID;

    /**
     * Credited amount as a decimal string with two fractional digits.
     */
    #[Required]
    public string $amount;

    /**
     * ISO 4217 currency code of the credited amount (currently always USD).
     */
    #[Required]
    public string $currency;

    /**
     * Payment source identifier distinguishing machine payments from other account-credit sources.
     *
     * @var value-of<PaymentSource> $paymentSource
     */
    #[Required('payment_source', enum: PaymentSource::class)]
    public string $paymentSource;

    /**
     * Record type identifier.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * True when this response created a new account credit, false when an existing transaction was returned for a duplicate paid retry.
     */
    #[Optional]
    public ?bool $created;

    /**
     * ISO 8601 timestamp when the transaction was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Machine Payment Protocol resource identifier the payment credential was bound to.
     */
    #[Optional('mpp_resource', nullable: true)]
    public ?string $mppResource;

    /**
     * Stripe PaymentIntent identifier for Stripe settlements. Absent for Tempo settlements.
     */
    #[Optional('payment_intent_id', nullable: true)]
    public ?string $paymentIntentID;

    /**
     * Payment method used by the provider: `stripe_spt` for Stripe Shared Payment Token payments, `tempo_usdc` for Tempo USDC payments.
     *
     * @var value-of<PaymentMethod>|null $paymentMethod
     */
    #[Optional('payment_method', enum: PaymentMethod::class, nullable: true)]
    public ?string $paymentMethod;

    /**
     * Upstream payment provider that settled the payment.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class, nullable: true)]
    public ?string $provider;

    /**
     * Provider receipt reference: the Stripe PaymentIntent identifier for Stripe settlements, or the on-chain transaction hash for Tempo settlements.
     */
    #[Optional('receipt_reference', nullable: true)]
    public ?string $receiptReference;

    /**
     * Status of the transaction. Successful machine payment credits are recorded as `settled`.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class, nullable: true)]
    public ?string $status;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   accountID: ...,
     *   amount: ...,
     *   currency: ...,
     *   paymentSource: ...,
     *   recordType: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAccountID(...)
     *   ->withAmount(...)
     *   ->withCurrency(...)
     *   ->withPaymentSource(...)
     *   ->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PaymentSource|value-of<PaymentSource> $paymentSource
     * @param RecordType|value-of<RecordType> $recordType
     * @param Omitted|PaymentMethod|value-of<PaymentMethod>|null $paymentMethod
     * @param Omitted|Provider|value-of<Provider>|null $provider
     * @param Omitted|Status|value-of<Status>|null $status
     */
    public static function with(
        string $id,
        string $accountID,
        string $amount,
        string $currency,
        PaymentSource|string $paymentSource,
        RecordType|string $recordType,
        string|Omitted|null $mppResource = Omitted::VALUE,
        string|Omitted|null $paymentIntentID = Omitted::VALUE,
        Omitted|PaymentMethod|string|null $paymentMethod = Omitted::VALUE,
        Omitted|Provider|string|null $provider = Omitted::VALUE,
        string|Omitted|null $receiptReference = Omitted::VALUE,
        Omitted|Status|string|null $status = Omitted::VALUE,
        ?bool $created = null,
        ?\DateTimeInterface $createdAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['accountID'] = $accountID;
        $self['amount'] = $amount;
        $self['currency'] = $currency;
        $self['paymentSource'] = $paymentSource;
        $self['recordType'] = $recordType;

        null !== $created && $self['created'] = $created;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        Omitted::VALUE !== $mppResource && $self['mppResource'] = $mppResource;
        Omitted::VALUE !== $paymentIntentID && $self['paymentIntentID'] = $paymentIntentID;
        Omitted::VALUE !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
        Omitted::VALUE !== $provider && $self['provider'] = $provider;
        Omitted::VALUE !== $receiptReference && $self['receiptReference'] = $receiptReference;
        Omitted::VALUE !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Unique identifier of the account-credit transaction.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Identifier of the credited Telnyx account. Derived from the authenticated user on the initial request and from the verified payment credential on a paid retry — never from the request body.
     */
    public function withAccountID(string $accountID): self
    {
        $self = clone $this;
        $self['accountID'] = $accountID;

        return $self;
    }

    /**
     * Credited amount as a decimal string with two fractional digits.
     */
    public function withAmount(string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * ISO 4217 currency code of the credited amount (currently always USD).
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Payment source identifier distinguishing machine payments from other account-credit sources.
     *
     * @param PaymentSource|value-of<PaymentSource> $paymentSource
     */
    public function withPaymentSource(PaymentSource|string $paymentSource): self
    {
        $self = clone $this;
        $self['paymentSource'] = $paymentSource;

        return $self;
    }

    /**
     * Record type identifier.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * True when this response created a new account credit, false when an existing transaction was returned for a duplicate paid retry.
     */
    public function withCreated(bool $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

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
     * Machine Payment Protocol resource identifier the payment credential was bound to.
     */
    public function withMppResource(?string $mppResource): self
    {
        $self = clone $this;
        $self['mppResource'] = $mppResource;

        return $self;
    }

    /**
     * Stripe PaymentIntent identifier for Stripe settlements. Absent for Tempo settlements.
     */
    public function withPaymentIntentID(?string $paymentIntentID): self
    {
        $self = clone $this;
        $self['paymentIntentID'] = $paymentIntentID;

        return $self;
    }

    /**
     * Payment method used by the provider: `stripe_spt` for Stripe Shared Payment Token payments, `tempo_usdc` for Tempo USDC payments.
     *
     * @param PaymentMethod|value-of<PaymentMethod>|null $paymentMethod
     */
    public function withPaymentMethod(
        PaymentMethod|string|null $paymentMethod
    ): self {
        $self = clone $this;
        $self['paymentMethod'] = $paymentMethod;

        return $self;
    }

    /**
     * Upstream payment provider that settled the payment.
     *
     * @param Provider|value-of<Provider>|null $provider
     */
    public function withProvider(Provider|string|null $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Provider receipt reference: the Stripe PaymentIntent identifier for Stripe settlements, or the on-chain transaction hash for Tempo settlements.
     */
    public function withReceiptReference(?string $receiptReference): self
    {
        $self = clone $this;
        $self['receiptReference'] = $receiptReference;

        return $self;
    }

    /**
     * Status of the transaction. Successful machine payment credits are recorded as `settled`.
     *
     * @param Status|value-of<Status>|null $status
     */
    public function withStatus(Status|string|null $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
