<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\Accounts\Conferences\ConferenceUpdateParams\AnnounceMethod;

/**
 * Updates a conference resource.
 *
 * @see Telnyx\Texml\Accounts\Conferences->update
 *
 * @phpstan-type conference_update_params = array{
 *   accountSid: string,
 *   announceMethod?: AnnounceMethod|value-of<AnnounceMethod>,
 *   announceURL?: string,
 *   status?: string,
 * }
 */
final class ConferenceUpdateParams implements BaseModel
{
    /** @use SdkModel<conference_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $accountSid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $announceMethod
     */
    #[Api('AnnounceMethod', enum: AnnounceMethod::class, optional: true)]
    public ?string $announceMethod;

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Api('AnnounceUrl', optional: true)]
    public ?string $announceURL;

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    #[Api('Status', optional: true)]
    public ?string $status;

    /**
     * `new ConferenceUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceUpdateParams::with(accountSid: ...)
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
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public static function with(
        string $accountSid,
        AnnounceMethod|string|null $announceMethod = null,
        ?string $announceURL = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        $obj->accountSid = $accountSid;

        null !== $announceMethod && $obj['announceMethod'] = $announceMethod;
        null !== $announceURL && $obj->announceURL = $announceURL;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withAccountSid(string $accountSid): self
    {
        $obj = clone $this;
        $obj->accountSid = $accountSid;

        return $obj;
    }

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod
    ): self {
        $obj = clone $this;
        $obj['announceMethod'] = $announceMethod;

        return $obj;
    }

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $obj = clone $this;
        $obj->announceURL = $announceURL;

        return $obj;
    }

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
