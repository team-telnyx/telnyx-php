<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirUpdateInfringementParams\Document;

/**
 * Push a fix for a DIR that is `suspended` with an open infringement claim back into vetting. `POST /dir/{dir_id}/submit` is blocked while a claim is open, so this is the customer-callable path to update the DIR's content and re-certify before Telnyx adjudicates the claim. All four certification booleans must be `true`. Optional content fields (`display_name`, `logo_url`, `call_reasons`, `documents`) update the DIR; documents are append-only.
 *
 * @see Telnyx\Services\DirService::updateInfringement()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateInfringementParams\Document
 *
 * @phpstan-type DirUpdateInfringementParamsShape = array{
 *   certifyBrandIsAccurate: bool,
 *   certifyIPOwnership: bool,
 *   certifyNoInfringement: bool,
 *   certifyNoShaftContent: bool,
 *   infringementResolutionNotes: string,
 *   callReasons?: list<string>|null,
 *   displayName?: string|null,
 *   documents?: list<Document|DocumentShape>|null,
 *   logoURL?: string|null,
 * }
 */
final class DirUpdateInfringementParams implements BaseModel
{
    /** @use SdkModel<DirUpdateInfringementParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Must be `true`.
     */
    #[Required('certify_brand_is_accurate')]
    public bool $certifyBrandIsAccurate;

    /**
     * Must be `true`.
     */
    #[Required('certify_ip_ownership')]
    public bool $certifyIPOwnership;

    /**
     * Must be `true`.
     */
    #[Required('certify_no_infringement')]
    public bool $certifyNoInfringement;

    /**
     * Must be `true`.
     */
    #[Required('certify_no_shaft_content')]
    public bool $certifyNoShaftContent;

    /**
     * Explanation of how the infringement concern was addressed.
     */
    #[Required('infringement_resolution_notes')]
    public string $infringementResolutionNotes;

    /** @var list<string>|null $callReasons */
    #[Optional('call_reasons', list: 'string', nullable: true)]
    public ?array $callReasons;

    #[Optional('display_name', nullable: true)]
    public ?string $displayName;

    /**
     * Append-only supporting documents to attach while resolving the claim (e.g. authorization or licensing proof).
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class, nullable: true)]
    public ?array $documents;

    /**
     * Publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB).
     */
    #[Optional('logo_url', nullable: true)]
    public ?string $logoURL;

    /**
     * `new DirUpdateInfringementParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DirUpdateInfringementParams::with(
     *   certifyBrandIsAccurate: ...,
     *   certifyIPOwnership: ...,
     *   certifyNoInfringement: ...,
     *   certifyNoShaftContent: ...,
     *   infringementResolutionNotes: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DirUpdateInfringementParams)
     *   ->withCertifyBrandIsAccurate(...)
     *   ->withCertifyIPOwnership(...)
     *   ->withCertifyNoInfringement(...)
     *   ->withCertifyNoShaftContent(...)
     *   ->withInfringementResolutionNotes(...)
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
     * @param list<string>|null $callReasons
     * @param list<Document|DocumentShape>|null $documents
     */
    public static function with(
        bool $certifyBrandIsAccurate,
        bool $certifyIPOwnership,
        bool $certifyNoInfringement,
        bool $certifyNoShaftContent,
        string $infringementResolutionNotes,
        ?array $callReasons = null,
        ?string $displayName = null,
        ?array $documents = null,
        ?string $logoURL = null,
    ): self {
        $self = new self;

        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;
        $self['certifyIPOwnership'] = $certifyIPOwnership;
        $self['certifyNoInfringement'] = $certifyNoInfringement;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;
        $self['infringementResolutionNotes'] = $infringementResolutionNotes;

        null !== $callReasons && $self['callReasons'] = $callReasons;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $documents && $self['documents'] = $documents;
        null !== $logoURL && $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * Must be `true`.
     */
    public function withCertifyBrandIsAccurate(
        bool $certifyBrandIsAccurate
    ): self {
        $self = clone $this;
        $self['certifyBrandIsAccurate'] = $certifyBrandIsAccurate;

        return $self;
    }

    /**
     * Must be `true`.
     */
    public function withCertifyIPOwnership(bool $certifyIPOwnership): self
    {
        $self = clone $this;
        $self['certifyIPOwnership'] = $certifyIPOwnership;

        return $self;
    }

    /**
     * Must be `true`.
     */
    public function withCertifyNoInfringement(bool $certifyNoInfringement): self
    {
        $self = clone $this;
        $self['certifyNoInfringement'] = $certifyNoInfringement;

        return $self;
    }

    /**
     * Must be `true`.
     */
    public function withCertifyNoShaftContent(bool $certifyNoShaftContent): self
    {
        $self = clone $this;
        $self['certifyNoShaftContent'] = $certifyNoShaftContent;

        return $self;
    }

    /**
     * Explanation of how the infringement concern was addressed.
     */
    public function withInfringementResolutionNotes(
        string $infringementResolutionNotes
    ): self {
        $self = clone $this;
        $self['infringementResolutionNotes'] = $infringementResolutionNotes;

        return $self;
    }

    /**
     * @param list<string>|null $callReasons
     */
    public function withCallReasons(?array $callReasons): self
    {
        $self = clone $this;
        $self['callReasons'] = $callReasons;

        return $self;
    }

    public function withDisplayName(?string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Append-only supporting documents to attach while resolving the claim (e.g. authorization or licensing proof).
     *
     * @param list<Document|DocumentShape>|null $documents
     */
    public function withDocuments(?array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * Publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB).
     */
    public function withLogoURL(?string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }
}
