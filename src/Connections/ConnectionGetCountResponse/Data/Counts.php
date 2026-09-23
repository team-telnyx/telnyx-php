<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionGetCountResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Counts of the authenticated user's connections, grouped by connection type. Forward-only connections are excluded.
 *
 * @phpstan-type CountsShape = array{
 *   callControlApplications: int,
 *   credentialConnections: int,
 *   externalConnections: int,
 *   faxConnections: int,
 *   fqdnConnections: int,
 *   ipConnections: int,
 *   microsoftTeamsSbcConnections: int,
 *   mobileVoiceConnections: int,
 *   operatorConnectConnections: int,
 *   texmlApplications: int,
 *   thirdPartyProviderConnections: int,
 *   uacConnections: int,
 *   zoomSbcConnections: int,
 * }
 */
final class Counts implements BaseModel
{
    /** @use SdkModel<CountsShape> */
    use SdkModel;

    /**
     * Number of Call Control applications.
     */
    #[Required('call_control_applications')]
    public int $callControlApplications;

    /**
     * Number of credential connections.
     */
    #[Required('credential_connections')]
    public int $credentialConnections;

    /**
     * Number of external connections.
     */
    #[Required('external_connections')]
    public int $externalConnections;

    /**
     * Number of Fax applications.
     */
    #[Required('fax_connections')]
    public int $faxConnections;

    /**
     * Number of FQDN connections.
     */
    #[Required('fqdn_connections')]
    public int $fqdnConnections;

    /**
     * Number of IP connections.
     */
    #[Required('ip_connections')]
    public int $ipConnections;

    /**
     * Number of Microsoft Teams SBC (direct routing) connections.
     */
    #[Required('microsoft_teams_sbc_connections')]
    public int $microsoftTeamsSbcConnections;

    /**
     * Number of mobile voice (IMS) connections.
     */
    #[Required('mobile_voice_connections')]
    public int $mobileVoiceConnections;

    /**
     * Number of Microsoft Operator Connect connections.
     */
    #[Required('operator_connect_connections')]
    public int $operatorConnectConnections;

    /**
     * Number of TeXML applications.
     */
    #[Required('texml_applications')]
    public int $texmlApplications;

    /**
     * Number of third-party provider connections.
     */
    #[Required('third_party_provider_connections')]
    public int $thirdPartyProviderConnections;

    /**
     * Number of UAC connections.
     */
    #[Required('uac_connections')]
    public int $uacConnections;

    /**
     * Number of Zoom SBC connections.
     */
    #[Required('zoom_sbc_connections')]
    public int $zoomSbcConnections;

    /**
     * `new Counts()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Counts::with(
     *   callControlApplications: ...,
     *   credentialConnections: ...,
     *   externalConnections: ...,
     *   faxConnections: ...,
     *   fqdnConnections: ...,
     *   ipConnections: ...,
     *   microsoftTeamsSbcConnections: ...,
     *   mobileVoiceConnections: ...,
     *   operatorConnectConnections: ...,
     *   texmlApplications: ...,
     *   thirdPartyProviderConnections: ...,
     *   uacConnections: ...,
     *   zoomSbcConnections: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Counts)
     *   ->withCallControlApplications(...)
     *   ->withCredentialConnections(...)
     *   ->withExternalConnections(...)
     *   ->withFaxConnections(...)
     *   ->withFqdnConnections(...)
     *   ->withIPConnections(...)
     *   ->withMicrosoftTeamsSbcConnections(...)
     *   ->withMobileVoiceConnections(...)
     *   ->withOperatorConnectConnections(...)
     *   ->withTexmlApplications(...)
     *   ->withThirdPartyProviderConnections(...)
     *   ->withUacConnections(...)
     *   ->withZoomSbcConnections(...)
     * ```
     */
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
        int $callControlApplications,
        int $credentialConnections,
        int $externalConnections,
        int $faxConnections,
        int $fqdnConnections,
        int $ipConnections,
        int $microsoftTeamsSbcConnections,
        int $mobileVoiceConnections,
        int $operatorConnectConnections,
        int $texmlApplications,
        int $thirdPartyProviderConnections,
        int $uacConnections,
        int $zoomSbcConnections,
    ): self {
        $self = new self;

        $self['callControlApplications'] = $callControlApplications;
        $self['credentialConnections'] = $credentialConnections;
        $self['externalConnections'] = $externalConnections;
        $self['faxConnections'] = $faxConnections;
        $self['fqdnConnections'] = $fqdnConnections;
        $self['ipConnections'] = $ipConnections;
        $self['microsoftTeamsSbcConnections'] = $microsoftTeamsSbcConnections;
        $self['mobileVoiceConnections'] = $mobileVoiceConnections;
        $self['operatorConnectConnections'] = $operatorConnectConnections;
        $self['texmlApplications'] = $texmlApplications;
        $self['thirdPartyProviderConnections'] = $thirdPartyProviderConnections;
        $self['uacConnections'] = $uacConnections;
        $self['zoomSbcConnections'] = $zoomSbcConnections;

        return $self;
    }

    /**
     * Number of Call Control applications.
     */
    public function withCallControlApplications(
        int $callControlApplications
    ): self {
        $self = clone $this;
        $self['callControlApplications'] = $callControlApplications;

        return $self;
    }

    /**
     * Number of credential connections.
     */
    public function withCredentialConnections(int $credentialConnections): self
    {
        $self = clone $this;
        $self['credentialConnections'] = $credentialConnections;

        return $self;
    }

    /**
     * Number of external connections.
     */
    public function withExternalConnections(int $externalConnections): self
    {
        $self = clone $this;
        $self['externalConnections'] = $externalConnections;

        return $self;
    }

    /**
     * Number of Fax applications.
     */
    public function withFaxConnections(int $faxConnections): self
    {
        $self = clone $this;
        $self['faxConnections'] = $faxConnections;

        return $self;
    }

    /**
     * Number of FQDN connections.
     */
    public function withFqdnConnections(int $fqdnConnections): self
    {
        $self = clone $this;
        $self['fqdnConnections'] = $fqdnConnections;

        return $self;
    }

    /**
     * Number of IP connections.
     */
    public function withIPConnections(int $ipConnections): self
    {
        $self = clone $this;
        $self['ipConnections'] = $ipConnections;

        return $self;
    }

    /**
     * Number of Microsoft Teams SBC (direct routing) connections.
     */
    public function withMicrosoftTeamsSbcConnections(
        int $microsoftTeamsSbcConnections
    ): self {
        $self = clone $this;
        $self['microsoftTeamsSbcConnections'] = $microsoftTeamsSbcConnections;

        return $self;
    }

    /**
     * Number of mobile voice (IMS) connections.
     */
    public function withMobileVoiceConnections(
        int $mobileVoiceConnections
    ): self {
        $self = clone $this;
        $self['mobileVoiceConnections'] = $mobileVoiceConnections;

        return $self;
    }

    /**
     * Number of Microsoft Operator Connect connections.
     */
    public function withOperatorConnectConnections(
        int $operatorConnectConnections
    ): self {
        $self = clone $this;
        $self['operatorConnectConnections'] = $operatorConnectConnections;

        return $self;
    }

    /**
     * Number of TeXML applications.
     */
    public function withTexmlApplications(int $texmlApplications): self
    {
        $self = clone $this;
        $self['texmlApplications'] = $texmlApplications;

        return $self;
    }

    /**
     * Number of third-party provider connections.
     */
    public function withThirdPartyProviderConnections(
        int $thirdPartyProviderConnections
    ): self {
        $self = clone $this;
        $self['thirdPartyProviderConnections'] = $thirdPartyProviderConnections;

        return $self;
    }

    /**
     * Number of UAC connections.
     */
    public function withUacConnections(int $uacConnections): self
    {
        $self = clone $this;
        $self['uacConnections'] = $uacConnections;

        return $self;
    }

    /**
     * Number of Zoom SBC connections.
     */
    public function withZoomSbcConnections(int $zoomSbcConnections): self
    {
        $self = clone $this;
        $self['zoomSbcConnections'] = $zoomSbcConnections;

        return $self;
    }
}
