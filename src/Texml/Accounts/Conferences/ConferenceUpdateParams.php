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
 *   accountSid: string,
 *   announceMethod?: null|AnnounceMethod|value-of<AnnounceMethod>,
 *   announceURL?: string|null,
 *   status?: string|null,
 * }
 */
final class ConferenceUpdateParams implements BaseModel
{
    /** @use SdkModel<ConferenceUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $accountSid;

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @var value-of<AnnounceMethod>|null $announceMethod
     */
    #[Optional('AnnounceMethod', enum: AnnounceMethod::class)]
    public ?string $announceMethod;

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    #[Optional('AnnounceUrl')]
    public ?string $announceURL;

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    #[Optional('Status')]
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
        $self = new self;

        $self['accountSid'] = $accountSid;

        null !== $announceMethod && $self['announceMethod'] = $announceMethod;
        null !== $announceURL && $self['announceURL'] = $announceURL;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withAccountSid(string $accountSid): self
    {
        $self = clone $this;
        $self['accountSid'] = $accountSid;

        return $self;
    }

    /**
     * The HTTP method used to call the `AnnounceUrl`. Defaults to `POST`.
     *
     * @param AnnounceMethod|value-of<AnnounceMethod> $announceMethod
     */
    public function withAnnounceMethod(
        AnnounceMethod|string $announceMethod
    ): self {
        $self = clone $this;
        $self['announceMethod'] = $announceMethod;

        return $self;
    }

    /**
     * The URL we should call to announce something into the conference. The URL may return an MP3 file, a WAV file, or a TwiML document that contains `<Play>`, `<Say>`, `<Pause>`, or `<Redirect>` verbs.
     */
    public function withAnnounceURL(string $announceURL): self
    {
        $self = clone $this;
        $self['announceURL'] = $announceURL;

        return $self;
    }

    /**
     * The new status of the resource. Specifying `completed` will end the conference and hang up all participants.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
