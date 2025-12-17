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
 * @phpstan-import-type ApplicationNameShape from \Telnyx\FaxApplications\FaxApplicationListParams\Filter\ApplicationName
 *
 * @phpstan-type FilterShape = array{
 *   applicationName?: null|ApplicationName|ApplicationNameShape,
 *   outboundVoiceProfileID?: string|null,
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
     * @param ApplicationName|ApplicationNameShape|null $applicationName
     */
    public static function with(
        ApplicationName|array|null $applicationName = null,
        ?string $outboundVoiceProfileID = null,
    ): self {
        $self = new self;

        null !== $applicationName && $self['applicationName'] = $applicationName;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * Application name filtering operations.
     *
     * @param ApplicationName|ApplicationNameShape $applicationName
     */
    public function withApplicationName(
        ApplicationName|array $applicationName
    ): self {
        $self = clone $this;
        $self['applicationName'] = $applicationName;

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
