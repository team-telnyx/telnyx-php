<?php

declare(strict_types=1);

namespace Telnyx\MeetingBot\Calendar;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Browser redirect after calendar consent. Use the returned oauth_url rather than constructing this request. Verified state identifies the connecting user. Returns HTML for success, cancellation, or failure; no JSON error envelope or bearer token is used.
 *
 * @see Telnyx\Services\MeetingBot\CalendarService::retrieveOAuthCallback()
 *
 * @phpstan-type CalendarRetrieveOAuthCallbackParamsShape = array{
 *   code?: string|null, error?: string|null, state?: string|null
 * }
 */
final class CalendarRetrieveOAuthCallbackParams implements BaseModel
{
    /** @use SdkModel<CalendarRetrieveOAuthCallbackParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Authorization code supplied by the calendar provider.
     */
    #[Optional]
    public ?string $code;

    /**
     * Authorization error supplied by the calendar provider, such as access_denied.
     */
    #[Optional]
    public ?string $error;

    /**
     * Unmodified signed state from the authorization URL.
     */
    #[Optional]
    public ?string $state;

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
        ?string $code = null,
        ?string $error = null,
        ?string $state = null
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $error && $self['error'] = $error;
        null !== $state && $self['state'] = $state;

        return $self;
    }

    /**
     * Authorization code supplied by the calendar provider.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Authorization error supplied by the calendar provider, such as access_denied.
     */
    public function withError(string $error): self
    {
        $self = clone $this;
        $self['error'] = $error;

        return $self;
    }

    /**
     * Unmodified signed state from the authorization URL.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }
}
