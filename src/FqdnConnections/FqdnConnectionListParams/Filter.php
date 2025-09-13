<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections\FqdnConnectionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\FqdnConnections\FqdnConnectionListParams\Filter\ConnectionName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id].
 *
 * @phpstan-type filter_alias = array{
 *   connectionName?: ConnectionName,
 *   fqdn?: string,
 *   outboundVoiceProfileID?: string,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by connection_name using nested operations.
     */
    #[Api('connection_name', optional: true)]
    public ?ConnectionName $connectionName;

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    #[Api(optional: true)]
    public ?string $fqdn;

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
        ?ConnectionName $connectionName = null,
        ?string $fqdn = null,
        ?string $outboundVoiceProfileID = null,
    ): self {
        $obj = new self;

        null !== $connectionName && $obj->connectionName = $connectionName;
        null !== $fqdn && $obj->fqdn = $fqdn;
        null !== $outboundVoiceProfileID && $obj->outboundVoiceProfileID = $outboundVoiceProfileID;

        return $obj;
    }

    /**
     * Filter by connection_name using nested operations.
     */
    public function withConnectionName(ConnectionName $connectionName): self
    {
        $obj = clone $this;
        $obj->connectionName = $connectionName;

        return $obj;
    }

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    public function withFqdn(string $fqdn): self
    {
        $obj = clone $this;
        $obj->fqdn = $fqdn;

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
