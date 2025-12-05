<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
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
 *   sms?: SMS|array{
 *     whitelisted_destinations: list<string>,
 *     alpha_sender?: string|null,
 *     app_name?: string|null,
 *     code_length?: int|null,
 *     default_verification_timeout_secs?: int|null,
 *     messaging_template_id?: string|null,
 *   },
 *   webhook_failover_url?: string,
 *   webhook_url?: string,
 * }
 */
final class VerifyProfileCreateParams implements BaseModel
{
    /** @use SdkModel<VerifyProfileCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?Call $call;

    #[Api(optional: true)]
    public ?Flashcall $flashcall;

    #[Api(optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?SMS $sms;

    #[Api(optional: true)]
    public ?string $webhook_failover_url;

    #[Api(optional: true)]
    public ?string $webhook_url;

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
     *   whitelisted_destinations: list<string>,
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
     * } $sms
     */
    public static function with(
        string $name,
        Call|array|null $call = null,
        Flashcall|array|null $flashcall = null,
        ?string $language = null,
        SMS|array|null $sms = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;

        null !== $call && $obj['call'] = $call;
        null !== $flashcall && $obj['flashcall'] = $flashcall;
        null !== $language && $obj['language'] = $language;
        null !== $sms && $obj['sms'] = $sms;
        null !== $webhook_failover_url && $obj['webhook_failover_url'] = $webhook_failover_url;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

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

    /**
     * @param SMS|array{
     *   whitelisted_destinations: list<string>,
     *   alpha_sender?: string|null,
     *   app_name?: string|null,
     *   code_length?: int|null,
     *   default_verification_timeout_secs?: int|null,
     *   messaging_template_id?: string|null,
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
