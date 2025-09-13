<?php

declare(strict_types=1);

namespace Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WireguardInterfaces\WireguardInterfaceGetResponse\Data\Region;

/**
 * @phpstan-type unnamed_type_with_intersection_parent30 = array{
 *   enableSipTrunking?: bool,
 *   endpoint?: string,
 *   publicKey?: string,
 *   recordType?: string,
 *   region?: Region,
 *   regionCode?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<unnamed_type_with_intersection_parent30> */
    use SdkModel;

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    #[Api('enable_sip_trunking', optional: true)]
    public ?bool $enableSipTrunking;

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    #[Api(optional: true)]
    public ?string $endpoint;

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    #[Api('public_key', optional: true)]
    public ?string $publicKey;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    #[Api(optional: true)]
    public ?Region $region;

    /**
     * The region interface is deployed to.
     */
    #[Api('region_code', optional: true)]
    public ?string $regionCode;

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
        ?bool $enableSipTrunking = null,
        ?string $endpoint = null,
        ?string $publicKey = null,
        ?string $recordType = null,
        ?Region $region = null,
        ?string $regionCode = null,
    ): self {
        $obj = new self;

        null !== $enableSipTrunking && $obj->enableSipTrunking = $enableSipTrunking;
        null !== $endpoint && $obj->endpoint = $endpoint;
        null !== $publicKey && $obj->publicKey = $publicKey;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $region && $obj->region = $region;
        null !== $regionCode && $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * Enable SIP traffic forwarding over VPN interface.
     */
    public function withEnableSipTrunking(bool $enableSipTrunking): self
    {
        $obj = clone $this;
        $obj->enableSipTrunking = $enableSipTrunking;

        return $obj;
    }

    /**
     * The Telnyx WireGuard peers `Peer.endpoint` value.
     */
    public function withEndpoint(string $endpoint): self
    {
        $obj = clone $this;
        $obj->endpoint = $endpoint;

        return $obj;
    }

    /**
     * The Telnyx WireGuard peers `Peer.PublicKey`.
     */
    public function withPublicKey(string $publicKey): self
    {
        $obj = clone $this;
        $obj->publicKey = $publicKey;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    public function withRegion(Region $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * The region interface is deployed to.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
