<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications\FaxApplicationListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FaxApplications\FaxApplicationListParams\Filter\ApplicationName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound_voice_profile_id].
 *
 * @phpstan-type filter_alias = array{
 *   applicationName?: ApplicationName|null, outboundVoiceProfileID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Application name filtering operations.
     */
    #[Api('application_name', optional: true)]
    public ?ApplicationName $applicationName;

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
        ?ApplicationName $applicationName = null,
        ?string $outboundVoiceProfileID = null,
    ): self {
        $obj = new self;

        null !== $applicationName && $obj->applicationName = $applicationName;
        null !== $outboundVoiceProfileID && $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * Application name filtering operations.
     */
    public function withApplicationName(ApplicationName $applicationName): self
    {
        $obj = clone $this;
        $obj->applicationName = $applicationName;

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
