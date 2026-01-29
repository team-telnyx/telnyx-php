<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name].
 *
 * @phpstan-type FilterShape = array{
 *   friendlyName?: string|null, outboundVoiceProfileID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Optional('friendly_name')]
    public ?string $friendlyName;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional('outbound_voice_profile_id')]
    public ?string $outboundVoiceProfileID;

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
        ?string $friendlyName = null,
        ?string $outboundVoiceProfileID = null
    ): self {
        $self = new self;

        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }
}
