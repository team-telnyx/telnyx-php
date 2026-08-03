<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\ConnectorError;
use Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\PaymentCardType;
use Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\PaymentMethod;
use Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\Result;

/**
 * @phpstan-import-type ConnectorErrorVariants from \Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\ConnectorError
 * @phpstan-import-type ConnectorErrorShape from \Telnyx\Webhooks\CallPaymentCompletedWebhookEvent\Data\Payload\ConnectorError
 *
 * @phpstan-type PayloadShape = array{
 *   bankAccountNumber?: string|null,
 *   bankAccountType?: string|null,
 *   bankRoutingNumber?: string|null,
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   chargeID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   connectorError?: ConnectorErrorShape|null,
 *   expirationDate?: string|null,
 *   from?: string|null,
 *   payErrorCode?: string|null,
 *   paymentCardNumber?: string|null,
 *   paymentCardPostalCode?: string|null,
 *   paymentCardType?: null|PaymentCardType|value-of<PaymentCardType>,
 *   paymentConfirmationCode?: string|null,
 *   paymentConnector?: string|null,
 *   paymentError?: string|null,
 *   paymentMethod?: null|PaymentMethod|value-of<PaymentMethod>,
 *   result?: null|Result|value-of<Result>,
 *   securityCode?: string|null,
 *   to?: string|null,
 *   tokenID?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

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
     * Charge identifier returned for a successful charge transaction.
     */
    #[Optional('charge_id')]
    public ?string $chargeID;

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
     * Additional connector error information, when supplied by the processor.
     *
     * @var ConnectorErrorVariants|null $connectorError
     */
    #[Optional('connector_error', union: ConnectorError::class)]
    public string|array|null $connectorError;

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
     * Error code returned by the payment connector or processor.
     */
    #[Optional('pay_error_code')]
    public ?string $payErrorCode;

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
     * Payment confirmation code returned by the processor, when available.
     */
    #[Optional('payment_confirmation_code')]
    public ?string $paymentConfirmationCode;

    /**
     * Name of the Pay connector used.
     */
    #[Optional('payment_connector')]
    public ?string $paymentConnector;

    /**
     * Step-level or processor error associated with the final result.
     */
    #[Optional('payment_error')]
    public ?string $paymentError;

    /**
     * Payment method being collected.
     *
     * @var value-of<PaymentMethod>|null $paymentMethod
     */
    #[Optional('payment_method', enum: PaymentMethod::class)]
    public ?string $paymentMethod;

    /**
     * Final Pay session result.
     *
     * @var value-of<Result>|null $result
     */
    #[Optional(enum: Result::class)]
    public ?string $result;

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

    /**
     * Token identifier returned for a successful tokenize transaction.
     */
    #[Optional('token_id')]
    public ?string $tokenID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConnectorErrorShape|null $connectorError
     * @param PaymentCardType|value-of<PaymentCardType>|null $paymentCardType
     * @param PaymentMethod|value-of<PaymentMethod>|null $paymentMethod
     * @param Result|value-of<Result>|null $result
     */
    public static function with(
        ?string $bankAccountNumber = null,
        ?string $bankAccountType = null,
        ?string $bankRoutingNumber = null,
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $chargeID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        string|array|null $connectorError = null,
        ?string $expirationDate = null,
        ?string $from = null,
        ?string $payErrorCode = null,
        ?string $paymentCardNumber = null,
        ?string $paymentCardPostalCode = null,
        PaymentCardType|string|null $paymentCardType = null,
        ?string $paymentConfirmationCode = null,
        ?string $paymentConnector = null,
        ?string $paymentError = null,
        PaymentMethod|string|null $paymentMethod = null,
        Result|string|null $result = null,
        ?string $securityCode = null,
        ?string $to = null,
        ?string $tokenID = null,
    ): self {
        $self = new self;

        null !== $bankAccountNumber && $self['bankAccountNumber'] = $bankAccountNumber;
        null !== $bankAccountType && $self['bankAccountType'] = $bankAccountType;
        null !== $bankRoutingNumber && $self['bankRoutingNumber'] = $bankRoutingNumber;
        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $chargeID && $self['chargeID'] = $chargeID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $connectorError && $self['connectorError'] = $connectorError;
        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $from && $self['from'] = $from;
        null !== $payErrorCode && $self['payErrorCode'] = $payErrorCode;
        null !== $paymentCardNumber && $self['paymentCardNumber'] = $paymentCardNumber;
        null !== $paymentCardPostalCode && $self['paymentCardPostalCode'] = $paymentCardPostalCode;
        null !== $paymentCardType && $self['paymentCardType'] = $paymentCardType;
        null !== $paymentConfirmationCode && $self['paymentConfirmationCode'] = $paymentConfirmationCode;
        null !== $paymentConnector && $self['paymentConnector'] = $paymentConnector;
        null !== $paymentError && $self['paymentError'] = $paymentError;
        null !== $paymentMethod && $self['paymentMethod'] = $paymentMethod;
        null !== $result && $self['result'] = $result;
        null !== $securityCode && $self['securityCode'] = $securityCode;
        null !== $to && $self['to'] = $to;
        null !== $tokenID && $self['tokenID'] = $tokenID;

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
     * Charge identifier returned for a successful charge transaction.
     */
    public function withChargeID(string $chargeID): self
    {
        $self = clone $this;
        $self['chargeID'] = $chargeID;

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
     * Additional connector error information, when supplied by the processor.
     *
     * @param ConnectorErrorShape $connectorError
     */
    public function withConnectorError(string|array $connectorError): self
    {
        $self = clone $this;
        $self['connectorError'] = $connectorError;

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
     * Error code returned by the payment connector or processor.
     */
    public function withPayErrorCode(string $payErrorCode): self
    {
        $self = clone $this;
        $self['payErrorCode'] = $payErrorCode;

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
     * Payment confirmation code returned by the processor, when available.
     */
    public function withPaymentConfirmationCode(
        string $paymentConfirmationCode
    ): self {
        $self = clone $this;
        $self['paymentConfirmationCode'] = $paymentConfirmationCode;

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
     * Step-level or processor error associated with the final result.
     */
    public function withPaymentError(string $paymentError): self
    {
        $self = clone $this;
        $self['paymentError'] = $paymentError;

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
     * Final Pay session result.
     *
     * @param Result|value-of<Result> $result
     */
    public function withResult(Result|string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

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

    /**
     * Token identifier returned for a successful tokenize transaction.
     */
    public function withTokenID(string $tokenID): self
    {
        $self = clone $this;
        $self['tokenID'] = $tokenID;

        return $self;
    }
}
