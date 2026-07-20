<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type WhatsappShape = array{
 *   appName?: string|null,
 *   codeLength?: int|null,
 *   defaultVerificationTimeoutSecs?: int|null,
 *   messagingTemplateID?: string|null,
 *   senderPhoneNumber?: string|null,
 *   templateID?: string|null,
 *   wabaID?: string|null,
 *   whitelistedDestinations?: list<string>|null,
 * }
 */
final class Whatsapp implements BaseModel
{
    /** @use SdkModel<WhatsappShape> */
    use SdkModel;

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    #[Optional('app_name')]
    public ?string $appName;

    /**
     * The length of the verify code to generate.
     */
    #[Optional('code_length')]
    public ?int $codeLength;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Optional('default_verification_timeout_secs')]
    public ?int $defaultVerificationTimeoutSecs;

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    #[Optional('messaging_template_id')]
    public ?string $messagingTemplateID;

    /**
     * Phone number registered on the customer WABA to send OTPs from.
     */
    #[Optional('sender_phone_number', nullable: true)]
    public ?string $senderPhoneNumber;

    /**
     * Customer pre-approved authentication template ID registered on Meta.
     */
    #[Optional('template_id', nullable: true)]
    public ?string $templateID;

    /**
     * Customer Meta WABA ID for Bring-Your-Own-WABA sending.
     */
    #[Optional('waba_id', nullable: true)]
    public ?string $wabaID;

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed. **Conditionally required:** this field must be provided when your organization is configured to require explicit whitelisted destinations; otherwise it is optional.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Optional('whitelisted_destinations', list: 'string')]
    public ?array $whitelistedDestinations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $whitelistedDestinations
     */
    public static function with(
        ?string $appName = null,
        ?int $codeLength = null,
        ?int $defaultVerificationTimeoutSecs = null,
        ?string $messagingTemplateID = null,
        ?string $senderPhoneNumber = null,
        ?string $templateID = null,
        ?string $wabaID = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $self = new self;

        null !== $appName && $self['appName'] = $appName;
        null !== $codeLength && $self['codeLength'] = $codeLength;
        null !== $defaultVerificationTimeoutSecs && $self['defaultVerificationTimeoutSecs'] = $defaultVerificationTimeoutSecs;
        null !== $messagingTemplateID && $self['messagingTemplateID'] = $messagingTemplateID;
        null !== $senderPhoneNumber && $self['senderPhoneNumber'] = $senderPhoneNumber;
        null !== $templateID && $self['templateID'] = $templateID;
        null !== $wabaID && $self['wabaID'] = $wabaID;
        null !== $whitelistedDestinations && $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    public function withAppName(string $appName): self
    {
        $self = clone $this;
        $self['appName'] = $appName;

        return $self;
    }

    /**
     * The length of the verify code to generate.
     */
    public function withCodeLength(int $codeLength): self
    {
        $self = clone $this;
        $self['codeLength'] = $codeLength;

        return $self;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $self = clone $this;
        $self['defaultVerificationTimeoutSecs'] = $defaultVerificationTimeoutSecs;

        return $self;
    }

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    public function withMessagingTemplateID(string $messagingTemplateID): self
    {
        $self = clone $this;
        $self['messagingTemplateID'] = $messagingTemplateID;

        return $self;
    }

    /**
     * Phone number registered on the customer WABA to send OTPs from.
     */
    public function withSenderPhoneNumber(?string $senderPhoneNumber): self
    {
        $self = clone $this;
        $self['senderPhoneNumber'] = $senderPhoneNumber;

        return $self;
    }

    /**
     * Customer pre-approved authentication template ID registered on Meta.
     */
    public function withTemplateID(?string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * Customer Meta WABA ID for Bring-Your-Own-WABA sending.
     */
    public function withWabaID(?string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed. **Conditionally required:** this field must be provided when your organization is configured to require explicit whitelisted destinations; otherwise it is optional.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $self = clone $this;
        $self['whitelistedDestinations'] = $whitelistedDestinations;

        return $self;
    }
}
