<?php

declare(strict_types=1);

namespace Telnyx\FaxApplications\FaxApplicationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FaxApplications\FaxApplicationListParams\Filter\ApplicationName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[application_name][contains], filter[outbound_voice_profile_id].
 *
 * @phpstan-type FilterShape = array{
 *   applicationName?: ApplicationName|null, outboundVoiceProfileID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Application name filtering operations.
     */
    #[Optional('application_name')]
    public ?ApplicationName $applicationName;

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
     *
     * @param ApplicationName|array{contains?: string|null} $applicationName
     */
    public static function with(
        ApplicationName|array|null $applicationName = null,
        ?string $outboundVoiceProfileID = null,
    ): self {
        $obj = new self;

        null !== $applicationName && $obj['applicationName'] = $applicationName;
        null !== $outboundVoiceProfileID && $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

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
        $obj['applicationName'] = $applicationName;

        return $obj;
    }

    /**
     * Identifies the associated outbound voice profile.
     */
    public function withOutboundVoiceProfileID(
        string $outboundVoiceProfileID
    ): self {
        $obj = clone $this;
        $obj['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $obj;
    }
}
