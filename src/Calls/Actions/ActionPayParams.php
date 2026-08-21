<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\ActionPayParams\Currency;
use Telnyx\Calls\Actions\ActionPayParams\PaymentMethod;
use Telnyx\Calls\Actions\ActionPayParams\Prompts;
use Telnyx\Calls\Actions\ActionPayParams\TransactionType;
use Telnyx\Calls\Actions\ActionPayParams\ValidCardType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Collect payment details from the caller using DTMF and either charge or tokenize the payment method through a configured Pay connector. Pay pauses active call recordings while sensitive payment details are collected.
 *
 * When `payment_token` is supplied, the DTMF collection steps are skipped and the existing token is sent to the connector.
 *
 * **Expected Webhooks:**
 *
 * - `call.payment.progress`
 * - `call.payment.completed`
 *
 * **Test mode card numbers:** `4111111111111111` (Visa), `5555555555554444` (Mastercard), `378282246310005` (American Express), `6011111111111117` (Discover), `3065930009020004` (Diners Club), `3566002020360505` (JCB), `6200000000000005` (UnionPay), and `6771798021000008` (Maestro). Test-mode connectors reject other card numbers before contacting the configured processor. The UnionPay and Maestro numbers are accepted for processor testing, but Pay currently does not emit a card type for them.
 *
 * @see Telnyx\Services\Calls\ActionsService::pay()
 *
 * @phpstan-import-type PromptsShape from \Telnyx\Calls\Actions\ActionPayParams\Prompts
 *
 * @phpstan-type ActionPayParamsShape = array{
 *   amount?: float|null,
 *   clientState?: string|null,
 *   commandID?: string|null,
 *   connectorName?: string|null,
 *   currency?: null|Currency|value-of<Currency>,
 *   description?: string|null,
 *   interDigitTimeoutMillis?: int|null,
 *   language?: string|null,
 *   maxAttempts?: int|null,
 *   metadata?: array<string,mixed>|null,
 *   parameters?: array<string,mixed>|null,
 *   paymentMethod?: null|PaymentMethod|value-of<PaymentMethod>,
 *   paymentToken?: string|null,
 *   prompts?: null|Prompts|PromptsShape,
 *   serviceLevel?: string|null,
 *   timeoutMillis?: int|null,
 *   transactionType?: null|TransactionType|value-of<TransactionType>,
 *   validCardTypes?: list<ValidCardType|value-of<ValidCardType>>|null,
 *   voice?: string|null,
 * }
 */
final class ActionPayParams implements BaseModel
{
    /** @use SdkModel<ActionPayParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Amount to charge. Required when `transaction_type` is `charge`.
     */
    #[Optional]
    public ?float $amount;

    /**
     * Base64-encoded state included in subsequent webhooks.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Idempotency key for the command. Telnyx ignores a duplicate command with the same `command_id` for the same `call_control_id`.
     */
    #[Optional('command_id')]
    public ?string $commandID;

    /**
     * Name of the Pay connector used to process the transaction.
     */
    #[Optional('connector_name')]
    public ?string $connectorName;

    /**
     * Currency used for the transaction. Pay currently supports USD only.
     *
     * @var value-of<Currency>|null $currency
     */
    #[Optional(enum: Currency::class)]
    public ?string $currency;

    /**
     * Optional description forwarded with the payment transaction.
     */
    #[Optional]
    public ?string $description;

    /**
     * Time in milliseconds to wait between consecutive DTMF digits.
     */
    #[Optional('inter_digit_timeout_millis')]
    public ?int $interDigitTimeoutMillis;

    /**
     * Language used for payment prompts.
     */
    #[Optional]
    public ?string $language;

    /**
     * Maximum number of attempts for each payment collection step.
     */
    #[Optional('max_attempts')]
    public ?int $maxAttempts;

    /**
     * Metadata forwarded to the Pay connector.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * Additional parameters forwarded to the Pay connector.
     *
     * @var array<string,mixed>|null $parameters
     */
    #[Optional(map: 'mixed')]
    public ?array $parameters;

    /**
     * Payment method to collect.
     *
     * @var value-of<PaymentMethod>|null $paymentMethod
     */
    #[Optional('payment_method', enum: PaymentMethod::class)]
    public ?string $paymentMethod;

    /**
     * Existing payment token. When supplied, payment-detail collection is skipped.
     */
    #[Optional('payment_token')]
    public ?string $paymentToken;

    /**
     * Custom text-to-speech prompts keyed by payment collection step.
     */
    #[Optional]
    public ?Prompts $prompts;

    /**
     * Speech synthesis service level used for payment prompts. Pay defaults to `premium`.
     */
    #[Optional('service_level')]
    public ?string $serviceLevel;

    /**
     * Time in milliseconds to wait for DTMF input for each collection step.
     */
    #[Optional('timeout_millis')]
    public ?int $timeoutMillis;

    /**
     * Transaction to perform. If omitted, Pay infers `tokenize` when `amount` is absent or zero and `charge` when `amount` is positive.
     *
     * @var value-of<TransactionType>|null $transactionType
     */
    #[Optional('transaction_type', enum: TransactionType::class)]
    public ?string $transactionType;

    /**
     * Restricts accepted card numbers to the listed card types. When the caller enters a card number that does not match one of the listed types, Pay treats the input as invalid and re-prompts for the card number. Cannot be used together with `payment_token`.
     *
     * @var list<value-of<ValidCardType>>|null $validCardTypes
     */
    #[Optional('valid_card_types', list: ValidCardType::class)]
    public ?array $validCardTypes;

    /**
     * Voice used for payment prompts. Accepts `male`, `female`, or a provider voice in `<Provider>.<Model>.<VoiceId>` format, for example `AWS.Polly.Joanna` or `Telnyx.KokoroTTS.af`.
     */
    #[Optional]
    public ?string $voice;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Currency|value-of<Currency>|null $currency
     * @param array<string,mixed>|null $metadata
     * @param array<string,mixed>|null $parameters
     * @param PaymentMethod|value-of<PaymentMethod>|null $paymentMethod
     * @param Prompts|PromptsShape|null $prompts
     * @param TransactionType|value-of<TransactionType>|null $transactionType
     * @param list<ValidCardType|value-of<ValidCardType>>|null $validCardTypes
     */
    public static function with(
        ?float $amount = null,
        ?string $clientState = null,
        ?string $commandID = null,
        ?string $connectorName = null,
        Currency|string|null $currency = null,
        ?string $description = null,
        ?int $interDigitTimeoutMillis = null,
        ?string $language = null,
        ?int $maxAttempts = null,
        ?array $metadata = null,
        ?array $parameters = null,
        PaymentMethod|string|null $paymentMethod = null,
        ?string $paymentToken = null,
        Prompts|array|null $prompts = null,
        ?string $serviceLevel = null,
        ?int $timeoutMillis = null,
        TransactionType|string|null $transactionType = null,
        ?array $validCardTypes = null,
        ?string $voice = null,
    ): self {
        $self = new self;

        null !== $amount && $self['amount'] = $amount;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $commandID && $self['commandID'] = $commandID;
        null !== $connectorName && $self['connectorName'] = $connectorName;
        null !== $currency && $self['currency'] = $currency;
        null !== $description && $self['description'] = $description;
        null !== $interDigitTimeoutMillis && $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;
        null !== $language && $self['language'] = $language;
        null !== $maxAttempts && $self['maxAttempts'] = $maxAttempts;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $parameters && $self['parameters'] = $parameters;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
        null !== $paymentToken && $self['paymentToken'] = $paymentToken;
        null !== $prompts && $self['prompts'] = $prompts;
        null !== $serviceLevel && $self['serviceLevel'] = $serviceLevel;
        null !== $timeoutMillis && $self['timeoutMillis'] = $timeoutMillis;
        null !== $transactionType && $self['transactionType'] = $transactionType;
        null !== $validCardTypes && $self['validCardTypes'] = $validCardTypes;
        null !== $voice && $self['voice'] = $voice;

        return $self;
    }

    /**
     * Amount to charge. Required when `transaction_type` is `charge`.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Base64-encoded state included in subsequent webhooks.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Idempotency key for the command. Telnyx ignores a duplicate command with the same `command_id` for the same `call_control_id`.
     */
    public function withCommandID(string $commandID): self
    {
        $self = clone $this;
        $self['commandID'] = $commandID;

        return $self;
    }

    /**
     * Name of the Pay connector used to process the transaction.
     */
    public function withConnectorName(string $connectorName): self
    {
        $self = clone $this;
        $self['connectorName'] = $connectorName;

        return $self;
    }

    /**
     * Currency used for the transaction. Pay currently supports USD only.
     *
     * @param Currency|value-of<Currency> $currency
     */
    public function withCurrency(Currency|string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * Optional description forwarded with the payment transaction.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Time in milliseconds to wait between consecutive DTMF digits.
     */
    public function withInterDigitTimeoutMillis(
        int $interDigitTimeoutMillis
    ): self {
        $self = clone $this;
        $self['interDigitTimeoutMillis'] = $interDigitTimeoutMillis;

        return $self;
    }

    /**
     * Language used for payment prompts.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Maximum number of attempts for each payment collection step.
     */
    public function withMaxAttempts(int $maxAttempts): self
    {
        $self = clone $this;
        $self['maxAttempts'] = $maxAttempts;

        return $self;
    }

    /**
     * Metadata forwarded to the Pay connector.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Additional parameters forwarded to the Pay connector.
     *
     * @param array<string,mixed> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * Payment method to collect.
     *
     * @param PaymentMethod|value-of<PaymentMethod> $paymentMethod
     */
    public function withPaymentMethod(PaymentMethod|string $paymentMethod): self
    {
        $self = clone $this;
        $self['paymentMethod'] = $paymentMethod;

        return $self;
    }

    /**
     * Existing payment token. When supplied, payment-detail collection is skipped.
     */
    public function withPaymentToken(string $paymentToken): self
    {
        $self = clone $this;
        $self['paymentToken'] = $paymentToken;

        return $self;
    }

    /**
     * Custom text-to-speech prompts keyed by payment collection step.
     *
     * @param Prompts|PromptsShape $prompts
     */
    public function withPrompts(Prompts|array $prompts): self
    {
        $self = clone $this;
        $self['prompts'] = $prompts;

        return $self;
    }

    /**
     * Speech synthesis service level used for payment prompts. Pay defaults to `premium`.
     */
    public function withServiceLevel(string $serviceLevel): self
    {
        $self = clone $this;
        $self['serviceLevel'] = $serviceLevel;

        return $self;
    }

    /**
     * Time in milliseconds to wait for DTMF input for each collection step.
     */
    public function withTimeoutMillis(int $timeoutMillis): self
    {
        $self = clone $this;
        $self['timeoutMillis'] = $timeoutMillis;

        return $self;
    }

    /**
     * Transaction to perform. If omitted, Pay infers `tokenize` when `amount` is absent or zero and `charge` when `amount` is positive.
     *
     * @param TransactionType|value-of<TransactionType> $transactionType
     */
    public function withTransactionType(
        TransactionType|string $transactionType
    ): self {
        $self = clone $this;
        $self['transactionType'] = $transactionType;

        return $self;
    }

    /**
     * Restricts accepted card numbers to the listed card types. When the caller enters a card number that does not match one of the listed types, Pay treats the input as invalid and re-prompts for the card number. Cannot be used together with `payment_token`.
     *
     * @param list<ValidCardType|value-of<ValidCardType>> $validCardTypes
     */
    public function withValidCardTypes(array $validCardTypes): self
    {
        $self = clone $this;
        $self['validCardTypes'] = $validCardTypes;

        return $self;
    }

    /**
     * Voice used for payment prompts. Accepts `male`, `female`, or a provider voice in `<Provider>.<Model>.<VoiceId>` format, for example `AWS.Polly.Joanna` or `Telnyx.KokoroTTS.af`.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}
