<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfileUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sms_alias = array{
 *   alphaSender?: string|null,
 *   appName?: string,
 *   codeLength?: int,
 *   defaultVerificationTimeoutSecs?: int,
 *   messagingTemplateID?: string,
 *   whitelistedDestinations?: list<string>,
 * }
 */
final class SMS implements BaseModel
{
    /** @use SdkModel<sms_alias> */
    use SdkModel;

    /**
     * The alphanumeric sender ID to use when sending to destinations that require an alphanumeric sender ID.
     */
    #[Api('alpha_sender', nullable: true, optional: true)]
    public ?string $alphaSender;

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    #[Api('app_name', optional: true)]
    public ?string $appName;

    /**
     * The length of the verify code to generate.
     */
    #[Api('code_length', optional: true)]
    public ?int $codeLength;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Api('default_verification_timeout_secs', optional: true)]
    public ?int $defaultVerificationTimeoutSecs;

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    #[Api('messaging_template_id', optional: true)]
    public ?string $messagingTemplateID;

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @var list<string>|null $whitelistedDestinations
     */
    #[Api('whitelisted_destinations', list: 'string', optional: true)]
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
     * @param list<string> $whitelistedDestinations
     */
    public static function with(
        ?string $alphaSender = null,
        ?string $appName = null,
        ?int $codeLength = null,
        ?int $defaultVerificationTimeoutSecs = null,
        ?string $messagingTemplateID = null,
        ?array $whitelistedDestinations = null,
    ): self {
        $obj = new self;

        null !== $alphaSender && $obj->alphaSender = $alphaSender;
        null !== $appName && $obj->appName = $appName;
        null !== $codeLength && $obj->codeLength = $codeLength;
        null !== $defaultVerificationTimeoutSecs && $obj->defaultVerificationTimeoutSecs = $defaultVerificationTimeoutSecs;
        null !== $messagingTemplateID && $obj->messagingTemplateID = $messagingTemplateID;
        null !== $whitelistedDestinations && $obj->whitelistedDestinations = $whitelistedDestinations;

        return $obj;
    }

    /**
     * The alphanumeric sender ID to use when sending to destinations that require an alphanumeric sender ID.
     */
    public function withAlphaSender(?string $alphaSender): self
    {
        $obj = clone $this;
        $obj->alphaSender = $alphaSender;

        return $obj;
    }

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    public function withAppName(string $appName): self
    {
        $obj = clone $this;
        $obj->appName = $appName;

        return $obj;
    }

    /**
     * The length of the verify code to generate.
     */
    public function withCodeLength(int $codeLength): self
    {
        $obj = clone $this;
        $obj->codeLength = $codeLength;

        return $obj;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj->defaultVerificationTimeoutSecs = $defaultVerificationTimeoutSecs;

        return $obj;
    }

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    public function withMessagingTemplateID(string $messagingTemplateID): self
    {
        $obj = clone $this;
        $obj->messagingTemplateID = $messagingTemplateID;

        return $obj;
    }

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @param list<string> $whitelistedDestinations
     */
    public function withWhitelistedDestinations(
        array $whitelistedDestinations
    ): self {
        $obj = clone $this;
        $obj->whitelistedDestinations = $whitelistedDestinations;

        return $obj;
    }
}
