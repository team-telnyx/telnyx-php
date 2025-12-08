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
 *     app_name?: string|null,
 *     code_length?: int|null,
 *     default_verification_timeout_secs?: int|null,
 *     messaging_template_id?: string|null,
 *     whitelisted_destinations?: list<string>|null,
 *   },
 *   flashcall?: Flashcall|array{
 *     default_verification_timeout_secs?: int|null,
 *     whitelisted_destinations?: list<string>|null,
 *   },
 *   language?: string,
 *   name?: string,
 *   sms?: SMS|array{
 *     alpha_sender?: string|null,
 *     app_name?: string|null,
 *     code_length?: int|null,
 *     default_verification_timeout_secs?: int|null,
 *     messaging_template_id?: string|null,
 *     whitelisted_destinations?: list<string>|null,
 *   },
 *   webhook_failover_url?: string,
 *   webhook_url?: string,
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

    #[Optional]
    public ?string $webhook_failover_url;

    #[Optional]
    public ?string $webhook_url;

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
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $call
     * @param Flashcall|array{
     *   default_verification_timeout_secs?: int|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $flashcall
     * @param SMS|array{
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
     * } $sms
     */
    public static function with(
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        SMS|array|null $sms = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $call && $obj['call'] = $call;
        null !== $flashcall && $obj['flashcall'] = $flashcall;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj['name'] = $name;
        null !== $sms && $obj['sms'] = $sms;
        null !== $webhook_failover_url && $obj['webhook_failover_url'] = $webhook_failover_url;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

        return $obj;
    }

    /**
     * @param Call|array{
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
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
     *   default_verification_timeout_secs?: int|null,
     *   whitelisted_destinations?: list<string>|null,
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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param SMS|array{
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     *   whitelisted_destinations?: list<string>|null,
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
        $obj['webhook_failover_url'] = $webhookFailoverURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
