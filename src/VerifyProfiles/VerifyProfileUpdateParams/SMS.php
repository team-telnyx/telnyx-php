<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles\VerifyProfileUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SMSShape = array{
 *   alpha_sender?: string|null,
 *   app_name?: string|null,
 *   code_length?: int|null,
 *   default_verification_timeout_secs?: int|null,
 *   messaging_template_id?: string|null,
 *   whitelisted_destinations?: list<string>|null,
 * }
 */
final class SMS implements BaseModel
{
    /** @use SdkModel<SMSShape> */
    use SdkModel;

    /**
     * The alphanumeric sender ID to use when sending to destinations that require an alphanumeric sender ID.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $alpha_sender;

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    #[Api(optional: true)]
    public ?string $app_name;

    /**
     * The length of the verify code to generate.
     */
    #[Api(optional: true)]
    public ?int $code_length;

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    #[Api(optional: true)]
    public ?int $default_verification_timeout_secs;

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    #[Api(optional: true)]
    public ?string $messaging_template_id;

    /**
     * Enabled country destinations to send verification codes. The elements in the list must be valid ISO 3166-1 alpha-2 country codes. If set to `["*"]`, all destinations will be allowed.
     *
     * @var list<string>|null $whitelisted_destinations
     */
    #[Api(list: 'string', optional: true)]
    public ?array $whitelisted_destinations;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $whitelisted_destinations
     */
    public static function with(
        ?string $alpha_sender = null,
        ?string $app_name = null,
        ?int $code_length = null,
        ?int $default_verification_timeout_secs = null,
        ?string $messaging_template_id = null,
        ?array $whitelisted_destinations = null,
    ): self {
        $obj = new self;

        null !== $alpha_sender && $obj['alpha_sender'] = $alpha_sender;
        null !== $app_name && $obj['app_name'] = $app_name;
        null !== $code_length && $obj['code_length'] = $code_length;
        null !== $default_verification_timeout_secs && $obj['default_verification_timeout_secs'] = $default_verification_timeout_secs;
        null !== $messaging_template_id && $obj['messaging_template_id'] = $messaging_template_id;
        null !== $whitelisted_destinations && $obj['whitelisted_destinations'] = $whitelisted_destinations;

        return $obj;
    }

    /**
     * The alphanumeric sender ID to use when sending to destinations that require an alphanumeric sender ID.
     */
    public function withAlphaSender(?string $alphaSender): self
    {
        $obj = clone $this;
        $obj['alpha_sender'] = $alphaSender;

        return $obj;
    }

    /**
     * The name that identifies the application requesting 2fa in the verification message.
     */
    public function withAppName(string $appName): self
    {
        $obj = clone $this;
        $obj['app_name'] = $appName;

        return $obj;
    }

    /**
     * The length of the verify code to generate.
     */
    public function withCodeLength(int $codeLength): self
    {
        $obj = clone $this;
        $obj['code_length'] = $codeLength;

        return $obj;
    }

    /**
     * For every request that is initiated via this Verify profile, this sets the number of seconds before a verification request code expires. Once the verification request expires, the user cannot use the code to verify their identity.
     */
    public function withDefaultVerificationTimeoutSecs(
        int $defaultVerificationTimeoutSecs
    ): self {
        $obj = clone $this;
        $obj['default_verification_timeout_secs'] = $defaultVerificationTimeoutSecs;

        return $obj;
    }

    /**
     * The message template identifier selected from /verify_profiles/templates.
     */
    public function withMessagingTemplateID(string $messagingTemplateID): self
    {
        $obj = clone $this;
        $obj['messaging_template_id'] = $messagingTemplateID;

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
        $obj['whitelisted_destinations'] = $whitelistedDestinations;

        return $obj;
    }
}
