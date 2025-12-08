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
 *   friendly_name?: string|null, outbound_voice_profile_id?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Optional]
    public ?string $friendly_name;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Optional]
    public ?string $outbound_voice_profile_id;

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
        ?string $friendly_name = null,
        ?string $outbound_voice_profile_id = null
    ): self {
        $obj = new self;

        null !== $friendly_name && $obj['friendly_name'] = $friendly_name;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;

        return $obj;
    }

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj['friendly_name'] = $friendlyName;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outbound_voice_profile_id'] = $outboundVoiceProfileID;

        return $obj;
    }
}
