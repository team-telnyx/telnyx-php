<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name].
 *
 * @phpstan-type filter_alias = array{
 *   friendlyName?: string, outboundVoiceProfileID?: string
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    #[Api('friendly_name', optional: true)]
    public ?string $friendlyName;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api('outbound_voice_profile_id', optional: true)]
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
        $obj = new self;

        null !== $friendlyName && $obj->friendlyName = $friendlyName;
        null !== $outboundVoiceProfileID && $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * If present, applications with <code>friendly_name</code> containing the given value will be returned. Matching is not case-sensitive. Requires at least three characters.
     */
    public function withFriendlyName(string $friendlyName): self
    {
        $obj = clone $this;
        $obj->friendlyName = $friendlyName;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        return $obj;
    }
}
