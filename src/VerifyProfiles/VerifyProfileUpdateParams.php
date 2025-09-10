<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Call;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfileUpdateParams\SMS;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new VerifyProfileUpdateParams); // set properties as needed
 * $client->verifyProfiles->update(...$params->toArray());
 * ```
 * Update Verify profile.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->verifyProfiles->update(...$params->toArray());`
 *
 * @see Telnyx\VerifyProfiles->update
 *
 * @phpstan-type verify_profile_update_params = array{
 *   call?: Call,
 *   flashcall?: Flashcall,
 *   language?: string,
 *   name?: string,
 *   sms?: SMS,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class VerifyProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<verify_profile_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?Call $call;

    #[Api(optional: true)]
    public ?Flashcall $flashcall;

    #[Api(optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?SMS $sms;

    #[Api('webhook_failover_url', optional: true)]
    public ?string $webhookFailoverURL;

    #[Api('webhook_url', optional: true)]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?Call $call = null,
        ?Flashcall $flashcall = null,
        ?string $language = null,
        ?string $name = null,
        ?SMS $sms = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $call && $obj->call = $call;
        null !== $flashcall && $obj->flashcall = $flashcall;
        null !== $language && $obj->language = $language;
        null !== $name && $obj->name = $name;
        null !== $sms && $obj->sms = $sms;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    public function withCall(Call $call): self
    {
        $obj = clone $this;
        $obj->call = $call;

        return $obj;
    }

    public function withFlashcall(Flashcall $flashcall): self
    {
        $obj = clone $this;
        $obj->flashcall = $flashcall;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSMS(SMS $sms): self
    {
        $obj = clone $this;
        $obj->sms = $sms;

        return $obj;
    }

    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
