<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload\ErrorType;
use Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload\PaymentCardType;
use Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload\PaymentMethod;
use Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload\PaymentStatus;
use Telnyx\Webhooks\CallPaymentProgressWebhookEvent\Data\Payload\PaymentStep;

/**
 * @phpstan-type PayloadShape = array{
 *   attempt?: int|null,
 *   bankAccountNumber?: string|null,
 *   bankAccountType?: string|null,
 *   bankRoutingNumber?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   errorType?: null|ErrorType|value-of<ErrorType>,
 *   expirationDate?: string|null,
 *   from?: string|null,
 *   paymentCardNumber?: string|null,
 *   paymentCardPostalCode?: string|null,
 *   paymentCardType?: null|PaymentCardType|value-of<PaymentCardType>,
 *   paymentConnector?: string|null,
 *   paymentMethod?: null|PaymentMethod|value-of<PaymentMethod>,
 *   paymentStatus?: null|PaymentStatus|value-of<PaymentStatus>,
 *   paymentStep?: null|PaymentStep|value-of<PaymentStep>,
 *   securityCode?: string|null,
 *   to?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Current 1-based attempt number for the step.
     */
    #[Optional]
    public ?int $attempt;

    /**
     * Masked bank account number with only the last two digits visible.
     */
    #[Optional('bank_account_number')]
    public ?string $bankAccountNumber;

    /**
     * Bank account type, when available.
     */
    #[Optional('bank_account_type')]
    public ?string $bankAccountType;

    /**
     * Bank routing number collected from the caller.
     */
    #[Optional('bank_routing_number')]
    public ?string $bankRoutingNumber;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID unique to the call leg.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID shared by related call legs in the same call session.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * Base64-encoded state received from the command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Step-level error when payment collection fails.
     *
     * @var value-of<ErrorType>|null $errorType
     */
    #[Optional('error_type', enum: ErrorType::class)]
    public ?string $errorType;

    /**
     * Card expiration date in MMYY format.
     */
    #[Optional('expiration_date')]
    public ?string $expirationDate;

    /**
     * Number or SIP URI placing the call.
     */
    #[Optional]
    public ?string $from;

    /**
     * Masked card number with only the last four digits visible.
     */
    #[Optional('payment_card_number')]
    public ?string $paymentCardNumber;

    /**
     * Billing postal code collected from the caller.
     */
    #[Optional('payment_card_postal_code')]
    public ?string $paymentCardPostalCode;

    /**
     * Detected card type. Present only for the recognized card brands listed below.
     *
     * @var value-of<PaymentCardType>|null $paymentCardType
     */
    #[Optional('payment_card_type', enum: PaymentCardType::class)]
    public ?string $paymentCardType;

    /**
     * Name of the Pay connector used.
     */
    #[Optional('payment_connector')]
    public ?string $paymentConnector;

    /**
     * Payment method being collected.
     *
     * @var value-of<PaymentMethod>|null $paymentMethod
     */
    #[Optional('payment_method', enum: PaymentMethod::class)]
    public ?string $paymentMethod;

    /**
     * Status of the current payment step.
     *
     * @var value-of<PaymentStatus>|null $paymentStatus
     */
    #[Optional('payment_status', enum: PaymentStatus::class)]
    public ?string $paymentStatus;

    /**
     * Current payment collection or processing step.
     *
     * @var value-of<PaymentStep>|null $paymentStep
     */
    #[Optional('payment_step', enum: PaymentStep::class)]
    public ?string $paymentStep;

    /**
     * Fully masked card security code.
     */
    #[Optional('security_code')]
    public ?string $securityCode;

    /**
     * Destination number or SIP URI of the call.
     */
    #[Optional]
    public ?string $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ErrorType|value-of<ErrorType>|null $errorType
     * @param PaymentCardType|value-of<PaymentCardType>|null $paymentCardType
     * @param PaymentMethod|value-of<PaymentMethod>|null $paymentMethod
     * @param PaymentStatus|value-of<PaymentStatus>|null $paymentStatus
     * @param PaymentStep|value-of<PaymentStep>|null $paymentStep
     */
    public static function with(
        ?int $attempt = null,
        ?string $bankAccountNumber = null,
        ?string $bankAccountType = null,
        ?string $bankRoutingNumber = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ErrorType|string|null $errorType = null,
        ?string $expirationDate = null,
        ?string $from = null,
        ?string $paymentCardNumber = null,
        ?string $paymentCardPostalCode = null,
        PaymentCardType|string|null $paymentCardType = null,
        ?string $paymentConnector = null,
        PaymentMethod|string|null $paymentMethod = null,
        PaymentStatus|string|null $paymentStatus = null,
        PaymentStep|string|null $paymentStep = null,
        ?string $securityCode = null,
        ?string $to = null,
    ): self {
        $self = new self;

        null !== $attempt && $self['attempt'] = $attempt;
        null !== $bankAccountNumber && $self['bankAccountNumber'] = $bankAccountNumber;
        null !== $bankAccountType && $self['bankAccountType'] = $bankAccountType;
        null !== $bankRoutingNumber && $self['bankRoutingNumber'] = $bankRoutingNumber;
        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $errorType && $self['errorType'] = $errorType;
        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $from && $self['from'] = $from;
        null !== $paymentCardNumber && $self['paymentCardNumber'] = $paymentCardNumber;
        null !== $paymentCardPostalCode && $self['paymentCardPostalCode'] = $paymentCardPostalCode;
        null !== $paymentCardType && $self['paymentCardType'] = $paymentCardType;
        null !== $paymentConnector && $self['paymentConnector'] = $paymentConnector;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
        null !== $paymentStatus && $self['paymentStatus'] = $paymentStatus;
        null !== $paymentStep && $self['paymentStep'] = $paymentStep;
        null !== $securityCode && $self['securityCode'] = $securityCode;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Current 1-based attempt number for the step.
     */
    public function withAttempt(int $attempt): self
    {
        $self = clone $this;
        $self['attempt'] = $attempt;

        return $self;
    }

    /**
     * Masked bank account number with only the last two digits visible.
     */
    public function withBankAccountNumber(string $bankAccountNumber): self
    {
        $self = clone $this;
        $self['bankAccountNumber'] = $bankAccountNumber;

        return $self;
    }

    /**
     * Bank account type, when available.
     */
    public function withBankAccountType(string $bankAccountType): self
    {
        $self = clone $this;
        $self['bankAccountType'] = $bankAccountType;

        return $self;
    }

    /**
     * Bank routing number collected from the caller.
     */
    public function withBankRoutingNumber(string $bankRoutingNumber): self
    {
        $self = clone $this;
        $self['bankRoutingNumber'] = $bankRoutingNumber;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID unique to the call leg.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID shared by related call legs in the same call session.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Base64-encoded state received from the command.
     */
    public function withClientState(string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Step-level error when payment collection fails.
     *
     * @param ErrorType|value-of<ErrorType> $errorType
     */
    public function withErrorType(ErrorType|string $errorType): self
    {
        $self = clone $this;
        $self['errorType'] = $errorType;

        return $self;
    }

    /**
     * Card expiration date in MMYY format.
     */
    public function withExpirationDate(string $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Masked card number with only the last four digits visible.
     */
    public function withPaymentCardNumber(string $paymentCardNumber): self
    {
        $self = clone $this;
        $self['paymentCardNumber'] = $paymentCardNumber;

        return $self;
    }

    /**
     * Billing postal code collected from the caller.
     */
    public function withPaymentCardPostalCode(
        string $paymentCardPostalCode
    ): self {
        $self = clone $this;
        $self['paymentCardPostalCode'] = $paymentCardPostalCode;

        return $self;
    }

    /**
     * Detected card type. Present only for the recognized card brands listed below.
     *
     * @param PaymentCardType|value-of<PaymentCardType> $paymentCardType
     */
    public function withPaymentCardType(
        PaymentCardType|string $paymentCardType
    ): self {
        $self = clone $this;
        $self['paymentCardType'] = $paymentCardType;

        return $self;
    }

    /**
     * Name of the Pay connector used.
     */
    public function withPaymentConnector(string $paymentConnector): self
    {
        $self = clone $this;
        $self['paymentConnector'] = $paymentConnector;

        return $self;
    }

    /**
     * Payment method being collected.
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
     * Status of the current payment step.
     *
     * @param PaymentStatus|value-of<PaymentStatus> $paymentStatus
     */
    public function withPaymentStatus(PaymentStatus|string $paymentStatus): self
    {
        $self = clone $this;
        $self['paymentStatus'] = $paymentStatus;

        return $self;
    }

    /**
     * Current payment collection or processing step.
     *
     * @param PaymentStep|value-of<PaymentStep> $paymentStep
     */
    public function withPaymentStep(PaymentStep|string $paymentStep): self
    {
        $self = clone $this;
        $self['paymentStep'] = $paymentStep;

        return $self;
    }

    /**
     * Fully masked card security code.
     */
    public function withSecurityCode(string $securityCode): self
    {
        $self = clone $this;
        $self['securityCode'] = $securityCode;

        return $self;
    }

    /**
     * Destination number or SIP URI of the call.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
