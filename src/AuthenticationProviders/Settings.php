<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type SettingsShape = array{
 *   idpCertFingerprint: string,
 *   idpEntityID: string,
 *   idpSSOTargetURL: string,
 *   idpCertFingerprintAlgorithm?: null|IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm>,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Required('idp_cert_fingerprint')]
    public string $idpCertFingerprint;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Required('idp_entity_id')]
    public string $idpEntityID;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Required('idp_sso_target_url')]
    public string $idpSSOTargetURL;

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
     * `new Settings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Settings::with(idpCertFingerprint: ..., idpEntityID: ..., idpSSOTargetURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Settings)
     *   ->withIdpCertFingerprint(...)
     *   ->withIdpEntityID(...)
     *   ->withIdpSSOTargetURL(...)
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
     *
     * @param IdpCertFingerprintAlgorithm|value-of<IdpCertFingerprintAlgorithm> $idpCertFingerprintAlgorithm
     */
    public static function with(
        string $idpCertFingerprint,
        string $idpEntityID,
        string $idpSSOTargetURL,
        IdpCertFingerprintAlgorithm|string|null $idpCertFingerprintAlgorithm = null,
    ): self {
        $self = new self;

        $self['idpCertFingerprint'] = $idpCertFingerprint;
        $self['idpEntityID'] = $idpEntityID;
        $self['idpSSOTargetURL'] = $idpSSOTargetURL;

        null !== $idpCertFingerprintAlgorithm && $self['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;

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
}
