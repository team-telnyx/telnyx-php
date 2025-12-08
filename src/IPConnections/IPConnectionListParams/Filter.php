<?php

declare(strict_types=1);

namespace Telnyx\IPConnections\IPConnectionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IPConnections\IPConnectionListParams\Filter\ConnectionName;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[connection_name], filter[fqdn], filter[outbound_voice_profile_id], filter[outbound.outbound_voice_profile_id].
 *
 * @phpstan-type FilterShape = array{
 *   connection_name?: ConnectionName|null,
 *   fqdn?: string|null,
 *   outbound_voice_profile_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by connection_name using nested operations.
     */
    #[Optional]
    public ?ConnectionName $connection_name;

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    #[Optional]
    public ?string $fqdn;

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
     *
     * @param ConnectionName|array{contains?: string|null} $connection_name
     */
    public static function with(
        ConnectionName|array|null $connection_name = null,
        ?string $fqdn = null,
        ?string $outbound_voice_profile_id = null,
    ): self {
        $obj = new self;

        null !== $connection_name && $obj['connection_name'] = $connection_name;
        null !== $fqdn && $obj['fqdn'] = $fqdn;
        null !== $outbound_voice_profile_id && $obj['outbound_voice_profile_id'] = $outbound_voice_profile_id;

        return $obj;
    }

    /**
     * Filter by connection_name using nested operations.
     *
     * @param ConnectionName|array{contains?: string|null} $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $obj = clone $this;
        $obj['connection_name'] = $connectionName;

        return $obj;
    }

    /**
     * If present, connections with an `fqdn` that equals the given value will be returned. Matching is case-sensitive, and the full string must match.
     */
    public function withFqdn(string $fqdn): self
    {
        $obj = clone $this;
        $obj['fqdn'] = $fqdn;

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
