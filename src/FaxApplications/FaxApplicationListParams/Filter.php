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
 * @phpstan-type FilterShape = array{
 *   application_name?: ApplicationName|null,
 *   outbound_voice_profile_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Application name filtering operations.
     */
    #[Api(optional: true)]
    public ?ApplicationName $application_name;

    /**
     * Identifies the associated outbound voice profile.
     */
    #[Api(optional: true)]
    public ?string $outbound_voice_profile_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ApplicationName|array{contains?: string|null} $application_name
     */
    public static function with(
        ApplicationName|array|null $application_name = null,
        ?string $outbound_voice_profile_id = null,
    ): self {
        $obj = new self;

        null !== $application_name && $obj['application_name'] = $application_name;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;

        return $obj;
    }

    /**
     * Application name filtering operations.
     *
     * @param ApplicationName|array{contains?: string|null} $applicationName
     */
    public function withApplicationName(
        ApplicationName|array $applicationName
    ): self {
        $obj = clone $this;
        $obj['application_name'] = $applicationName;

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
