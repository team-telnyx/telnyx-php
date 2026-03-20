<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button\FlowAction;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button\OtpType;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button\Type;

/**
 * @phpstan-type ButtonShape = array{
 *   type: \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button\Type|value-of<\Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button\Type>,
 *   autofillText?: string|null,
 *   example?: list<string>|null,
 *   flowAction?: null|FlowAction|value-of<FlowAction>,
 *   flowID?: string|null,
 *   navigateScreen?: string|null,
 *   otpType?: null|OtpType|value-of<OtpType>,
 *   packageName?: string|null,
 *   phoneNumber?: string|null,
 *   signatureHash?: string|null,
 *   text?: string|null,
 *   url?: string|null,
 *   zeroTapTermsAccepted?: bool|null,
 * }
 */
final class Button implements BaseModel
{
    /** @use SdkModel<ButtonShape> */
    use SdkModel;

    /**
     * @var value-of<Type> $type
     */
    #[Required(
        enum: Type::class,
    )]
    public string $type;

    /**
     * Custom autofill button text for ONE_TAP OTP buttons.
     */
    #[Optional('autofill_text')]
    public ?string $autofillText;

    /**
     * Sample values for URL variable.
     *
     * @var list<string>|null $example
     */
    #[Optional(list: 'string')]
    public ?array $example;

    /**
     * Flow action type for FLOW-type buttons.
     *
     * @var value-of<FlowAction>|null $flowAction
     */
    #[Optional('flow_action', enum: FlowAction::class)]
    public ?string $flowAction;

    /**
     * Flow ID for FLOW-type buttons.
     */
    #[Optional('flow_id')]
    public ?string $flowID;

    /**
     * Target screen name for FLOW buttons with navigate action.
     */
    #[Optional('navigate_screen')]
    public ?string $navigateScreen;

    /** @var value-of<OtpType>|null $otpType */
    #[Optional('otp_type', enum: OtpType::class)]
    public ?string $otpType;

    /**
     * Android package name. Required for ONE_TAP OTP buttons.
     */
    #[Optional('package_name')]
    public ?string $packageName;

    /**
     * Phone number in E.164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Android app signing key hash. Required for ONE_TAP OTP buttons.
     */
    #[Optional('signature_hash')]
    public ?string $signatureHash;

    /**
     * Button label text. Maximum 25 characters. Required for URL, PHONE_NUMBER, and QUICK_REPLY buttons. Not required for OTP buttons (Meta supplies the label).
     */
    #[Optional]
    public ?string $text;

    /**
     * URL for URL-type buttons. Supports one variable ({{1}}).
     */
    #[Optional]
    public ?string $url;

    /**
     * Whether zero-tap terms have been accepted.
     */
    #[Optional('zero_tap_terms_accepted')]
    public ?bool $zeroTapTermsAccepted;

    /**
     * `new Button()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Button::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Button)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param list<string>|null $example
     * @param FlowAction|value-of<FlowAction>|null $flowAction
     * @param OtpType|value-of<OtpType>|null $otpType
     */
    public static function with(
        Type|string $type,
        ?string $autofillText = null,
        ?array $example = null,
        FlowAction|string|null $flowAction = null,
        ?string $flowID = null,
        ?string $navigateScreen = null,
        OtpType|string|null $otpType = null,
        ?string $packageName = null,
        ?string $phoneNumber = null,
        ?string $signatureHash = null,
        ?string $text = null,
        ?string $url = null,
        ?bool $zeroTapTermsAccepted = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $autofillText && $self['autofillText'] = $autofillText;
        null !== $example && $self['example'] = $example;
        null !== $flowAction && $self['flowAction'] = $flowAction;
        null !== $flowID && $self['flowID'] = $flowID;
        null !== $navigateScreen && $self['navigateScreen'] = $navigateScreen;
        null !== $otpType && $self['otpType'] = $otpType;
        null !== $packageName && $self['packageName'] = $packageName;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $signatureHash && $self['signatureHash'] = $signatureHash;
        null !== $text && $self['text'] = $text;
        null !== $url && $self['url'] = $url;
        null !== $zeroTapTermsAccepted && $self['zeroTapTermsAccepted'] = $zeroTapTermsAccepted;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Custom autofill button text for ONE_TAP OTP buttons.
     */
    public function withAutofillText(string $autofillText): self
    {
        $self = clone $this;
        $self['autofillText'] = $autofillText;

        return $self;
    }

    /**
     * Sample values for URL variable.
     *
     * @param list<string> $example
     */
    public function withExample(array $example): self
    {
        $self = clone $this;
        $self['example'] = $example;

        return $self;
    }

    /**
     * Flow action type for FLOW-type buttons.
     *
     * @param FlowAction|value-of<FlowAction> $flowAction
     */
    public function withFlowAction(FlowAction|string $flowAction): self
    {
        $self = clone $this;
        $self['flowAction'] = $flowAction;

        return $self;
    }

    /**
     * Flow ID for FLOW-type buttons.
     */
    public function withFlowID(string $flowID): self
    {
        $self = clone $this;
        $self['flowID'] = $flowID;

        return $self;
    }

    /**
     * Target screen name for FLOW buttons with navigate action.
     */
    public function withNavigateScreen(string $navigateScreen): self
    {
        $self = clone $this;
        $self['navigateScreen'] = $navigateScreen;

        return $self;
    }

    /**
     * @param OtpType|value-of<OtpType> $otpType
     */
    public function withOtpType(OtpType|string $otpType): self
    {
        $self = clone $this;
        $self['otpType'] = $otpType;

        return $self;
    }

    /**
     * Android package name. Required for ONE_TAP OTP buttons.
     */
    public function withPackageName(string $packageName): self
    {
        $self = clone $this;
        $self['packageName'] = $packageName;

        return $self;
    }

    /**
     * Phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Android app signing key hash. Required for ONE_TAP OTP buttons.
     */
    public function withSignatureHash(string $signatureHash): self
    {
        $self = clone $this;
        $self['signatureHash'] = $signatureHash;

        return $self;
    }

    /**
     * Button label text. Maximum 25 characters. Required for URL, PHONE_NUMBER, and QUICK_REPLY buttons. Not required for OTP buttons (Meta supplies the label).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * URL for URL-type buttons. Supports one variable ({{1}}).
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Whether zero-tap terms have been accepted.
     */
    public function withZeroTapTermsAccepted(bool $zeroTapTermsAccepted): self
    {
        $self = clone $this;
        $self['zeroTapTermsAccepted'] = $zeroTapTermsAccepted;

        return $self;
    }
}
