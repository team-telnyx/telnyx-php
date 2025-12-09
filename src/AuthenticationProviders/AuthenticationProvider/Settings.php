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
        $obj = new self;

        null !== $assertionConsumerServiceURL && $obj['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;
        null !== $idpCertFingerprint && $obj['idpCertFingerprint'] = $idpCertFingerprint;
        null !== $idpCertFingerprintAlgorithm && $obj['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;
        null !== $idpEntityID && $obj['idpEntityID'] = $idpEntityID;
        null !== $idpSSOTargetURL && $obj['idpSSOTargetURL'] = $idpSSOTargetURL;
        null !== $nameIdentifierFormat && $obj['nameIdentifierFormat'] = $nameIdentifierFormat;
        null !== $serviceProviderEntityID && $obj['serviceProviderEntityID'] = $serviceProviderEntityID;

        return $obj;
    }

    /**
     * The Assertion Consumer Service URL for the service provider (Telnyx).
     */
    public function withAssertionConsumerServiceURL(
        string $assertionConsumerServiceURL
    ): self {
        $obj = clone $this;
        $obj['assertionConsumerServiceURL'] = $assertionConsumerServiceURL;

        return $obj;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $obj = clone $this;
        $obj['idpCertFingerprint'] = $idpCertFingerprint;

        return $obj;
    }

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public function withIdpCertFingerprintAlgorithm(
        IdpCertFingerprintAlgorithm|string $idpCertFingerprintAlgorithm
    ): self {
        $obj = clone $this;
        $obj['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;

        return $obj;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $obj = clone $this;
        $obj['idpEntityID'] = $idpEntityID;

        return $obj;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $obj = clone $this;
        $obj['idpSSOTargetURL'] = $idpSSOTargetURL;

        return $obj;
    }

    /**
     * The name identifier format associated with the authentication provider. This must be the same for both the Identity Provider (IdP) and the service provider (Telnyx).
     */
    public function withNameIdentifierFormat(string $nameIdentifierFormat): self
    {
        $obj = clone $this;
        $obj['nameIdentifierFormat'] = $nameIdentifierFormat;

        return $obj;
    }

    /**
     * The Entity ID for the service provider (Telnyx).
     */
    public function withServiceProviderEntityID(
        string $serviceProviderEntityID
    ): self {
        $obj = clone $this;
        $obj['serviceProviderEntityID'] = $serviceProviderEntityID;

        return $obj;
    }
}
