<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;

/**
 * Updates a conference resource.
 *
 * @see Telnyx\Services\Texml\Accounts\ConferencesService::update()
 *
 * @phpstan-type ConferenceUpdateParamsShape = array{
 *   account_sid: string,
 *   AnnounceMethod?: \Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod|value-of<\Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod>,
 *   AnnounceUrl?: string,
 *   Status?: string,
 * }
 */
final class ConferenceUpdateParams implements BaseModel
{
    /** @use SdkModel<ConferenceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account_sid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $AnnounceMethod
     */
    #[Optional(
        enum: AnnounceMethod::class,
    )]
    public ?string $AnnounceMethod;

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Optional]
    public ?string $AnnounceUrl;

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    #[Optional]
    public ?string $Status;

    /**
     * `new ConferenceUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceUpdateParams::with(account_sid: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceUpdateParams)->withAccountSid(...)
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
     * @param AnnounceMethod|value-of<AnnounceMethod> $AnnounceMethod
     */
    public static function with(
        string $account_sid,
        AnnounceMethod|string|null $AnnounceMethod = null,
        ?string $AnnounceUrl = null,
        ?string $Status = null,
    ): self {
        $obj = new self;

        $obj['account_sid'] = $account_sid;

        null !== $AnnounceMethod && $obj['AnnounceMethod'] = $AnnounceMethod;
        null !== $AnnounceUrl && $obj['AnnounceUrl'] = $AnnounceUrl;
        null !== $Status && $obj['Status'] = $Status;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj['account_sid'] = $accountSid;

        return $obj;
    }

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod,
    ): self {
        $obj = clone $this;
        $obj['AnnounceMethod'] = $announceMethod;

        return $obj;
    }

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $obj = clone $this;
        $obj['AnnounceUrl'] = $announceURL;

        return $obj;
    }

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['Status'] = $status;

        return $obj;
    }
}
