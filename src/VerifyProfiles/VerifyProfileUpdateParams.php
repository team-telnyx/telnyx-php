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
 * @phpstan-import-type CallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call
 * @phpstan-import-type FlashcallShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall
 * @phpstan-import-type SMSShape from \Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS
 *
 * @phpstan-type VerifyProfileUpdateParamsShape = array{
 *   call?: null|Call|CallShape,
 *   flashcall?: null|Flashcall|FlashcallShape,
 *   language?: string|null,
 *   name?: string|null,
 *   sms?: null|SMS|SMSShape,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
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
     * @param Call|CallShape|null $call
     * @param Flashcall|FlashcallShape|null $flashcall
     * @param SMS|SMSShape|null $sms
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
     * @param Call|CallShape $call
     */
    public function withCall(Call|array $call): self
    {
        $self = clone $this;
        $self['call'] = $call;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
}
