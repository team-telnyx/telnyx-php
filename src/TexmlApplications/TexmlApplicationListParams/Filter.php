<?php

declare(strict_types=1);

namespace Telnyx\TexmlApplications\TexmlApplicationListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\FriendlyName\UnionMember1;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID\Eq;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[outbound_voice_profile_id], filter[friendly_name].
 *
 * @phpstan-import-type FriendlyNameVariants from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\FriendlyName
 * @phpstan-import-type OutboundVoiceProfileIDVariants from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID
 * @phpstan-import-type FriendlyNameShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\FriendlyName
 * @phpstan-import-type OutboundVoiceProfileIDShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter\OutboundVoiceProfileID
 *
 * @phpstan-type FilterShape = array{
 *   friendlyName?: FriendlyNameShape|null,
 *   outboundVoiceProfileID?: OutboundVoiceProfileIDShape|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, applications with <code>friendly_name</code> exactly matching the given value will be returned. Matching is case-sensitive.
     *
     * @var FriendlyNameVariants|null $friendlyName
     */
    #[Optional('friendly_name')]
    public string|UnionMember1|null $friendlyName;

    /**
     * If present, only applications associated with the given outbound voice profile will be returned. Matching is exact.
     *
     * @var OutboundVoiceProfileIDVariants|null $outboundVoiceProfileID
     */
    #[Optional('outbound_voice_profile_id')]
    public string|Eq|null $outboundVoiceProfileID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FriendlyNameShape|null $friendlyName
     * @param OutboundVoiceProfileIDShape|null $outboundVoiceProfileID
     */
    public static function with(
        string|UnionMember1|array|null $friendlyName = null,
        string|Eq|array|null $outboundVoiceProfileID = null,
    ): self {
        $self = new self;

        null !== $friendlyName && $self['friendlyName'] = $friendlyName;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * If present, applications with <code>friendly_name</code> exactly matching the given value will be returned. Matching is case-sensitive.
     *
     * @param FriendlyNameShape $friendlyName
     */
    public function withFriendlyName(
        string|UnionMember1|array $friendlyName
    ): self {
        $self = clone $this;
        $self['friendlyName'] = $friendlyName;

        return $self;
    }

    /**
     * If present, only applications associated with the given outbound voice profile will be returned. Matching is exact.
     *
     * @param OutboundVoiceProfileIDShape $outboundVoiceProfileID
     */
    public function withOutboundVoiceProfileID(
        string|Eq|array $outboundVoiceProfileID
    ): self {
        $self = clone $this;
        $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }
}
