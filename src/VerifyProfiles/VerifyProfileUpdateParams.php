<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS;

/**
 * Update Verify profile.
 *
 * @see Telnyx\Services\VerifyProfilesService::update()
 *
 * @phpstan-type VerifyProfileUpdateParamsShape = array{
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
 *   name?: string,
 *   sms?: SMS|array{
 *     alphaSender?: string|null,
 *     appName?: string|null,
 *     codeLength?: int|null,
 *     defaultVerificationTimeoutSecs?: int|null,
 *     messagingTemplateID?: string|null,
 *     whitelistedDestinations?: list<string>|null,
 *   },
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class VerifyProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<VerifyProfileUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?Call $call;

    #[Optional]
    public ?Flashcall $flashcall;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?SMS $sms;

    #[Optional('webhook_failover_url')]
    public ?string $webhookFailoverURL;

    #[Optional('webhook_url')]
    public ?string $webhookURL;

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
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $sms
     */
    public static function with(
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $call && $self['call'] = $call;
        null !== $flashcall && $self['flashcall'] = $flashcall;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $sms && $self['sms'] = $sms;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
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
        $self = clone $this;
        $self['call'] = $call;

        return $self;
    }

    /**
     * @param Flashcall|array{
     *   defaultVerificationTimeoutSecs?: int|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $flashcall
     */
    public function withFlashcall(Flashcall|array $flashcall): self
    {
        $self = clone $this;
        $self['flashcall'] = $flashcall;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param SMS|array{
     *   alphaSender?: string|null,
     *   appName?: string|null,
     *   codeLength?: int|null,
     *   defaultVerificationTimeoutSecs?: int|null,
     *   messagingTemplateID?: string|null,
     *   whitelistedDestinations?: list<string>|null,
     * } $sms
     */
    public function withSMS(SMS|array $sms): self
    {
        $self = clone $this;
        $self['sms'] = $sms;

        return $self;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
