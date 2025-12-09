<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS;

/**
 * Creates a new Verify profile to associate verifications with.
 *
 * @see Telnyx\Services\VerifyProfilesService::create()
 *
 * @phpstan-type VerifyProfileCreateParamsShape = array{
 *   name: string,
 *   call?: Call|array{
 *     appName?: string|null,
 *     codeLength?: int|null,
 *     defaultVerificationTimeoutSecs?: int|null,
 *     messagingTemplateID?: string|null,
 *     whitelistedDestinations?: list<string>|null,
 *   },
 *   flashcall?: Flashcall|array{
 *     defaultVerificationTimeoutSecs?: int|null,
 *     whitelistedDestinations?: list<string>|null,
 *   },
 *   language?: string,
 *   sms?: SMS|array{
 *     whitelistedDestinations: list<string>,
 *     alphaSender?: string|null,
 *     appName?: string|null,
 *     codeLength?: int|null,
 *     defaultVerificationTimeoutSecs?: int|null,
 *     messagingTemplateID?: string|null,
 *   },
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class VerifyProfileCreateParams implements BaseModel
{
    /** @use SdkModel<VerifyProfileCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    #[Optional]
    public ?Call $call;

    #[Optional]
    public ?Flashcall $flashcall;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?SMS $sms;

    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new VerifyProfileCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileCreateParams)->withName(...)
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
     * @param Call|array{
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $call
     * @param Flashcall|array{
     *   defaultVerificationTimeoutSecs?: int|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $flashcall
     * @param SMS|array{
     *   whitelistedDestinations: list<string>,
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     * } $sms
     */
    public static function with(
        string $name,
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;

        null !== $call && $obj['call'] = $call;
        null !== $flashcall && $obj['flashcall'] = $flashcall;
        null !== $language && $obj['language'] = $language;
        null !== $sms && $obj['sms'] = $sms;
        null !== $webhookFailoverURL && $obj['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param Call|array{
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $call
     */
    public function withCall(Call|array $call): self
    {
        $obj = clone $this;
        $obj['call'] = $call;

        return $obj;
    }

    /**
     * @param Flashcall|array{
     *   defaultVerificationTimeoutSecs?: int|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $flashcall
     */
    public function withFlashcall(Flashcall|array $flashcall): self
    {
        $obj = clone $this;
        $obj['flashcall'] = $flashcall;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * @param SMS|array{
     *   whitelistedDestinations: list<string>,
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     * } $sms
     */
    public function withSMS(SMS|array $sms): self
    {
        $obj = clone $this;
        $obj['sms'] = $sms;

        return $obj;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhookFailoverURL'] = $webhookFailoverURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
