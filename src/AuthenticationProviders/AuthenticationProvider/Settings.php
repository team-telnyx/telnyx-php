<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders\AuthenticationProvider;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type SettingsShape = array{
 *   assertionConsumerServiceURL?: string|null,
 *   idpCertFingerprint?: string|null,
 *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   idpEntityID?: string|null,
 *   idpSSOTargetURL?: string|null,
 *   nameIdentifierFormat?: string|null,
 *   serviceProviderEntityID?: string|null,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    #[Optional('assertion_consumer_service_url')]
    public ?string $assertionConsumerServiceURL;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Optional('idp_cert_fingerprint')]
    public ?string $idpCertFingerprint;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idpCertFingerprintAlgorithm
     */
    #[Optional(
        'idp_cert_fingerprint_algorithm',
        enum: IdpCertFingerprintAlgorithm::class
    )]
    public ?string $idpCertFingerprintAlgorithm;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Optional('idp_entity_id')]
    public ?string $idpEntityID;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Optional('idp_sso_target_url')]
    public ?string $idpSSOTargetURL;

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    #[Optional('name_identifier_format')]
    public ?string $nameIdentifierFormat;

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    #[Optional('service_provider_entity_id')]
    public ?string $serviceProviderEntityID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public static function with(
        ?string $assertionConsumerServiceURL = null,
        ?string $idpCertFingerprint = null,
        IdpCertFingerprintAlgorithm|string|null $idpCertFingerprintAlgorithm = null,
        ?string $idpEntityID = null,
        ?string $idpSSOTargetURL = null,
        ?string $nameIdentifierFormat = null,
        ?string $serviceProviderEntityID = null,
    ): self {
        $self = new self;

        null !== $assertionConsumerServiceURL && $self['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;
        null !== $idpCertFingerprint && $self['idpCertFingerprint'] = $idpCertFingerprint;
        null !== $idpCertFingerprintAlgorithm && $self['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;
        null !== $idpEntityID && $self['idpEntityID'] = $idpEntityID;
        null !== $idpSSOTargetURL && $self['idpSSOTargetURL'] = $idpSSOTargetURL;
        null !== $nameIdentifierFormat && $self['nameIdentifierFormat'] = $nameIdentifierFormat;
        null !== $serviceProviderEntityID && $self['serviceProviderEntityID'] = $serviceProviderEntityID;

        return $self;
    }

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    public function withAssertionConsumerServiceURL(
        string $assertionConsumerServiceURL
    ): self {
        $self = clone $this;
        $self['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;

        return $self;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $self = clone $this;
        $self['idpCertFingerprint'] = $idpCertFingerprint;

        return $self;
    }

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public function withIdpCertFingerprintAlgorithm(
        IdpCertFingerprintAlgorithm|string $idpCertFingerprintAlgorithm
    ): self {
        $self = clone $this;
        $self['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;

        return $self;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $self = clone $this;
        $self['idpEntityID'] = $idpEntityID;

        return $self;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $self = clone $this;
        $self['idpSSOTargetURL'] = $idpSSOTargetURL;

        return $self;
    }

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    public function withNameIdentifierFormat(string $nameIdentifierFormat): self
    {
        $self = clone $this;
        $self['nameIdentifierFormat'] = $nameIdentifierFormat;

        return $self;
    }

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    public function withServiceProviderEntityID(
        string $serviceProviderEntityID
    ): self {
        $self = clone $this;
        $self['serviceProviderEntityID'] = $serviceProviderEntityID;

        return $self;
    }
}
