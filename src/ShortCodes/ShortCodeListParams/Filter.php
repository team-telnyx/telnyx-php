<?php

declare(strict_types=1);

namespace Telnyx\ShortCodes\ShortCodeListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id].
 *
 * @phpstan-type FilterShape = array{messagingProfileID?: string|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by Messaging Profile ID. Use the string `null` for phone numbers without assigned profiles. A synonym for the `/messaging_profiles/{id}/short_codes` endpoint when querying about an extant profile.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $messagingProfileID = null): self
    {
        $self = new self;

        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Filter by Messaging Profile ID. Use the string `null` for phone numbers without assigned profiles. A synonym for the `/messaging_profiles/{id}/short_codes` endpoint when querying about an extant profile.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }
}
