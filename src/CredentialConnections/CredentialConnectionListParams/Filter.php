<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections\CredentialConnectionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CredentialConnections\CredentialConnectionListParams\Filter\ConnectionName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id].
 *
 * @phpstan-import-type ConnectionNameShape from \Telnyx\CredentialConnections\CredentialConnectionListParams\Filter\ConnectionName
 *
 * @phpstan-type FilterShape = array{
 *   connectionName?: null|ConnectionName|ConnectionNameShape,
 *   fqdn?: string|null,
 *   outboundVoiceProfileID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by connection_name using nested operations.
     */
    #[Optional('connection_name')]
    public ?ConnectionName $connectionName;

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    #[Optional]
    public ?string $fqdn;

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
     * @param ConnectionName|ConnectionNameShape|null $connectionName
     */
    public static function with(
        ConnectionName|array|null $connectionName = null,
        ?string $fqdn = null,
        ?string $outboundVoiceProfileID = null,
    ): self {
        $self = new self;

        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $fqdn && $self['fqdn'] = $fqdn;
        null !== $outboundVoiceProfileID && $self['outboundVoiceProfileID'] = $outboundVoiceProfileID;

        return $self;
    }

    /**
     * Filter by connection_name using nested operations.
     *
     * @param ConnectionName|ConnectionNameShape $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    public function withFqdn(string $fqdn): self
    {
        $self = clone $this;
        $self['fqdn'] = $fqdn;

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
