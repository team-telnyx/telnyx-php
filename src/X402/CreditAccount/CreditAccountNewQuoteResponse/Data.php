<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\RecordType;

/**
 * @phpstan-import-type PaymentRequirementsShape from \Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse\Data\PaymentRequirements
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   amountCrypto?: string|null,
 *   amountUsd?: string|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   network?: string|null,
 *   paymentRequirements?: null|PaymentRequirements|PaymentRequirementsShape,
 *   recordType?: null|RecordType|value-of<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique quote identifier. Use this to settle the payment.
     */
    #[Optional]
    public ?string $id;

    /**
     * The equivalent amount in the payment cryptocurrency's smallest unit (e.g. USDC has 6 decimals, so $50.00 = "50000000").
     */
    #[Optional('amount_crypto')]
    public ?string $amountCrypto;

    /**
     * The quoted amount in USD.
     */
    #[Optional('amount_usd')]
    public ?string $amountUsd;

    /**
     * ISO 8601 timestamp when the quote expires.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * The blockchain network for the payment in CAIP-2 format (e.g. eip155:8453 for Base).
     */
    #[Optional]
    public ?string $network;

    /**
     * x402 protocol v2 payment requirements. Contains all information needed to construct and sign a payment authorization.
     */
    #[Optional('payment_requirements')]
    public ?PaymentRequirements $paymentRequirements;

    /** @var value-of<RecordType>|null $recordType */
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
     * @param PaymentRequirements|PaymentRequirementsShape|null $paymentRequirements
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?string $amountCrypto = null,
        ?string $amountUsd = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $network = null,
        PaymentRequirements|array|null $paymentRequirements = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amountCrypto && $self['amountCrypto'] = $amountCrypto;
        null !== $amountUsd && $self['amountUsd'] = $amountUsd;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $network && $self['network'] = $network;
        null !== $paymentRequirements && $self['paymentRequirements'] = $paymentRequirements;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique quote identifier. Use this to settle the payment.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The equivalent amount in the payment cryptocurrency's smallest unit (e.g. USDC has 6 decimals, so $50.00 = "50000000").
     */
    public function withAmountCrypto(string $amountCrypto): self
    {
        $self = clone $this;
        $self['amountCrypto'] = $amountCrypto;

        return $self;
    }

    /**
     * The quoted amount in USD.
     */
    public function withAmountUsd(string $amountUsd): self
    {
        $self = clone $this;
        $self['amountUsd'] = $amountUsd;

        return $self;
    }

    /**
     * ISO 8601 timestamp when the quote expires.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * The blockchain network for the payment in CAIP-2 format (e.g. eip155:8453 for Base).
     */
    public function withNetwork(string $network): self
    {
        $self = clone $this;
        $self['network'] = $network;

        return $self;
    }

    /**
     * x402 protocol v2 payment requirements. Contains all information needed to construct and sign a payment authorization.
     *
     * @param PaymentRequirements|PaymentRequirementsShape $paymentRequirements
     */
    public function withPaymentRequirements(
        PaymentRequirements|array $paymentRequirements
    ): self {
        $self = clone $this;
        $self['paymentRequirements'] = $paymentRequirements;

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
}
