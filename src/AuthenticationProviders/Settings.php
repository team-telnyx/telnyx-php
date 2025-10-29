<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with the authentication provider.
 *
 * @phpstan-type SettingsShape = array{
 *   idpCertFingerprint: string,
 *   idpEntityID: string,
 *   idpSSOTargetURL: string,
 *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>,
 * }
 */
final class Settings implements BaseModel
{
    /** @use SdkModel<SettingsShape> */
    use SdkModel;

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    #[Api('idp_cert_fingerprint')]
    public string $idpCertFingerprint;

    /**
     * The Entity ID for the identity provider (IdP).
     */
    #[Api('idp_entity_id')]
    public string $idpEntityID;

    /**
     * The SSO target url for the identity provider (IdP).
     */
    #[Api('idp_sso_target_url')]
    public string $idpSSOTargetURL;

    /**
     * The algorithm used to generate the identity provider's (IdP) certificate fingerprint.
     *
     * @var value-of<IdpCertFingerprintAlgorithm>|null $idpCertFingerprintAlgorithm
     */
    #[Api(
        'idp_cert_fingerprint_algorithm',
        enum: IdpCertFingerprintAlgorithm::class,
        optional: true,
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
        $obj = new self;

        $obj->idpCertFingerprint = $idpCertFingerprint;
        $obj->idpEntityID = $idpEntityID;
        $obj->idpSSOTargetURL = $idpSSOTargetURL;

        null !== $idpCertFingerprintAlgorithm && $obj['idpCertFingerprintAlgorithm'] = $idpCertFingerprintAlgorithm;

        return $obj;
    }

    /**
     * The certificate fingerprint for the identity provider (IdP).
     */
    public function withIdpCertFingerprint(string $idpCertFingerprint): self
    {
        $obj = clone $this;
        $obj->idpCertFingerprint = $idpCertFingerprint;

        return $obj;
    }

    /**
     * The Entity ID for the identity provider (IdP).
     */
    public function withIdpEntityID(string $idpEntityID): self
    {
        $obj = clone $this;
        $obj->idpEntityID = $idpEntityID;

        return $obj;
    }

    /**
     * The SSO target url for the identity provider (IdP).
     */
    public function withIdpSSOTargetURL(string $idpSSOTargetURL): self
    {
        $obj = clone $this;
        $obj->idpSSOTargetURL = $idpSSOTargetURL;

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
}
