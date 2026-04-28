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
use Telnyx\VerifyProfiles\VerifyProfileCreateParams\Whatsapp;

/**
 * Creates a new Verify profile to associate verifications with.
 *
 * @see Telnyx\Services\VerifyProfilesService::create()
 *
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Call
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Flashcall
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\SMS
 * @phpstan-import-type WhatsappShape from \Telnyx\VerifyProfiles\VerifyProfileCreateParams\Whatsapp
 *
 * @phpstan-type VerifyProfileCreateParamsShape = array{
 *   name: string,
 *   call?: null|Call|CallShape,
 *   dailySpendLimit?: float|null,
 *   dailySpendLimitEnabled?: bool|null,
 *   flashcall?: null|Flashcall|FlashcallShape,
 *   language?: string|null,
 *   sms?: null|SMS|SMSShape,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 *   whatsapp?: null|Whatsapp|WhatsappShape,
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

    /**
     * The maximum daily spend allowed on this verify profile, in USD.
     */
    #[Optional('daily_spend_limit')]
    public ?float $dailySpendLimit;

    /**
     * Whether the daily spend limit is enforced for this verify profile.
     */
    #[Optional('daily_spend_limit_enabled')]
    public ?bool $dailySpendLimitEnabled;

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

    #[Optional]
    public ?Whatsapp $whatsapp;

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
     * @param Call|CallShape|null $call
     * @param Flashcall|FlashcallShape|null $flashcall
     * @param SMS|SMSShape|null $sms
     * @param Whatsapp|WhatsappShape|null $whatsapp
     */
    public static function with(
        string $name,
        Call|array|null $call = null,
        ?float $dailySpendLimit = null,
        ?bool $dailySpendLimitEnabled = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        SMS|array|null $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        Whatsapp|array|null $whatsapp = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $call && $self['call'] = $call;
        null !== $dailySpendLimit && $self['dailySpendLimit'] = $dailySpendLimit;
        null !== $dailySpendLimitEnabled && $self['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;
        null !== $flashcall && $self['flashcall'] = $flashcall;
        null !== $language && $self['language'] = $language;
        null !== $sms && $self['sms'] = $sms;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;
        null !== $whatsapp && $self['whatsapp'] = $whatsapp;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param Call|CallShape $call
     */
    public function withCall(Call|array $call): self
    {
        $self = clone $this;
        $self['call'] = $call;

        return $self;
    }

    /**
     * The maximum daily spend allowed on this verify profile, in USD.
     */
    public function withDailySpendLimit(float $dailySpendLimit): self
    {
        $self = clone $this;
        $self['dailySpendLimit'] = $dailySpendLimit;

        return $self;
    }

    /**
     * Whether the daily spend limit is enforced for this verify profile.
     */
    public function withDailySpendLimitEnabled(
        bool $dailySpendLimitEnabled
    ): self {
        $self = clone $this;
        $self['dailySpendLimitEnabled'] = $dailySpendLimitEnabled;

        return $self;
    }

    /**
     * @param Flashcall|FlashcallShape $flashcall
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

    /**
     * @param SMS|SMSShape $sms
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

    /**
     * @param Whatsapp|WhatsappShape $whatsapp
     */
    public function withWhatsapp(Whatsapp|array $whatsapp): self
    {
        $self = clone $this;
        $self['whatsapp'] = $whatsapp;

        return $self;
    }
}
